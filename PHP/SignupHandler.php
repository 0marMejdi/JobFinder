<?php
require_once 'CRUDUSERS.php';
require_once 'ConnexionBD.php';
$FirstName= $_POST['FirstName'];
$LastName= $_POST['LastName'];
$Email= $_POST['Email'];
$Password= $_POST['Password'];
$Date=$_POST['Date'];
if (CRUDUSERS::readOne($Email)>0) {
    /*header("Location: ../register.php?error=1");
    */
    session_start();
    $_SESSION['error']=1;
    header("Location: ../register.php");
}
else {
    CRUDUSERS::create($FirstName, $LastName, $Email, $Password, $Date);
//setcookie('aziz',true,time()+60*3);
    header("Location: ../index.php");
}
?>