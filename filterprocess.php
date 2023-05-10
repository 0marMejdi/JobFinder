<?php
//get all attributes from the POST request in UserHome
include "allFrags.php";
$title=$_POST["title"];
$worktime=$_POST["worktime"];
$worktype=$_POST["worktype"];
$contractype=$_POST["contracttype"];
$experience=$_POST["experience"];
$salarymin=$_POST["salarymin"];
$salarymax=$_POST["salarymax"];
$wherestatement="WHERE 1 ";
if ($title!="")
{
    $wherestatement.="AND title LIKE '%$title%'  ";
}
if ($worktime!="")
{
    $wherestatement.="AND workTime='$worktime'  ";
}
if ($worktype!="")
{
    $wherestatement.="AND workType='$worktype'  ";
}
if ($contractype!="")
{
    $wherestatement.="AND contractType='$contractype'  ";
}
if ($experience!="")
{
    $wherestatement.="AND experience<='$experience'  ";
}
if ($salarymin!="")
{
    $wherestatement.="AND salary>='$salarymin'  ";
}
if ($salarymax!="")
{
    $wherestatement.="AND salary<='$salarymax' ";
}
if ($wherestatement=="WHERE 1 AND")
{
    $wherestatement="";
}
$sql="SELECT * FROM joboffer ".$wherestatement;
$bd=ConnexionBD::GetInstance();
$reponse=$bd->query($sql);
$reponse=$reponse->fetchAll(PDO::FETCH_OBJ);
session_start();
$_SESSION["filter"]=$reponse;
header("Location: UserHome.php");
?>
