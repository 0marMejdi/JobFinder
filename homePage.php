<?php
include_once "allFrags.php";
includeHeader("Home");
needsAuthentication();
$detail = $_SESSION["currentUser"];
$str = "name: $detail->name   <br> Last Name : $detail->lastName <br>";
$str .= "Password: $detail->password   <br>  E-mail : $detail->email";
?>

<body>
    <div class="container">
        <div class="alert alert-info"> Welcome to HomePage</div>

        <?=$str?>
        <form action="disconnect.php" method="post">
            <button class="w-100 btn btn-light btn btn-outline-success btn-success" type="submit">Disconnect</button>
        </form>
    </div>
</body>
