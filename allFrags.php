<?php
//include_once "frags/classConverter.php";
//include_once "frags/header.php";
//include_once "frags/authenticationManagement.php";
//include_once "frags/errorManagement.php";
//include_once "frags/filesHandling.php";
foreach (glob("frags/*.php") as $filename) {
    include_once $filename;
}
foreach (glob("frags/classes/*.php") as $filename) {
    include_once $filename;
}
require_once("autoload.php");
// include_once "frags/classes/ConnexionBD.php";
// include_once "frags/classes/ObjectRepository.php"
// include_once "frags/classes/JobSeekerRepository.php";
// include_once "frags/classes/JobSeeker.php";
