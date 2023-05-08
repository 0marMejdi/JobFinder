<?php
include_once "allFrags.php";
includeHeader("Home");
//needsAuthentication();
session_start();
$detail = $_SESSION["currentUser"];
echo $detail;
?>
<body>
    <div class="container">
        <div class="alert alert-info"> Welcome to HomePage</div>

        <form action="disconnect.php" method="post">
            <button class="w-100 btn btn-light btn btn-outline-success btn-success" type="submit">Disconnect</button>
        </form>
    </div>
</body>
