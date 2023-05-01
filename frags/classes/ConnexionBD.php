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
        $tableUsers =
            "CREATE TABLE IF NOT EXISTS Employers(
                `id` int PRIMARY KEY AUTO_INCREMENT,
                `email` varchar(50), 
                `name` varchar(30),
                `lastName` varchar(30), 
                `password` varchar(50),
                `hasPhoto` BOOLEAN,
                `gender` varchar(10), 
                `number` varchar(15),
                `birthdate` DATE,
                `country` varchar(20),
                `state` varchar(20),
                `personType` varchar(20)
            );
            ";
        $tableEmployers =
            "CREATE TABLE IF NOT EXISTS Users(
                `id` int PRIMARY KEY AUTO_INCREMENT,
                `email` varchar(30), 
                `name` varchar(30) ,
                `lastName` varchar(30), 
                `password` varchar(50),
                `hasPhoto` BOOLEAN,
                `gender` varchar(10), 
                `number` varchar(15),
                `birthdate` DATE,
                `country` varchar(20),
                `state` varchar(20),
                `hasResume` BOOLEAN,
                `idealJob` varchar(30),
                `personType` varchar(20)
                                
            );                    
            ";
        self::GetInstance()->query($tableEmployers);
        self::GetInstance()->query($tableUsers);
    }
}
?>