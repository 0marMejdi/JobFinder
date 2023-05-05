<?php
include_once "allFrags.php";

ConnexionBD::checkTables();
//     session_start();
// //    sendError("wrong_password","login");
//     header("Location: login.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <title>JobFinder</title>
  
<!-- logo -->
  <link href="assets\templates\logo.png" rel="icon">

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

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="index.php">JobFinder</a></h1>

      </div>

      <nav id="navbar" class="navbar">

        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#testimonials">Testimonials</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#faq">FAQ</a></li>

          <li><a class="login " href="login.php">Log in</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Find and create a job with JobFinder</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Connecting job seekers with opportunities and employers with
            talent</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>About Us</h2>
        </div>

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="150">
            <p>
              At JobFinder, we believe that everyone deserves to find fulfilling employment that matches their skills
              and passions. Our mission is to connect job seekers with the right opportunities and help employers find
              the best talent for their teams.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i>Find your dream job with just a few clicks - Search for jobs on
                JobFinder!</li>
              <li><i class="ri-check-double-line"></i>Ready to take your team to the next level? Post your job openings
                on JobFinder today!</li>
            </ul>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-up" data-aos-delay="300">
            <p>
              We are passionate about helping job seekers achieve their career goals and supporting employers in
              building successful teams. Whether you're searching for a job or looking to hire, JobFinder is here to
              help you achieve your goals.
            </p>
            <a href="Register.php" class="btn-learn-more">Register Now!</a>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start"
            data-aos="fade-right" data-aos-delay="150">
            <img src="assets/img/counts-img.svg" alt="" class="img-fluid">
          </div>

          <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <span data-purecounter-start="0" data-purecounter-end="5611" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p>Over 5k job seekers and employers have already connected on JobFinder</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span data-purecounter-start="0" data-purecounter-end="1102" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p>Explore thousands of job opportunities across various industries and locations, all in one place
                      on JobFinder</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-clock"></i>
                    <span data-purecounter-start="0" data-purecounter-end="2" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p>JobFinder has been connecting professionals with the right opportunities for 2 years. </p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-award"></i>
                    <span data-purecounter-start="0" data-purecounter-end="8" data-purecounter-duration="1"
                      class="purecounter"></span>
                    <p>Trusted by experts and recognized for excellence, JobFinder has been honored with 8 awards for
                      our commitment to providing an exceptional job search experience.</p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End Counts Section -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p>This website offers:</p>
        </div>

        <div class="row justify-content-center">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Post a Job</a></h4>
              <p class="description">Hire the best talent with JobFinder. Post your job today and connect with qualified candidates</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Find a Job Opportunity Online </a></h4>
              <p class="description">Discover your next career move with JobFinder - search thousands of job opportunities from top employers</p>
            </div>
          </div>
        </div>

      </div>
    </section>


    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Testimonials</h2>
          <p>The testimonials of a few users</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saadi Khalil</h3>
                  <h4>Human Resources Manager</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    JobFinder's job posting service has been a game-changer for our company. We've been able to connect
                    with highly qualified candidates and fill our open positions quickly and easily
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->


            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Ali Jemai </h3>
                  <h4>Job Seeker</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    JobFinder's career advice and resources were instrumental in helping me land my dream job. I highly
                    recommend this platform to anyone looking to take their career to the next level.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Oussama Said</h3>
                  <h4>IT Specialist</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    JobFinder provided me with a seamless job search experience. I appreciated the variety of job
                    postings available and the user-friendly interface. Thanks to JobFinder, I was able to find a job
                    that matched my skills and interests.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->


            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Farouk Hamza</h3>
                  <h4>Employment Recruiter
                  </h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    JobFinder has been an excellent resource for finding top-quality candidates. The platform's advanced
                    search options made it easy to filter through the vast number of resumes and quickly identify
                    qualified candidates. I highly recommend JobFinder to any employer looking to streamline their
                    hiring process.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!-- End testimonial item -->





          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
    <!-- End Testimonials Section -->




    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p>Meet the team members!</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Ahmed SILINI</h4>
                <span>Front-End Developper</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Ghassen CHERIF</h4>
                <span>Front-End Developper</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Omar MEJDI</h4>
                <span>Back-End Developper</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Med Aziz BALTI</h4>
                <span>Back-End Developper</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->


    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>Who are you?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              We are a group of INSAT pre-engineering students studying software engineering. We created JobFinder as
              part of our coursework to help job seekers find new opportunities and employers find talented candidates.
              Our goal is to provide a user-friendly platform that makes the job search and hiring process as easy and
              efficient as possible.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>How do I search for job opportunities on JobFinder?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              To search for job opportunities on JobFinder, simply log in to your account, go to the homepage and
              you will find all the job opportunities
            </p>
          </div>
        </div><!-- End F.A.Q Item-->

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>How do I post a job on JobFinder?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              To post a job on JobFinder, simply create an employer account and click on the "Post a Job" button on your
              dashboard. You will then be prompted to fill out the job details, such as the job title, description,
              requirements, and salary. Once you've entered all the information, click on "Submit" to post the job.
            </p>
          </div>
        </div><!-- End F.A.Q Item-->





      </div>
    </section><!-- End F.A.Q Section -->



  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <p class="text-center">
            Contact Us: Phone: +216 92 220 708 | Email: info@jobfinder.com | Address: Centre Urbain Nord BP 676 - 1080
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




