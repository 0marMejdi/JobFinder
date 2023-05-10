<?php
function includeNavBarJobSeeker(){
    echo '
    <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <div class="logo">
                    <h1><a href="jobseekerprofile.php">JobFinder</a></h1>
                </div>

                <nav id="navbar" class="navbar">

                    <ul>
                        <li><a class="nav-link scrollto" href="userhome.php">Home Page</a></li>
                        <!-- well work on it ghodwa -->
                        <li><a class="nav-link scrollto active" href="jobseekerprofile.php">My Profile</a></li>
                        <li><a class="nav-link scrollto" href="">I will get to this ghodwa xd</a></li>
                        <li><a class="login " href="disconnect.php">Disconnect</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->
    ';
}