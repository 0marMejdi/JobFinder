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
    <title>Register</title>
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
            <h1 style="font-family: 'Poltawski Nowy', serif; color: #B0DAFF;">Connect to Opportunity</h1>
        </div>
        <?= showErrorIfExists() ?>
        <h4 class="mb-3">Tell us More About you!</h4>
        <form method="POST" action=""><!-- TODO : Define the Action method -->
            <div>
                <label for="title">Your current title:</label>
                <input type="text" name="title" id="title" required>
            </div>


            <div>
                <label for="about">About Me:</label>
                <textarea name="about" id="about" rows="10" required></textarea>
            </div>

            <div>
                <label for="section">I have experience in:</label>
                <select name="section" id="section">
                    <option value="">None</option>
                    <option value="web">Web Development</option>
                    <option value="mobile">Mobile Development</option>
                    <option value="data">Data Science</option>
                </select>
            </div>

            <div id="section-experience" style="display: none;">
                <label for="section-experience-years">Section experience (years):</label>
                <input type="number" name="section_experience" id="section-experience-years" min="1" required>
            </div>

            <div>
                <label for="resume">Upload your resume:</label>
                <input type="file" name="resume" id="resume">
            </div>

            <div>
                <button type="submit" name="action" value="confirm">Confirm</button>
                <button type="submit" name="action" value="skip">Skip</button>
            </div>

        </form>
    </main>
</div>
</body>
</html>