<?php
include_once "allFrags.php";
if(!isset($_POST["Email"])) {
    sendError("sign_up_first","login");
}
$Password = $_POST["Password"];
$FirstName = $_POST["FirstName"];
$LastName = $_POST["LastName"];
$Email = $_POST["Email"];
$Date = $_POST["Date"];
$PhoneNumber = $_POST["PhoneNumber"];
$gender = $_POST["gender"];
$Country   = $_POST["Country"];
$State= $_POST["State"];
$userType = $_POST["userType"];

//$ProfilePicture = $_FILES["ProfilePicture"];
$newUser = new User($FirstName,$LastName,$Email,$Password,$gender,$PhoneNumber,$Date,$Country,$State);
UserRepository::insertUser($newUser);
$newUser = UserRepository::getOnlyUserBy_And("email",$newUser->email,"password",$newUser->password);
if (isFileUploaded("ProfilePicture")){
    $dir = "assets/data/jobSeekers/".$newUser->id;
    if (!file_exists($dir)) mkdir($dir, 0777, true);
    moveFileTo("ProfilePicture",$dir);
    renameFile($dir . "/" . $_FILES["ProfilePicture"]["name"] ,"pdp");
    $newUser->modify("hasPhoto",true);
}


echo $newUser->id;
echo "################<br>";
echo $newUser;
if ($newUser->hasPhoto){
    ?>
    <div>
        <img id="pdp"  src="assets/data/jobSeekers/<?= $newUser->id ?>/pdp.jpg" alt="Preview Image"  width="200" height="200">

    </div>
    <?php
}







