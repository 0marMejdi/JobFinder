<?php
include "allFrags.php";
session_start();
ConnexionBD::checkTables();
include_once 'allFrags.php';
needsAuthentication();
$user=$_SESSION["currentUser"];
if ($user->userType=="Company")
    header("Location: Companyprofile.php");
if (JobSeekerRepository::doesExist("email",$user->email))
    $user=JobSeekerRepository::getOneWhere("email",$user->email);
else
    sendError("user_not_found","login");
if (!isset($_GET["id"]))
{
    sendError("job_offer_not_found","jobseekerprofile");
}
$jobofferid=$_GET["id"];
if (!JobOfferRepository::doesExist("id",$jobofferid))
{
    sendError("job_offer_not_found","jobseekerprofile");
}
//get company email from the job offer while handling errors
$joboffer=JobOfferRepository::getOneWhere("id",$jobofferid);
if (JobApplicationRepository::doesExist("jobOfferID",$jobofferid,"jobSeekerEmail",$user->email))
{
    sendError("already_applied","jobseekerprofile");
}
$jobapplication=new JobApplication($jobofferid,$user->email,$joboffer->companyEmail,"pending",date("Y-m-d"));
//print all jobapplication attributes
echo $jobapplication->jobOfferId."<br>";
echo $jobapplication->jobSeekerEmail."<br>";
echo $jobapplication->companyEmail."<br>";
echo $jobapplication->status."<br>";
echo $jobapplication->applicationdate."<br>";
echo $jobapplication->id."<br>";
JobApplicationRepository::insert($jobapplication);
//header("Location: userhome.php");
