<?php
include_once "allFrags.php";
session_start();
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
                <div class="col-sm-9">
                    <label for="phone" class="form-label">Company Name</label>
                    <input type="tel" class="form-control" id="phone" placeholder="Company Name" value="" required name="Name">
                    <div class="invalid-feedback">
                        Valid Company Name is required.
                    </div>
                </div>

                <div class="col-sm-9">
                    <label for="phone" class="form-label">Business Sector</label>
                    <input type="text" class="form-control" id="Business Sector" placeholder="Business Sector" value="" required name="Sector">
                    <div class="invalid-feedback">
                        Valid Business Sector is required.
                    </div>
                </div>

                <div class="col-sm-9">
                    <label for="firstName" class="form-label">Address</label>
                    <input type="text" class="form-control" id="firstName" placeholder="Address" value="" required name="Address">
                    <div class="invalid-feedback">
                        Valid Address is required.
                    </div>
                </div>
                <div class="col-sm-9">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Description"></textarea>                    <div class="invalid-feedback">
                        Valid Description is required.
                    </div>
                </div>

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

                <div class="col-sm-9">
                    <label for="password" class="form-label">Password</label>
                    <div class="input-group has-validation">
                        <input type="password" class="form-control" id="password" placeholder="Password" required name="Password">
                        <div class="invalid-feedback">
                            Your password is required.
                        </div>
                    </div>
                </div>

                <div class="col-sm-9">
                    <label for="datebirth" class="form-label">Date Of Foundation</label>
                    <div class="input-group has-validation">
                        <input class="form-control" type="date" name="FoundationDate" required>
                        <div class="invalid-feedback">
                            Your Date Of Foundation is required.
                        </div>
                    </div>
                </div>
            
                <div class="col-sm-9">

            <label for="phone" class="form-label">Phone Number</label>
                
                <input type="tel" class="form-control" id="phone" placeholder="Phone Number" value="" required name="PhoneNumber">
                
                <div class="invalid-feedback">
                Valid phone number is required.
                </div>
            </div>
                <div class="col-sm-9">

                    <label for="phone" class="form-label">Number of Employees</label>

                    <input type="tel" class="form-control" id="phone" placeholder="Number of Employees" value="" required name="Size">

                    <div class="invalid-feedback">
                        Valid phone number is required.
                    </div>
                </div>


            <div class="col-sm-9">
                
            <label for="profile-picture" class="form-label">Business Logo</label>
                
                <div style="display: flex; justify-content: left; align-items: center; margin: 20px;">

                <img id="preview"  src="assets/templates/default-profile-icon-24.jpg" alt="Preview Image"  width="200" height="200" style="border-radius: 30%; margin: auto;">
                
                </div>
                
                <input class="form-control" type="file" id="profile-picture" name="ProfilePicture" onchange="previewImage()">

            
            </div>

            
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

            <div class="col-sm-9">
                <label for="Size" class="form-label">Size</label>
                <select class="form-select" id="Size" required name="Size">
                    <option value="">Choose...</option>
                    <option value="0-50">0-50</option>
                    <option value="50-100">50-100</option>
                    <option value="100-150">100-150</option>
                    <option value="150-200">150-200</option>
                    <option value="more">more</option>
                    <!-- add more options here -->
                </select>
                <div class="invalid-feedback">
                    Please select a valid state.
                </div>
            </div>

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
            <div class="col-sm-9">
                <label for="state" class="form-label">State</label>
                <select class="form-select" id="state" required name="State">
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

            <div class="col-sm-9">
                    <label for="firstName" class="form-label">Address</label>
                    <input type="text" class="form-control" id="Address" placeholder="Address" value="" required name="Address">
                    <div class="invalid-feedback">
                        Valid Address is required.
                    </div>
            </div>

            <div class="col-sm-9">
                <label for="DesctionTextArea" class="form-label">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>

            <!-- <div class="col-sm-7">
                <label for="userType" class="form-label">Are you: </label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="userType" id="user" value="user">
                    <label class="form-check-label" for="user">
                        Job Seeker?
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="userType" id="employer" value="employer" required>
                    <label class="form-check-label" for="employer">
                        Employer?
                    </label>
                </div>
            </div> -->

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