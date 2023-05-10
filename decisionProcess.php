<?php
include_once "allFrags.php";
if (!isset($_GET['id']) ||!isset($_GET['status']))
    sendError("cant_access_directly","jobApplications");
$id=$_GET['id'];
$status=$_GET['status'];
JobApplicationRepository::updateByID("id",$id,"status",$status);
header("Location: jobApplications.php");