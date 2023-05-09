<?php
include_once "allFrags.php";
$liste = (Sector::getSectors());
foreach ($liste as $sec){
    echo $sec->id ." ". $sec->description. " <br> ";
    $sub = Sector::getSubSectorsOf($sec->id);
    foreach ($sub as $s) {
        echo "|--->    ". $s->id . " " . $s->description . " <br> ";
    }
}