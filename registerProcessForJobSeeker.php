<?php
include_once "allFrags.php";
session_start();
if(!isset($_POST["Email"])) {
    sendError("sign_up_first", "login");
}
$email = $_POST["Email"];
$firstName = $_POST["FirstName"];
$lastName = $_POST["LastName"];
$password = $_POST["Password"];
$gender = $_POST["gender"];
$number = $_POST["phone"];
$birthdate = $_POST["birthdate"];
$country = $_POST["Country"];
$region = $_POST["region"];
$address = $_POST["address"];
$education = $_POST["education"];
$section = $_POST["section"];
$subSection = $_POST["subSection"];
$experience = $_POST["experience"];
$bio = $_POST["bio"];


$newUser = new JobSeeker( $email ,
         $password ,
         $firstName ,
         $lastName ,
         $gender ,
         $number ,
         $birthdate ,
         $country ,
         $region ,
         $address ,
         $education ,
         $section ,
         $subSection ,
         $experience,
         $bio
        );
if (JobSeekerRepository::doesExist("email",$email))
    sendError("email_already_exists","registerForJobSeeker");
JobSeekerRepository::insert($newUser);
$newUser = JobSeekerRepository::getOneWhere("email",$newUser->email,"password",$newUser->password);
if (isFileUploaded("ProfilePicture")){
    $dir = "assets/data/jobSeeker/".$newUser->email;
    if (!file_exists($dir)) mkdir($dir, 0777, true);
    moveFileTo("ProfilePicture",$dir);
    renameFile($dir . "/" . $_FILES["ProfilePicture"]["name"] ,"pdp");
    $newUser->modify("hasPhoto",true);
}

$_SESSION["currentUser"] = $newUser;
header("Location: homePage.php");







