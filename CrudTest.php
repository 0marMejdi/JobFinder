<?php
include_once "allFrags.php";
includeHeader("Inserting");

function insertWithMessage($user){
    if($errorCode = JobSeekerRepository::insertUser($user)){
        ?>  <div class="alert alert-danger" > <?= $errorCode ?></div>  <?php

    }else{
        ?>    <div class="alert alert-success" > inserted successfully</div>  <?php
    }
}

$db = ConnexionBD::GetInstance();
ConnexionBD::checkTables();
JobSeekerRepository::deleteUsersWhere();
$user1 = new JobSeeker("omar", "mejdi", "omar.mejdi@insat.ucar.tn","******","Male","99994116","2002-07-12","Tunisia","Tunis",false,"Dev");
$user2 = new JobSeeker("ghassen","cherif","ghassen.cherif@insat.ucar.tn","xxxxxx","Male","","","Tunisia","" ,);
$user3 = new JobSeeker("Aziz", "Balti","Aziz@balti","0000","male");
$user4 = new JobSeeker("Dem7a","Sillini","dem7a@isDem7a","azerty","male","secret");
insertWithMessage($user1);
insertWithMessage($user2);
insertWithMessage($user3);
insertWithMessage($user4);
JobSeekerRepository::deleteUsersWhere("name","hood");
//
$obj = JobSeekerRepository::getUsersBy_And();
foreach ($obj as $ob) {
    echo $ob."<br>";
}
