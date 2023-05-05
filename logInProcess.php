<?php
include_once 'allFrags.php';
session_start();


$email = $_POST['email'];

$password = $_POST['password'];
$connectAs="";

if (JobSeekerRepository::isExistingUserWhere("email",$email)) //if found rows at users table
    $connectAs="user";
elseif (CompanyRepository::isExistingCompanyWhere("email",$email)) //if found rows at emplouers table
    $connectAs="employer";
else {
    unset($_SESSION['insertedEmail']);sendError("wrong_email", "login");
}
$_SESSION["insertedEmail"]=$email;
if ($connectAs=="user")
    if (!JobSeekerRepository::isExistingUserWhere("email",$email,"password",$password))
        sendError("wrong_password","login");
if ($connectAs=="employer")
    if(!CompanyRepositoryRepository::isExistingCompanyWhere("email",$email,"password",$password))

        sendError("wrong_password","login");
{

    $_SESSION["currentUser"] = ($connectAs == "user") ?
        JobSeekerRepository::getOnlyUserBy_And("email", $email, "password", $password) :
        CompanyRepository::getOnlyCompanyBy_And("email", $email, "password", $password);
    unset($_SESSION['insertedEmail']);
    header("Location: homePage.php");
}