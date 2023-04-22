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
}
?>