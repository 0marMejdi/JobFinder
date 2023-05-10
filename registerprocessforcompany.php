<?php
include_once 'allFrags.php';
session_start();
<<<<<<< HEAD
ConnexionBD::checkTables();

=======
ConnexionBD::checktables();
>>>>>>> d49cfd120176f1cfe4e73e9b5dc1d0bb72f69d0b
//needs to be unauthenticated and cannot access directly

if (isAuthenticated()){
    sendError("already_logged_in","homePage");
}
if(!isset($_POST["email"])) {
    sendError("cannot_access_directly","login");
}

$companyName = $_POST['companyName'];
$email = $_POST['email'];
$password = $_POST['password'];
$description = $_POST['description'];
$sector = $_POST['section'];
$subSector = $_POST['subSection'];
$size = $_POST['size'];
$foundationDate = $_POST['foundationDate'];
$phone = $_POST['phone'];
$country = $_POST['country'];
$region = $_POST['region'];
$address = $_POST['address'];
//create a new company
if (JobSeekerRepository::doesExist("email",$email))
    sendError("email_already_taken","registerForCompany");
$newCompany = new Company(
    $companyName,
    $email,
    $password,
    $description,
    $sector,
    $subSector,
    $size,
    $foundationDate,
    $phone,
    $country,
    $region,
    $address
);
//check if the email is already used
if (CompanyRepository::doesExist("email",$email))
    sendError("email_already_exists","registerForCompany");
CompanyRepository::insert($newCompany);
uploadPictureCompany($newCompany);

$_SESSION["currentUser"] = $newCompany;
//header("Location: homePage.php");
sendSuccess("register_success","companyprofile");


