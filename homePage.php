<?php
include_once "allFrags.php";
includeHeader("Home");
needsAuthentication();

?>

<body>

    <div class="container">
        <?=showErrorIfExists()?>
        <?php $detail = $_SESSION["currentUser"];
        $picDir ="";
        if($detail->isJobSeeker()){
            if ($detail->hasPhoto) {
                $picDir = "assets/data/JobSeeker/" . $detail->email . "/";
                if (findPictureWithSuffix("pdp", $picDir))
                    $picDir = findPictureWithSuffix("pdp", $picDir);
                else $picDir = "assets/templates/default-profile-icon-24.jpg";
            }
            else
                $picDir = "assets/templates/default-profile-icon-24.jpg";
            echo $detail;
        }else{
            if ($detail->hasLogo) {
                $picDir = "assets/data/Company/" . $detail->email . "/";
                if (findPictureWithSuffix("pdp", $picDir))
                    $picDir = findPictureWithSuffix("pdp", $picDir);
                else $picDir = "assets/templates/default-company.jpg";
            }
            else
                $picDir = "assets/templates/default-company.jpg";
            echo $detail;
        }

        ?>
        <img src="<?php echo $picDir ?>" alt="Profile Picture" class="rounded-circle" width="200" height="200">
        <div class="alert alert-info"> Welcome to HomePage</div>
        <form action="disconnect.php" method="post">
        <p> </p>

            <button class="w-100 btn btn-light btn btn-outline-success btn-success" type="submit">Disconnect</button>
        </form>
    </div>
</body>
