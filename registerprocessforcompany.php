<?php
include_once 'allFrags.php';
if(!isset($_POST["Email"])) {
    sendError("sign_up_first","login");
}
// get the data from the form
$Password = $_POST["Password"];
//read names from the form
$Name = $_POST["Name"];
$Email = $_POST["Email"];
$PhoneNumber = $_POST["PhoneNumber"];
$Country   = $_POST["Country"];
$State= $_POST["State"];
$Address = $_POST["Address"];
$Sector = $_POST["Sector"];
$Size = $_POST["Size"];
$Size = intval($Size);
$FoundationDate = $_POST["FoundationDate"];
$Description = $_POST["Description"];
//create a new company
$newCompany = new Company($Name."",$Email."",$Password."",$Description."",$Sector."",$Size,$FoundationDate."",$PhoneNumber."",$Country."",$State."",$Address."");
//insert the company in the database
//CompanyRepository::insertCompany($newCompany);
//get the company from the database
//in the works on the database :
//$newCompany = CompanyRepository::getOnlyCompanyBy_And("email",$newCompany->email,"password",$newCompany->password);
//if the company has a logo
if (isFileUploaded("ProfilePicture")){
    //create a directory for the company
    $dir = "assets/data/companies/".$newCompany->id;
    if (!file_exists($dir)) mkdir($dir, 0777, true);
    //move the logo to the directory
    moveFileTo("Logo",$dir);
    //rename the logo to "logo"
    renameFile($dir . "/" . $_FILES["Logo"]["name"] ,"logo");
    //set the hasLogo attribute to true
    $newCompany->setHasLogo();
}
//save the company in the session as current user
session_start();
$_SESSION["currentUser"] = $newCompany;
//redirect to the home page
header("Location: homePage.php");
?>
