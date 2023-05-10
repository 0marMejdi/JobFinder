<?php
include_once "allFrags.php";
JobOfferRepository::updateByID("id",$_GET['id'],"salary",-1);
header("Location: JobOffer.php?id=".$_GET['id']);