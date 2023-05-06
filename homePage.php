<?php
include_once "allFrags.php";
includeHeader("Home");
//needsAuthentication();
session_start();
$detail = $_SESSION["currentUser"];
$picDir ="";
if ($detail->hasPhoto) {
    $picDir = "assets/data/JobSeeker/" . $detail->email . "/";
    if (findPictureWithSuffix("pdp", $picDir))
        $picDir = findPictureWithSuffix("pdp", $picDir);
    else $picDir = "assets/templates/default-profile-icon-24.jpg";
}
else
    $picDir = "assets/templates/default-profile-icon-24.jpg";
echo $detail;
?>

<body>

    <div class="container">
        <img src="<?php echo $picDir ?>" alt="Profile Picture" class="rounded-circle" width="200" height="200">
        <div class="alert alert-info"> Welcome to HomePage</div>
        <form action="disconnect.php" method="post">
        <p> </p>

            <button class="w-100 btn btn-light btn btn-outline-success btn-success" type="submit">Disconnect</button>
        </form>
    </div>
</body>
