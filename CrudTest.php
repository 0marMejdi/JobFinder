<?php
include_once "allFrags.php";
includeHeader("Inserting");

function insertWithMessage($user){
    if($errorCode = UserRepository::insertUser($user)){
        ?>  <div class="alert alert-danger" > <?= $errorCode ?></div>  <?php

    }else{
        ?>    <div class="alert alert-success" > inserted successfully</div>  <?php
    }
}

$db = ConnexionBD::GetInstance();
ConnexionBD::checkTables();
UserRepository::deleteUsersWhere();
$user1 = new User("omar", "mejdi", "omar.mejdi@insat.ucar.tn","******","Male","99994116","2002-07-12","Tunisia","Tunis",false,"Dev");
$user2 = new User("ghassen","cherif","ghassen.cherif@insat.ucar.tn","xxxxxx","Male","","","Tunisia","" ,);
$user3 = new User("Aziz", "Balti","Aziz@balti","0000","male");
$user4 = new User("Dem7a","Sillini","dem7a@isDem7a","azerty","male","secret");
insertWithMessage($user1);
insertWithMessage($user2);
insertWithMessage($user3);
insertWithMessage($user4);
UserRepository::deleteUsersWhere("name","hood");
//
$obj = UserRepository::getUsersBy_And();
foreach ($obj as $ob) {
    echo $ob."<br>";
}
