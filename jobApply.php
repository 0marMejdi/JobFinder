<?php
include_once 'allFrags.php';
session_start();
needsAuthentication();
$user= $_SESSION["currentUser"];
if ($user->isCompany())
    header("Location: companyProfile.php");
if (JobSeekerRepository::doesExist("email",$user->email))
    $user=JobSeekerRepository::getOneWhere("email",$user->email);
else
    sendError("user_not_found","login");
if (!isset($_GET["id"]))
{
    sendError("job_offer_not_found","userhome");
}
$jobofferid=$_GET["id"];
if (!JobOfferRepository::doesExist("id",$_GET["id"]))
{
 sendError("job_offer_not_found","userhome");
}
$joboffer=JobOfferRepository::getOneWhere("id",$jobofferid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Ajw4zgXkH0hFZsBm/yCpQD+3TYT15E0lqj6H+8DD4VWZ6jmkI9Brcd9zArOo/Y0aivCzeZdGbTjf+3XdgMgPRQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- logo -->
    <link href="assets/templates/logo.png" rel="icon">

    <!-- CSS -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <title>Document</title>
    <style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Inter', sans-serif;
  }
  .formbold-mb-3 {
    margin-bottom: 15px;
  }
  .formbold-relative {
    position: relative;
  }
  .formbold-opacity-0 {
    opacity: 0;
  }
  .formbold-stroke-current {
    stroke: currentColor;
  }
  #supportCheckbox:checked ~ div span {
    opacity: 1;
  }

  .formbold-main-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 48px;
  }

  .formbold-form-wrapper {
    margin: 0 auto;
    max-width: 570px;
    width: 100%;
    background: white;
    padding: 40px;
  }

  .formbold-img {
    margin-bottom: 45px;
  }

  .formbold-form-title {
    margin-bottom: 30px;
  }
  .formbold-form-title h2 {
    font-weight: 600;
    font-size: 28px;
    line-height: 34px;
    color: #07074d;
  }
  .formbold-form-title p {
    font-size: 16px;
    line-height: 24px;
    color: #536387;
    margin-top: 12px;
  }

  .formbold-input-flex {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
  }
  .formbold-input-flex > div {
    width: 50%;
  }
  .formbold-form-input {
    text-align: center;
    width: 100%;
    padding: 13px 22px;
    border-radius: 5px;
    border: 1px solid #dde3ec;
    background: #ffffff;
    font-weight: 500;
    font-size: 16px;
    color: #536387;
    outline: none;
    resize: none;
  }
  .formbold-form-input:focus {
    border-color: #6a64f1;
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  .formbold-form-label {
    color: #536387;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 10px;
  }

  .formbold-checkbox-label {
    display: flex;
    cursor: pointer;
    user-select: none;
    font-size: 16px;
    line-height: 24px;
    color: #536387;
  }
  .formbold-checkbox-label a {
    margin-left: 5px;
    color: #6a64f1;
  }
  .formbold-input-checkbox {
    position: absolute;
    width: 1px;
    height: 1px;
    padding: 0;
    margin: -1px;
    overflow: hidden;
    clip: rect(0, 0, 0, 0);
    white-space: nowrap;
    border-width: 0;
  }
  .formbold-checkbox-inner {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 20px;
    height: 20px;
    margin-right: 16px;
    margin-top: 2px;
    border: 0.7px solid #dde3ec;
    border-radius: 3px;
  }

  .formbold-btn {
    font-size: 16px;
    border-radius: 5px;
    padding: 14px 25px;
    border: none;
    font-weight: 500;
    background-color: #6a64f1;
    color: white;
    cursor: pointer;
    margin-top: 25px;
  }
  .formbold-btn:hover {
    box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
  }
  img{
    width: 400px;
    height: 400px;
    text-align: center;
  }
  button{
    margin-top: 20px;
    margin-left: 170px;
  }
  [type="file"] {
  height: 0;
  overflow: hidden;
  width: 0;
}

[type="file"] + label {
  background: #f15d22;
  border: none;
  border-radius: 5px;
  color: #fff;
  cursor: pointer;
  display: inline-block;
	font-family: 'Rubik', sans-serif;
	font-size: inherit;
  font-weight: 500;
  margin-bottom: 1rem;
  outline: none;
  padding: 1rem 50px;
  position: relative;
  transition: all 0.3s;
  vertical-align: middle;
  
  &:hover {
    background-color: darken(#f15d22, 10%);
  }
  
  &.btn-2 {
    background-color: #99c793;
    border-radius: 50px;
    overflow: hidden;
    
    &::before {
      color: #fff;
      font-family: "Font Awesome 5 Pro";
      font-size: 100%;
      height: 100%;
      right: 130%;
      line-height: 3.3;
      position: absolute;
      top: 0px;
      transition: all 0.3s;
    }

    &:hover {
      background-color: darken(#99c793, 30%);
        
      &::before {
        right: 75%;
      }
    }
  }
  
}
img{
    width: 500px;
    height: 450px;
    text-align: center;
  }

</style>
</head>
<body>
<div class="formbold-main-wrapper">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="formbold-form-wrapper">
    
    <img src="assets\templates\apply.jpg" syle="width:400px ">

    <form action="jobapplyprocess.php?id=<?= $jobofferid ?>" method="POST">
      <div class="formbold-form-title">
        <h2 class="">Apply Now</h2>
        <p>
          If you're on the lookout for a new job opportunity, then there's no better time to apply than now!
        </p>
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="firstname" class="formbold-form-label">
            First name
          </label>
          <input
            type="text"
            name="firstname"
            id="firstname"
            class="formbold-form-input"
            placeholder="<?= $user->firstName ?>"
            disabled
          />
        </div>
        <div>
          <label for="lastname" class="formbold-form-label"> Last name </label>
          <input
            type="text"
            name="lastname"
            id="lastname"
            class="formbold-form-input"
            placeholder="<?= $user->lastName ?>"
            disabled
          />
        </div>
      </div>

      <div class="formbold-input-flex">
        <div>
          <label for="email" class="formbold-form-label"> Email </label>
          <input
            type="email"
            name="email"
            id="email"
            class="formbold-form-input"
            placeholder="<?= $user->email ?>"
            disabled
          />
        </div>
        <div>
          <label for="phone" class="formbold-form-label"> Phone number </label>
          <input
            type="text"
            name="phone"
            id="phone"
            class="formbold-form-input"
            placeholder="<?= $user->number ?>"
            disabled
          />
        </div>
      </div>

      <div class="formbold-mb-3">
        <label for="address" class="formbold-form-label">
          Street Address
        </label>
        <input
          type="text"
          name="address"
          id="address"
          class="formbold-form-input"
            placeholder="<?= $user->address ?>"
            disabled
        />
      </div>

      <div class="formbold-mb-3">
        <label for="profileheadline" class="formbold-form-label">
          My Profile Headline
        </label>
        <input
          type="text"
          name="profileheadline"
          id="profileheadline"
          class="formbold-form-input"

        />
      </div>

    
        <div>
            <label for="education" class="formbold-form-label"> Education </label>
            <input
             type="text"
                name="education"
                id="education"
                class="formbold-form-input"

            />
        </div>
        <div>
        <label for="experience" class="formbold-form-label"> Experience </label>
        <input
            type="number"
            name="experience"
            id="experience"
            class="formbold-form-input"
            max="40"
            min="0"
        />
        </div>
        <div class="formbold-mb-3">
            <label for="aboutme" class="formbold-form-label">  Tell us why you want to join us </label>
            <textarea
            name="aboutme"
            id="aboutme"
            class="formbold-form-input"
            rows="5"
            ></textarea>
        </div>
        <div class="formbold-mb-3">
            <label for="aboutme" class="formbold-form-label">  Upload your CV </label>
            <input type="file" id="file" />
            <label for="file" class="btn-2">Upload a File</label>
        </div>  
      <button class="btn-lg btn btn-primary ">Apply Now</button>
    </form>
  </div>
</div>

</body>
</html>