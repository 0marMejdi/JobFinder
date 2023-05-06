<?php
// create a class that lets me connect to the phpmyadmin database in the constructor using PDO
class ConnexionBD
{
    private static  $_dbname = "JobFinder";
    private static $_user = "root";
    private static $_pwd = "";
    private static $_host = "localhost";
    private static $_bdd = null;
    private function __construct()
    {
        try {
            self::$_bdd = new PDO("mysql:host=".self::$_host.";dbname=".self::$_dbname.";charset=utf8", self::$_user, self::$_pwd);
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
    public static function GetInstance()
    {
        if (!self::$_bdd) {
            new ConnexionBD();
        }
        return self::$_bdd;
    }
    public static function checkTables(){
        $tableCompanies =
            "CREATE TABLE IF NOT EXISTS companies(
                `id` int PRIMARY KEY AUTO_INCREMENT,
                `email` varchar(30),        
                `name` varchar(30) ,
                `password` varchar(50),
                `description` varchar(100),
                `sector` varchar(30),
                `size` int,
                `foundationDate` DATE,
                `phoneNumber` varchar(15),
                `country` varchar(20),
                `state` varchar(20),
                `address` varchar(50),
                `hasLogo` BOOLEAN
            );
";
        $tableJobSeekers =
            "CREATE TABLE IF NOT EXISTS jobSeeker(
                    id INT PRIMARY KEY AUTO_INCREMENT,
                    email VARCHAR(320),
                    firstName VARCHAR(30),
                    lastName VARCHAR(255),
                    password VARCHAR(255),
                    userType VARCHAR(255),
                    gender VARCHAR(255),
                    number VARCHAR(255),
                    birthdate VARCHAR(255),
                    country VARCHAR(255),
                    region VARCHAR(255),
                    address VARCHAR(255),
                    education VARCHAR(255),
                    section VARCHAR(255),
                    subSection VARCHAR(255),
                    experience int,
                    bio VARCHAR(65535),
                    hasPhoto BOOLEAN
);
            
            ";
        self::GetInstance()->query($tableCompanies);
        self::GetInstance()->query($tableJobSeekers);
    }
}
?>