<?php
// chabeb hedhi lel applications taa e jobseeker win bech ychoufouhom
include "allFrags.php";
session_start();
ConnexionBD::checkTables();

needsAuthentication();
$user=$_SESSION["currentUser"];
if ($user->userType=="Company")
    header("Location: Companyprofile.php");
if (JobSeekerRepository::doesExist("email",$user->email))
    $user=JobSeekerRepository::getOneWhere("email",$user->email);
else
    sendError("user_not_found","login");
$jobapplications=JobApplicationRepository::getAllWhere("jobSeekerEmail",$user->email);
