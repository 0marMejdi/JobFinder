<?php

/**
 * generates an errors list, each error is defined by error code as the key, and the error message as the value of  the array
 *
 * its purpose is to collect all the defined errors, and allow you to reuse them easily.
 * @return array of errors
 */
    function getErrors() : array{
        $Errors = [];
        $Errors["wrong_email"]="Incorrect E-Mail: the e-mail you put is incorrect, please verify before entering or sign up if you don't have one";
        $Errors["wrong_password"]="Incorrect Password : check your password again ";
        $Errors["incorrect_input"]="Wrong Input : Verify your input";
        $Errors["email_already_exists"]="E-Mail Already Exists: you can't use this one, try again";
        $Errors["unauthenticated"]="You are not Authenticated : you need to log in before accessing to the requested page";
        $Errors["sign_up_first"]="Sign up to a new account first to access to this page";
        $Errors["already_logged_in"]="You are already logged in, You need to disconnect before accessing to this page";
        $Errors["request_profile_doesnt_exist"]="Requested Profile Not Found: The profile you are looking for doesn't exist";
        $Errors["request_job_offer_doesnt_exist"]="Requested Job Offer Not Found: The job offer you are looking for doesn't exist";
        $Errors["request_job_demand_doesnt_exist"]="Requested Job Demand Not Found: The job demand you are looking for doesn't exist";
        $Errors["cannot_connect_to_database"]="Cannot Connect to Database: There is a problem with the server database, please try again later or contact us";
        $Errors["cannot_insert_into_database"]="Cannot Register your Account: Something went wrong with database when trying to insert your information, contact us if this persists";
        return $Errors;
    }
    //TODO: Rediger Doc
    function getSuccesses() : array
    {
        $Successes = [];
        $Successes["register_success"]="Your account has been registered successfully";
        $Successes["send_apply_success"] = "Your job application has been sent successfully to the company manager, he will get it soon";
        $Successes["create_job_offer_success"]="Your job offer has been saved and published successfully";
        return $Successes;

    }
/**
 * it checks the current session, if there is any error value in there it return the error message as alert
 *
 * this function could be put anywhere in the html page, and it will show the error there,
 *
 * makes it easier to check if there are errors that has to be shown in that page or no, plus it supports any type
 * defined in the error list otherwise it will just print the error code.
 * @return string the error message in a div class alert-danger
 */
    function showErrorIfExists() : string {
        session_start_once();
        $errors = getErrors();
        if (!isset($_SESSION['errorCode'])) return "";
        $errorCode = $_SESSION['errorCode'];
        $str = '<div class="alert alert-danger" role="alert">';
        if (array_key_exists($errorCode, $errors)){
            $str.= $errors[$errorCode];
        }else{
            $str.= "Error Code: " .$errorCode;
        }
        $str.= '</div>';
        unset($_SESSION['errorCode']);
        return $str;
    }
    //TODO: Rediger Doc
    function showSuccessIfExists() : string {
    session_start_once();
    $successes = getSuccesses();
    if (!isset($_SESSION['successCode'])) return "";
    $successCode = $_SESSION['successCode'];
    $str = '<div class="alert alert-success" role="alert">';
    if (array_key_exists($successCode, $successes)){
        $str.= $successes[$successCode];
    }else{
        $str.= "Success Code: " .$successCode;
    }
    $str.= '</div>';
    unset($_SESSION['successCode']);
    return $str;
}
/**
 * when you detect error that happened and needs to be shown,
 * you use this function to send the error code to the desired page, and it will be shown if it has showErrorIfExists() function
 * @param $errorCode string of the error that has occurred
 * @param $to string the name of the page to send the error (without .php suffix)
 * @return void
 */
     function sendError(string $errorCode, string $to): void {
        session_start_once();
        $_SESSION['errorCode']=$errorCode;
        header("Location: $to.php");
        exit;
    }

/**
 *  * when an operation succeeded and  needs to be shown,
 * you use this function to send the success code to the desired page, and it will be shown if it has showSuccessIfExists() function
 * @param string $successCode string of the success code that has been detected
 * @param $to string the name of the page to send the error (without .php suffix)
 * @return void
 */
    function sendSuccess(string $successCode, string $to): void {
    session_start_once();
    $_SESSION['successCode']=$successCode;
    header("Location: $to.php");
    exit;
}

/**
 * gets the current page name
 *
 * @return string current page name
 */
    function here():string{
        return basename($_SERVER['PHP_SELF'], '.php');
    }