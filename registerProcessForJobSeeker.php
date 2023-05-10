<?php
include_once 'allFrags.php';
session_start();
ConnexionBD::checktables();

//needs to be unauthenticated and cannot access directly

if (isAuthenticated()){
    sendError("already_logged_in","homePage");
}
if(!isset($_POST["Email"])) {
    sendError("cannot_access_directly","login");
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
$title = $_POST["title"];

$bio = $_POST["bio"];
if (CompanyRepository::doesExist("email",$email))
    sendError("email_already_taken","registerForJobSeeker");

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
         $bio,
         $title
        );

if (JobSeekerRepository::doesExist("email",$email))
    sendError("email_already_exists","registerForJobSeeker");
if (! JobSeekerRepository::insert($newUser)) {
    sendError("cannot_insert_into_database","registerForJobSeeker");
}
if (isFileUploaded("ProfilePicture")){
    $dir = "assets/data/jobSeeker/" . $newUser->email;
    if (!file_exists($dir)) mkdir($dir, 0777, true);
    moveFileTo("ProfilePicture",$dir);
    renameFile($dir . "/" . $_FILES["ProfilePicture"]["name"] ,"pdp");
    $newUser->modify("hasPhoto",true);
}

$_SESSION["currentUser"] = $newUser;
sendSuccess("register_success","UserHome");