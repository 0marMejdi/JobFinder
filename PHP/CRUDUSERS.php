<?php
// make a class called CRUD that contains functions to create, read, update and delete data from the database through ConnexionBD
class CRUDUSERS
{
    public static function create($firstname, $lastname, $email, $password, $date)
    {
        $bdd = ConnexionBD::getInstance();
        $requete = "INSERT INTO `users`(`FirstName`, `LastName`, `Email`, `Password`, `DateOfBirth`)
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
    public static function readById($id)
    {
        echo "Read the data from the table aziz by id:{$id} <br>";
        $bdd = ConnexionBD::getInstance();
        //$requete="SELECT * FROM aziz WHERE id=$id";
        $requete=$bdd->prepare("SELECT * FROM users WHERE id=:id");
        $requete->excute(array('id'=>$id));
        $obj= $requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($obj as $key) {
            echo "id= {$key->id} name= {$key->name} surname= {$key->surname} address= {$key->address} <br>";
        }
    }
    //make a function to read by name like the code above using the prepare,excute functions
    public static function readByName($name)
    {
        echo "Read the data from the table aziz by name:{$name} <br>";
        $bdd = ConnexionBD::getInstance();
        $requete=$bdd->prepare("SELECT * FROM aziz WHERE name=:name");
        $requete->excute(array('name'=>$name));
        $obj= $requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($obj as $key) {
            echo "id= {$key->id} name= {$key->name} surname= {$key->surname} address= {$key->address} <br>";
        }    }
    public static function readBySurname($surname)
    {
        echo "Read the data from the table aziz by surname:{$surname} <br>";
        $bdd = ConnexionBD::getInstance();
        $requete=$bdd->prepare("SELECT * FROM aziz WHERE surname=:surname");
        $requete->excute(array('surname'=>$surname));
        $obj= $requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($obj as $key) {
            echo "id= {$key->id} name= {$key->name} surname= {$key->surname} address= {$key->address} <br>";
        }    }
    public static function readByAddress($address)
    {
        echo "Read the data from the table aziz by address:{$address} <br>";
        $bdd = ConnexionBD::getInstance();
        $requete=$bdd->prepare("SELECT * FROM aziz WHERE address=:address");
        $requete->excute(array('address'=>$address));
        $obj= $requete->fetchAll(PDO::FETCH_OBJ);
        foreach ($obj as $key) {
            echo "id= {$key->id} name= {$key->name} surname= {$key->surname} address= {$key->address} <br>";
        }    }
    public static function  updateById($id,$name,$surname,$address)
    {
        $bdd = ConnexionBD::getInstance();
        $requete=$bdd->prepare("UPDATE aziz SET name=:name,surname=:surname,address=:address WHERE id=:id");
        $requete->excute(array('id'=>$id,'name'=>$name,'surname'=>$surname,'address'=>$address));
        echo "Update successfully! <br>";
    }
    public static function deleteById($id)
    {
        $bdd = ConnexionBD::getInstance();
        $requete=$bdd->prepare("DELETE FROM aziz WHERE id=:id");
        $requete->execute(array('id'=>$id));
        echo "Delete successfully! <br>";
    }

}