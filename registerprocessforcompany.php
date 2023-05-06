<?php
include_once 'allFrags.php';
if(!isset($_POST["email"])) {
    sendError("sign_up_first","login");
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
if (isFileUploaded("logo")){
    $dir = "assets/data/Company/".$newCompany->email;
    if (!file_exists($dir)) mkdir($dir, 0777, true);
    moveFileTo("logo",$dir);
    renameFile($dir . "/" . $_FILES["logo"]["name"] ,"pdp");
    $newCompany->modify("hasLogo",true);
}

$_SESSION["currentUser"] = $newCompany;
header("Location: homePage.php");


