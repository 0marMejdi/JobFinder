<?php

foreach (glob("../frags/*.php") as $filename) {
    include_once $filename;
}
foreach (glob("../frags/classes/*.php") as $filename) {
    include_once $filename;
}
