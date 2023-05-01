<?php
include_once 'allFrags.php';
$email = $_POST['email'];
$password = $_POST['password'];
$connectAs="";
if (UserRepository::isExistingUserWhere("email",$email)) //if found rows at users table
    $connectAs="user";
elseif (EmployerRepository::isExistingEmployerWhere("email",$email)) //if found rows at emplouers table
    $connectAs="employer";
else
    sendError("wrong_email","login");
if ($connectAs=="user")
    if (!UserRepository::isExistingUserWhere("email",$email,"password",$password))
        sendError("wrong_password","login");
if ($connectAs=="employer")
    if(!EmployerRepository::isExistingEmployerWhere("email",$email,"password",$password))

        sendError("wrong_password","login");
{
    session_start();
    $_SESSION["currentUser"] = ($connectAs == "user") ?
        UserRepository::getOnlyUserBy_And("email", $email, "password", $password) :
        EmployerRepository::getOnlyEmployerBy_And("email", $email, "password", $password);
    header("Location: homePage.php");
}