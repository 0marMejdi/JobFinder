<?php
function includeNavBarJobSeeker($whoIsActive){
    $whoIsActive.=".php";
    ?>
    <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

        <div class="logo">
            <h1><a href="index.php">JobFinder</a></h1>
        </div>

        <nav id="navbar" class="navbar">

            <ul>
                <li><a class="nav-link scrollto" href="userhome.php">Home </a></li>
                <!-- well work on it ghodwa -->
                <li><a class="nav-link scrollto " href="jobseekerprofile.php">My Profile</a></li>
                <li><a class="nav-link scrollto" href="jobseekerjobapplications.php">My Job Applications</a></li>
                <li><a class="login " href="disconnect.php">Disconnect</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->
<script>
    let activeBar = document.querySelector('a[href="<?=$whoIsActive?>"]');

    activeBar.classList.add("active");

</script>

    ';

<?php
}?>
