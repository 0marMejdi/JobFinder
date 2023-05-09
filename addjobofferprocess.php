<?php
//get all the inputs from the form in addJobOffer.php
include 'allFrags.php';
ConnexionBD::checkTables();
session_start();
needsAuthentication();
$jobTitle = $_POST["JobTitle"];
$jobDescription = $_POST["jobDescription"];
$WorkTime = $_POST["qusOne"];
$WorkType = $_POST["qusTwo"];
$ContractType= $_POST["qusThree"];
$Location= $_POST["Location"];
$Education= $_POST["education"];
$Experience= $_POST["experiencerequired"];
$salary= $_POST["salary"];
echo"Title : $jobTitle <br>";
echo"Description : $jobDescription <br>";
echo"WorkTime : $WorkTime <br>";
echo"WorkType : $WorkType <br>";
echo"ContractType : $ContractType <br>";
echo"Location : $Location <br>";
echo"Education : $Education <br>";
echo"Experience : $Experience <br>";
echo"Salary : $salary <br>";

//testing if
//create a new job offer object using the conctructor in the JobOffer class
$joboffer=new JobOffer($jobTitle,$jobDescription,$WorkTime,$WorkType,$ContractType,$Location,$Education,$Experience,$salary);
//insert the job offer object into the database
JobOfferRepository::insert($joboffer);
echo $joboffer->id;
$test=JobOfferRepository::getOneWhere("id",$joboffer->id);
echo $test->id;
//redirect to the job offers page
//header("Location: joboffers.php");