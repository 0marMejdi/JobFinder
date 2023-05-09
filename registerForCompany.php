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
    <title>Register Company</title>
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
            <h1 style="font-family: 'Poltawski Nowy', serif; color: #19A7CE;">Find Great Employees</h1>
        </div>
        <?= showErrorIfExists() ?>
        <h4 class="mb-3">Sign Up</h4>
        <form class="needs-validation" novalidate action="registerprocessforcompany.php" method="post" enctype="multipart/form-data">
            <div class="row g-3">
                <!--      Company Name              -->
                <div class="col-sm-9">
                    <label for="companyName" class="form-label">Company Name</label>
                    <input name="companyName" id="companyName" type="text" class="form-control"  placeholder="Company Name"  required >
                    <div class="invalid-feedback">
                        Valid Company Name is required.
                    </div>
                </div>
                <!--    Email                -->
                <div class="col-sm-9">
                    <label for="email" class="form-label">E-mail</label>
                    <div class="input-group has-validation">
                        <span class="input-group-text">@</span>
                        <input id="email" name="email" type="email" class="form-control"  placeholder="you@example.com" required>
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>
                </div>
                <!--       Password             -->
                <div class="col-sm-9">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group has-validation">
                        <input type="password" class="form-control" id="password" placeholder="Password" required name="password">
                        <div class="invalid-feedback">
                            Your password is required.
                        </div>
                    </div>
                </div>
                <!--        Foundation Date            -->
                <div class="col-sm-9">
                    <label for="foundationDate" class="form-label">Date Of Foundation</label>
                    <div class="input-group has-validation">
                        <input id="foundationDate" name="foundationDate" class="form-control" type="date" required>
                        <div class="invalid-feedback">
                            Your Date Of Foundation is required.
                        </div>
                    </div>
                </div>
                <!--       Company Size             -->
                <div class="col-sm-9">
                    <label for="size" class="form-label">Company's Size</label>
                    <input type="number"  name="size" class="form-control" id="size" placeholder="Number of Employees" required  >
                    <div class="invalid-feedback">
                        Valid phone number is required.
                    </div>
                </div>
                <!--    Logo                -->
                <div class="col-sm-9">

                    <label for="logo" class="form-label">Business Logo</label>

                    <div style="display: flex; justify-content: left; align-items: center; margin: 20px;">

                        <img id="preview" src="assets/templates/default-company.jpg" alt="Preview Image" width="200" height="200" style="border-radius: 30%; margin: auto;">

                    </div>

                    <input class="form-control" type="file" id="logo" name="logo" onchange="previewImage()">

                    <script>

                        function previewImage() {

                            var preview = document.getElementById('preview');

                            var fileInput = document.getElementById('logo');

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
                <!--       phone number             -->
                <div class="col-sm-9">
                    <label for="phone" class="form-label">Phone Number</label>
                    <input name="phone" id="phone" type="tel" class="form-control"  placeholder="Phone Number" required >
                    <div class="invalid-feedback">
                        Valid phone number is required.
                    </div>
                </div>
                <!--    Country                -->
            <div class="col-sm-9">
                <label for="country" class="form-label">Country</label>
                <select name="country" class="form-select" id="country" required>
                    <option value="">Choose...</option>
                    <option value="tunisia">Tunisia</option>
                </select>
                <div class="invalid-feedback">
                    Please select a valid country.
                </div>
            </div>
                <!--    Region                -->
            <div class="col-sm-9">
                <label for="region" class="form-label">Region</label>
                <select class="form-select" id="region" required name="region">
                    <option value="">Choose...</option>
                    <option value="tunis">Tunis</option>
                    <option value="zaghouane">Zaghouane</option>
                    <option value="siliana">Siliana</option>
                    <option value="beja">Beja</option>
                    <!-- add more options here -->
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>
                <!--   Address                -->
            <div class="col-sm-9">
                    <label for="address" class="form-label">Address</label>
                    <input name="address" id="address" type="text" class="form-control" placeholder="example: 676, INSAT, Centre Urbain Nord, BP"  required >
                    <div class="invalid-feedback">
                        Valid Address is required.
                    </div>
                </div>
                <!--   Section -->
                <div class="col-sm-9">
                    <label for="section" class="form-label">Experience in sector of:  </label>
                    <select id="section" name="section" class="form-select"  required>
                        <option value="">Choose...</option>
                        <option value="tech">Tech</option>
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
                <!--     Description               -->
                <div class="col-sm-9">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" name="description" id="description" placeholder="Describe the company's main offerings and what sets them apart from competitors, outline the company's ideal customer or audience, and its achievements" rows="5" ></textarea>
                    <div class="invalid-feedback">
                        Valid Description is required.
                    </div>
                </div>

            <hr class="my-4 w-75">
            <button class="w-75 btn btn-primary btn-lg" type="submit">Sign Up</button>
        </form>
    </main>
    <footer class="my-5 pt-1 text-body-secondary text-small" >
        <p class="mb-1" style="padding-left: 150px;">&copy; 2023 JobFinder</p>
    </footer>
</div>
<script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
<script src="checkout.js"></script>
<script src="registration.js"></script>
</body>
</html>