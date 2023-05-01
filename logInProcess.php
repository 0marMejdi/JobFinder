<?php
include_once 'allFrags.php';
session_start_once();


$email = $_POST['email'];

$password = $_POST['password'];
$connectAs="";

if (UserRepository::isExistingUserWhere("email",$email)) //if found rows at users table
    $connectAs="user";
elseif (EmployerRepository::isExistingEmployerWhere("email",$email)) //if found rows at emplouers table
    $connectAs="employer";
else {
    unset($_SESSION['insertedEmail']);sendError("wrong_email", "login");
}
$_SESSION["insertedEmail"]=$email;
if ($connectAs=="user")
    if (!UserRepository::isExistingUserWhere("email",$email,"password",$password))
        sendError("wrong_password","login");
if ($connectAs=="employer")
    if(!EmployerRepository::isExistingEmployerWhere("email",$email,"password",$password))

        sendError("wrong_password","login");
{

    $_SESSION["currentUser"] = ($connectAs == "user") ?
        UserRepository::getOnlyUserBy_And("email", $email, "password", $password) :
        EmployerRepository::getOnlyEmployerBy_And("email", $email, "password", $password);
    unset($_SESSION['insertedEmail']);
    header("Location: homePage.php");
}