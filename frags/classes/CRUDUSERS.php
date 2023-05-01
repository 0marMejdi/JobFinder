<?php
// make a class called CRUD that contains functions to create, read, update and delete data from the database through ConnexionBD
class CRUDUSERS
{
    public static function create($firstname, $lastname, $email, $password, $date)
    {
        $bdd = ConnexionBD::getInstance();
        $requete = "INSERT INTO `users`(`'FirstName`, `LastName`, `Email`, `Password`, `DateOfBirth`)
                    VALUES ('{$firstname}','{$lastname}','{$email}','{$password}','{$date}')";
        $reponse = $bdd->prepare($requete);
        $reponse->execute();
        echo "Added successfully! <br>";
    }
    //create read functions with all the attritubes of the table users FirstName,LastName,Email,Password,DateOfBirth
    public static function read()
    {
        echo "Read the data from the table users <br>";
        $bdd = ConnexionBD::getInstance();
        $requete = "SELECT * FROM users";
        $reponse = $bdd->prepare($requete);
        $reponse->execute();
        $obj = $reponse->fetchAll(PDO::FETCH_OBJ);
        foreach ($obj as $key) {
            echo "FirstName= {$key->FirstName} , LastName= {$key->LastName} , Email= {$key->Email} , Password= {$key->Password} , DateOfBirth= {$key->DateOfBirth} <br>";
        }
    }
    // create all crud functions for the table users FirstName,LastName,Email,Password,DateOfBirth with prepare statements
public static function update($firstname, $lastname, $email, $password, $date)
    {
        $bdd = ConnexionBD::getInstance();
        $requete = "UPDATE `users` SET `FirstName`='{$firstname}',`LastName`='{$lastname}',`Email`='{$email}',`Password`='{$password}',`DateOfBirth`='{$date}' WHERE `Email`='{$email}'";
        $reponse = $bdd->prepare($requete);
        $reponse->execute();
        echo "Updated successfully! <br>";
    }
    public static function delete($email)
    {
        $bdd = ConnexionBD::getInstance();
        $requete = "DELETE FROM `users` WHERE `Email`='{$email}'";
        $reponse = $bdd->prepare($requete);
        $reponse->execute();
        echo "Deleted successfully! <br>";
    }
    public static function readOne($email)
    {
        echo "Read the data from the table users <br>";
        $bdd = ConnexionBD::getInstance();
        $requete = "SELECT * FROM users WHERE `Email`='{$email}'";
        $reponse = $bdd->prepare($requete);
        $reponse->execute();
        $obj = $reponse->fetchAll(PDO::FETCH_OBJ);
        /*foreach ($obj as $key) {
            echo "FirstName= {$key->FirstName} , LastName= {$key->LastName} , Email= {$key->Email} , Password= {$key->Password} , DateOfBirth= {$key->DateOfBirth} <br>";
        }
        */
        return $reponse->rowCount();
    }
}