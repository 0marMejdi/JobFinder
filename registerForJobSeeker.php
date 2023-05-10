<?php
include_once "allFrags.php";
session_start();
if (isAuthenticated()){
    sendError("already_logged_in","homePage");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <!-- GoogleFonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poltawski+Nowy:wght@600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="node_modules\bootstrap\dist\css\bootstrap.css">
    <link rel="stylesheet" href="style.css">
</head>

<body class="bg-body-tertiary" style="background-color: aliceblue;">
<div class="container" style="max-width: 600px;">
    <main>
        <div class="py-5 text-center">
            <img class="d-block mx-auto " src="assets/templates/logo.png" alt="" width="150" height="100"
                 style="border-radius: 30%; margin-bottom: 18px;">
            <h1 style="font-family: 'Poltawski Nowy', serif; color: #19A7CE;">Connect to Opportunity</h1>
        </div>
        <?= showErrorIfExists() ?>
        <h4 class="mb-3">Sign Up</h4>
        <form class="needs-validation" novalidate action="processess/registerProcessForJobSeeker.php" method="post" enctype="multipart/form-data">

            <div class="row g-3">
                <!--Frist Name-->
                <div class="col-sm-9">
                    <label for="firstName" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="firstName" placeholder="First Name" value=""  name="FirstName" required>
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                </div>
                <!--Last Name-->
                <div class="col-sm-9">
                    <label for="LastName" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="LastName" placeholder="Last Name" value="" required name="LastName">
                    <div class="invalid-feedback">
                        Valid last name is required.
                    </div>
                </div>
                <!--Email-->
                <div class="col-sm-9">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">@</span>
                        <input type="email" class="form-control" id="email" placeholder="you@example.com" name="Email" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                </div>
                <!-- Password-->
                <div class="col-sm-9">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group has-validation">
                        <input type="password" class="form-control" id="password" placeholder="Password" required name="Password">
                        <div class="invalid-feedback">
                            Your password is required.
                        </div>
                    </div>
                </div>
                <!--   BirthDate -->
                <div class="col-sm-9">
                    <label for="birthdate" class="form-label">Date of Birth</label>
                    <input class="form-control" type="date" name="birthdate" id="birthdate" required>
                </div>
                <!--   Number-->
                <div class="col-sm-9">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Phone Number" value=""  name="phone" required>
                    <div class="invalid-feedback">
                        Valid phone number is required.
                    </div>
                </div>
                <!-- Gender-->
                <div class="col-sm-9">
                    <label for="gender" class="form-label">Gender</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked required>
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                    </div>
                </div>
                <!--   Profile Picture-->
                <div class="col-sm-9">
                    <label for="profile-picture" class="form-label">Profile Picture</label>
                    <div style="display: flex; justify-content: left; align-items: center; margin: 20px;">
                        <img id="preview"  src="assets/templates/default-profile-icon-24.jpg" alt="Preview Image"  width="200" height="200" style="border-radius: 30%; margin: auto;">
                    </div>
                    <input class="form-control" type="file" id="profile-picture" name="ProfilePicture"  accept="image/*" onchange="previewImage()">
                    <script>
                        function previewImage() {
                            var preview = document.getElementById('preview');
                            var fileInput = document.getElementById('profile-picture');
                            var file = fileInput.files[0];
                            if (file) {
                                var reader = new FileReader();
                                reader.onloadend = function() {
                                    preview.src = reader.result;
                                }
                                reader.readAsDataURL(file);
                            } else {
                                preview.src = "assets/templates/default-profile-icon-24.jpg";
                            }
                        }
                    </script>
                </div>
                <!--   Country -->
                <div class="col-sm-9">
                    <label for="country" class="form-label">Country</label>
                    <select class="form-select" id="country" required name="Country">
                        <option value="">Choose...</option>
                        <option value="tunisia">Tunisia</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid country.
                    </div>
                </div>
                <!--   Region -->
                <div class="col-sm-9">
                    <label for="region" class="form-label">Region</label>
                    <select class="form-select" id="region" name="region" required>
                        <option value="">Choose...</option>
                        <option value="tunis">Tunis</option>
                        <option value="zaghouane">Zaghouane</option>
                        <option value="siliana">Siliana</option>
                        <option value="beja">Beja</option>
                        <!-- add more options here -->
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid region.
                    </div>
                </div>
                <!--   Address -->
                <div class="col-sm-9 required">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="Address"  name="address" required>
                    <div class="invalid-feedback">
                        Valid address is required.
                    </div>
                </div>
                <!--   education -->
                <div class="col-sm-9 required">
                    <label for="education" class="form-label">Education</label>
                    <input type="text" class="form-control" id="education" placeholder="Education"  name="education" required>
                    <div class="invalid-feedback">
                        Valid address is required.
                    </div>
                </div>
                <!--Title-->
                <div class="col-sm-9">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" class="form-control" id="title" placeholder="Your title as for your experience"   name="title">
                    <div class="invalid-feedback">
                        Valid title is required.
                    </div>
                </div>

                <!--   Section -->
                <div class="col-sm-9">
                    <label for="section" class="form-label">Experience in sector of:  </label>
                    <select class="form-select" id="section" name="section" required>
                        <option value="">Choose...</option>
                        <option value="tunisia">Tech</option>
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid sector.
                    </div>
                </div>
                <!--   Sub-Section -->
                <div class="col-sm-9">
                    <label for="subSection" class="form-label"> </label>
                    <select class="form-select" id="subSection" name="subSection" required>
                        <option value="">Choose...</option>
                        <option value="cyber">Cyber Security</option>
                        <option value="web">Web </option>
                        <option value="mobile">Mobile</option>
                        <option value="bigData">Big Data</option>
                        <!-- add more options here -->
                    </select>
                    <div class="invalid-feedback">
                        Please select a valid section.
                    </div>
                </div>
                <!--   Experience -->
                <div class="col-sm-9">
                    <label for="experience" class="form-label">Experience in years</label>
                    <input type="number" class="form-control" id="experience" placeholder="Experience" value="0" required name="experience">
                    <div class="invalid-feedback">
                        Valid number of years is required.
                    </div>
                </div>
                <!--   Bio -->
                <div class="col-sm-9">
                    <label for="bio" class="form-label">About you...</label>
                    <textarea class="form-control" id="bio" name="bio" rows="3"></textarea>
                </div>

            </div>

            <hr class="my-4 w-75">
            <button class="w-75 btn btn-primary btn-lg" type="submit">Sign Up</button>
        </form>
    </main>
    <footer class="my-5 pt-1 text-body-secondary text-small">
    <p class="mb-1" style="padding-left: 150px;">&copy; 2023 JobFinder</p>
    </footer>
</div>

<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="checkout.js"></script>
<script src="registration.js"></script>
</body>
</html>