<?php
    function getErrors(){
        $Errors = [];
        $Errors["wrong_email"]="Incorrect E-Mail: the e-mail you put is incorrect, please verify before entering or sign up if you don't have one";
        $Errors["wrong_password"]="Incorrect Password : check your password again ";
        $Errors["incorrect_input"]="Wrong Input : Verify your input";
        $Errors["email_already_exists"]="E-Mail Already Exists: you can't use this one, try again";
        $Errors["unauthenticated"]="You are not Authenticated : you need to log in before accessing to the application";
        return $Errors;
    }
    function showErrorIfExists(){
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

    function sendError($errorCode,$to){
        session_start_once();
        $_SESSION['errorCode']=$errorCode;
        header("Location: $to.php");
        exit;
    }

    function here(){
        $filename = basename($_SERVER['PHP_SELF'], '.php');
        return $filename;
    }