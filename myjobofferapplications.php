<?php
//chabeb hedhi for the company win bech ychoufou applications l jeywhom
include "allFrags.php";
session_start();
needsAuthentication();
$user=$_SESSION["currentUser"];
if ($user->isJobSeeker())
    header("Location: jobseekerprofile.php");
if (CompanyRepository::doesExist("email",$user->email))
    $user=CompanyRepository::getOneWhere("email",$user->email);
else
    sendError("'current_user_not_found","login");
$jobapplications=JobApplicationRepository::getAllWhere("companyEmail",$user->email);
?>

