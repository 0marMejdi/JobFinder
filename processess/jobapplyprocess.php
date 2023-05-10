<?php
include "allFrags.php";
session_start();
//ConnexionBD::checkTables();
include_once 'allFrags.php';
// should be authenticated and not access directly

if (!isAuthenticated()){
    sendError("unauthenticated","../login");
}
if(!isset($_GET["id"])) { // Todo :: are we sure it is a GET ?
    sendError("cannot_access_directly","../jobSeekerProfile.php");
}

$user=$_SESSION["currentUser"];
// exclusive page for  "Job Seekers "
if ($user->isCompany())
    header("Location: CompanyProfile.php");
//TODO :: delete this, user is already logged in here, his information  should be already in database so this check is redondant
/*
if (JobSeekerRepository::doesExist("email",$user->email))
    $user=JobSeekerRepository::getOneWhere("email",$user->email);
else
    sendError("current_user_not_found","../login");*/


/**
 * this part of code checks id, if it exists, it shows the offer, if it doesn't it redirects to your profile
 */

if (!isset($_GET["id"]))
{
    sendError("job_offer_not_found","../jobseekerprofile");
}
$jobofferid=$_GET["id"];
if (!JobOfferRepository::doesExist("id",$jobofferid))
{
    sendError("job_offer_not_found","../jobseekerprofile");
}
//get company email from the job offer while handling errors
$joboffer=JobOfferRepository::getOneWhere("id",$jobofferid);
if (JobApplicationRepository::doesExist("jobOfferID",$jobofferid,"jobSeekerEmail",$user->email))
{
<<<<<<< Updated upstream:processess/jobapplyprocess.php
    sendError("already_applied","../jobseekerprofile");
}
$jobapplication=new JobApplication($jobofferid,$user->email,$joboffer->companyEmail,"pending",date("Y-m-d"));
//print all jobapplication attributes
echo $jobapplication->jobOfferId."<br>";
echo $jobapplication->jobSeekerEmail."<br>";
echo $jobapplication->companyEmail."<br>";
echo $jobapplication->status."<br>";
echo $jobapplication->applicationdate."<br>";
echo $jobapplication->id."<br>";
=======
    sendError("already_applied","userhome");
}
$aboutme=$_POST["aboutme"];
echo $aboutme;
$jobapplication=new JobApplication($jobofferid."",$user->email."",$joboffer->companyEmail."","pending",date("Y-m-d"),$aboutme."");
>>>>>>> Stashed changes:jobapplyprocess.php
if (! JobApplicationRepository::insert($jobapplication))
    sendError('cannot_add_job_apply', "../index"); // TODO :: change index
//TODO :: send success to userhome
<<<<<<< Updated upstream:processess/jobapplyprocess.php
//header("Location: ../userhome.php");
=======
header("Location: userhome.php");


>>>>>>> Stashed changes:jobapplyprocess.php
