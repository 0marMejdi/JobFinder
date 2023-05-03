<?php
    function load($classname){
        include_once("frags/classes/$classname.php");
    }
    spl_autoload_register("load");