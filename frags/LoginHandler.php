<?php
require_once 'classes/CRUDUSERS.php';
require_once 'classes/ConnexionBD.php';
$Email= $_POST['email'];
$Password= $_POST['password'];
if (CRUDUSERS::readOne($Email)>0) {
    $bdd = ConnexionBD::getInstance();
    $requete = "SELECT * FROM users WHERE `Email`='{$Email}'";
    $reponse = $bdd->prepare($requete);
    $reponse->execute();
    $obj = $reponse->fetchAll(PDO::FETCH_OBJ);
    foreach ($obj as $key) {
        if ($key->Password==$Password) {
            header("Location: ../index.php");
        }
        else {
            header("Location: ../login.php?error=1");
        }
    }
}
else {
    header("Location: ../login.php?error=1");
}
?>
