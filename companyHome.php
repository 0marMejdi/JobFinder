<!DOCTYPE html>
<html lang="en">

<head>

    <title>Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- logo -->
    <link href="assets\img\logo.png" rel="icon">

    <!-- CSS -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="fixed-top d-flex align-items-center">
            <div class="container d-flex align-items-center justify-content-between">

                <div class="logo">
                    <h1><a href="companyProfile.php">JobFinder</a></h1>
                </div>

                <nav id="navbar" class="navbar">

                    <ul>
                        <li><a class="nav-link scrollto active" href="companyHome.php">Home</a></li>
                        <li><a class="nav-link scrollto " href="companyProfile.php">My Profile</a></li>
                        <li><a class="nav-link scrollto" href="companyjoboffers.php">My Job Offers</a></li>
                        <li><a class="login " href="login.php">Disconnect</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav><!-- .navbar -->

            </div>
        </header><!-- End Header -->


        <br><br>

        <main>
            <section id="job-offers" class="job-offers">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Job Offers</h2>
                        <p>View the job offers below.</p>
                    </div>

                    <div class="align-items-stretch">
                        <div class="card">
                            <div class="card-header">
                                <h4>Job Title</h4>
                                <div class="job-post-date">Posted on: <span>June 1, 2023</span></div>
                            </div>
                            <div class="card-body">
                                <p>Job Description</p>
                                <ul>
                                    <li><strong>Salary:</strong> $60,000 - $80,000</li>
                                    <li><strong>Company: </strong>XYZ Company </li>
                                </ul>
                            </div>
                            
                        </div>

                    </div>
            </section>

            <section id="create-job-offer" class="create-job-offer">
                <div class="container" data-aos="fade-up">
                    <div class="section-title">
                        <h2>Create a Job Offer</h2>
                        <p>Fill out the form below to create a new job offer.</p>
                    </div>

                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="job-title">Job Title</label>
                                    <input type="text" class="form-control" id="job-title" name="job-title" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="salary-range">Salary Range</label>
                                    <input type="text" class="form-control" id="salary-range" name="salary-range"
                                        required>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="job-description">Job Description</label>
                            <textarea class="form-control" id="job-description" name="job-description" rows="5"
                                required></textarea>
                        </div>



                        <button type="submit" class="btn btn-primary">Create Job Offer</button>
                    </form>
                </div>
            </section>
        </main>



        <!-- ======= Footer ======= -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p class="text-center">
                            Contact Us: Phone: +216 92 220 708 | Email: info@jobfinder.com | Address: Centre Urbain Nord
                            BP
                            676 - 1080
                            Tunis
                        </p>
                    </div>
                </div>
            </div>
        </footer>



        <!-- End Footer -->



        <!-- JS -->
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/js/main.js"></script>

    </body>

</html>