<?php
include_once 'allFrags.php';
session_start();


$email = $_POST['email'];

$password = $_POST['password'];
$connectAs="";

if (JobSeekerRepository::doesExist("email",$email)) //if found rows at users table
    $connectAs="JobSeeker";
elseif (CompanyRepository::isExistingCompanyWhere("email",$email)) //if found rows at emplouers table
    $connectAs="Company";
else {
    unset($_SESSION['insertedEmail']);
    sendError("wrong_email", "login");
}
$_SESSION["insertedEmail"]=$email;
if ($connectAs=="JobSeeker")
    if (!JobSeekerRepository::doesExist("email",$email,"password",$password))
        sendError("wrong_password","login");
if ($connectAs=="Company")
    if(!CompanyRepository::isExistingCompanyWhere("email",$email,"password",$password))

        sendError("wrong_password","login");
{

    $_SESSION["currentUser"] = ($connectAs == "JobSeeker") ?
        JobSeekerRepository::getOneWhere("email", $email, "password", $password) :
        CompanyRepository::getOnlyCompanyBy_And("email", $email, "password", $password);
    unset($_SESSION['insertedEmail']);
    header("Location: homePage.php");
}