<?php
// chabeb hedhi lel applications taa e jobseeker win bech ychoufouhom
include "allFrags.php";
session_start();
ConnexionBD::checkTables();

needsAuthentication();
$user=$_SESSION["currentUser"];
// Redirecting companies to their profile as they don't have the right to see this page
if ($user->isCompany())
    header("Location: CompanyProfile.php");
if (JobSeekerRepository::doesExist("email",$user->email))
    $user=JobSeekerRepository::getOneWhere("email",$user->email);
else {
    unset($_SESSION["currentUser"]);
    sendError("current_user_not_found", "login");

}
$jobapplications=JobApplicationRepository::getAllWhere("jobSeekerEmail",$user->email);
