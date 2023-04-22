<?php
require_once 'CRUDUSERS.php';
require_once 'ConnexionBD.php';
$FirstName= $_POST['FirstName'];
$LastName= $_POST['LastName'];
$Email= $_POST['Email'];
$Password= $_POST['Password'];
$Date=$_POST['Date'];
CRUDUSERS::create($FirstName,$LastName,$Email,$Password,$Date);
header("Location: ../login.html");
exit;
?>