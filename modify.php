<?php
session_start();

$user = $_SESSION["currentUser"];
// Assuming that the $user object is already created and available
$user->modify($_POST["attributeName"], $_POST["attributeValue"]);
echo "OK";

?>
