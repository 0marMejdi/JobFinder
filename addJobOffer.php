<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Ajw4zgXkH0hFZsBm/yCpQD+3TYT15E0lqj6H+8DD4VWZ6jmkI9Brcd9zArOo/Y0aivCzeZdGbTjf+3XdgMgPRQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Add Job Offer</title>
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

@import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  body {
    font-family: 'Inter', sans-serif;
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
    display: block;
    margin: 0 auto 40px;
  }

  .formbold-form-input {
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
    color: #07074d;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    display: block;
    margin-bottom: 20px;
  }
  .formbold-form-label span {
    color: #536387;
    font-size: 12px;
    line-height: 18px;
    display: inline-block;
  }

  .formbold-mb-3 {
    margin-bottom: 15px;
  }
  .formbold-mb-6 {
    margin-bottom: 30px;
  }
  .formbold-radio-flex {
    display: flex;
    flex-direction: column;
    gap: 10px;
  }
  .formbold-radio-label {
    font-size: 14px;
    line-height: 24px;
    color: #07074d;
    position: relative;
    padding-left: 25px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }
  .formbold-input-radio {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }
  .formbold-radio-checkmark {
    position: absolute;
    top: -1px;
    left: 0;
    height: 18px;
    width: 18px;
    background-color: #ffffff;
    border: 1px solid #dde3ec;
    border-radius: 50%;
  }
  .formbold-radio-label
    .formbold-input-radio:checked
    ~ .formbold-radio-checkmark {
    background-color: #6a64f1;
  }
  .formbold-radio-checkmark:after {
    content: '';
    position: absolute;
    display: none;
  }

  .formbold-radio-label
    .formbold-input-radio:checked
    ~ .formbold-radio-checkmark:after {
    display: block;
  }

  .formbold-radio-label .formbold-radio-checkmark:after {
    top: 50%;
    left: 50%;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #ffffff;
    transform: translate(-50%, -50%);
  }

  .formbold-btn {
    text-align: center;
    width: 100%;
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
    
    <img src="assets\templates\AddJobOffer.jpg">

    <form  method="POST">
      <div class="formbold-form-title">
        <h2 class="">Add Job Offer</h2>
        <p>
          Expand your reach and connect with top talent by posting your job offer on our site today!
        </p>
      </div>

      <div class="formbold-mb-3">
        <label for="Job Title" class="formbold-form-label">
          Job Title
        </label>
        <input
          type="text"
          name="Job Title"
          id="Job Title"
          class="formbold-form-input"
        />
      </div>

      <div class="formbold-mb-3">
            <label for="jobDescription" class="formbold-form-label">  Job Description </label>
            <textarea
            name="jobDescription"
            id="jobDescription"
            class="formbold-form-input"
            rows="5"
            ></textarea>
        </div>
  
      <div class="formbold-mb-6">
        <label for="qusOne" class="formbold-form-label">
          Work Time:
        </label>

        <div class="formbold-radio-flex">
          <div class="formbold-radio-group">
            <label class="formbold-radio-label">
              <input
                class="formbold-input-radio"
                type="radio"
                name="qusOne"
                id="qusOne"
              />
            Full Time
              <span class="formbold-radio-checkmark"></span>
            </label>
          </div>

          <div class="formbold-radio-group">
            <label class="formbold-radio-label">
              <input
                class="formbold-input-radio"
                type="radio"
                name="qusOne"
                id="qusOne"
              />
              Part Time
              <span class="formbold-radio-checkmark"></span>
            </label>
          </div>
        </div>
      </div>

      <div class="formbold-mb-6">
        <label for="qusTwo" class="formbold-form-label">
          Work Type:
        </label>

        <div class="formbold-radio-flex">
          <div class="formbold-radio-group">
            <label class="formbold-radio-label">
              <input
                class="formbold-input-radio"
                type="radio"
                name="qusTwo"
                id="qusTwo"
              />
              Remote
              <span class="formbold-radio-checkmark"></span>
            </label>
          </div>

          <div class="formbold-radio-group">
            <label class="formbold-radio-label">
              <input
                class="formbold-input-radio"
                type="radio"
                name="qusTwo"
                id="qusTwo"
              />
              Office
              <span class="formbold-radio-checkmark"></span>
            </label>
          </div>

          <div class="formbold-radio-group">
            <label class="formbold-radio-label">
              <input
                class="formbold-input-radio"
                type="radio"
                name="qusTwo"
                id="qusTwo"
              />
              Both
              <span class="formbold-radio-checkmark"></span>
            </label>
          </div>
        </div>
      </div>

      <div class="formbold-mb-6">
        <label for="qusThree" class="formbold-form-label">
          Contract Type
        </label>

        <div class="formbold-radio-flex">
          <div class="formbold-radio-group">
            <label class="formbold-radio-label">
              <input
                class="formbold-input-radio"
                type="radio"
                name="qusThree"
                id="qusThree"
              />
              CDI
              <span class="formbold-radio-checkmark"></span>
            </label>
          </div>

          <div class="formbold-radio-group">
            <label class="formbold-radio-label">
              <input
                class="formbold-input-radio"
                type="radio"
                name="qusThree"
                id="qusThree"
              />
              CDD
              <span class="formbold-radio-checkmark"></span>
            </label>
          </div>

          <div class="formbold-radio-group">
            <label class="formbold-radio-label">
              <input
                class="formbold-input-radio"
                type="radio"
                name="qusThree"
                id="qusThree"
              />
              Freelance
              <span class="formbold-radio-checkmark"></span>
            </label>
          </div>

          <div class="formbold-radio-group">
            <label class="formbold-radio-label">
              <input
                class="formbold-input-radio"
                type="radio"
                name="qusThree"
                id="qusThree"
              />
              Internship
              <span class="formbold-radio-checkmark"></span>
            </label>
          </div>

          <div class="formbold-radio-group">
            <label class="formbold-radio-label">
              <input
                class="formbold-input-radio"
                type="radio"
                name="qusThree"
                id="qusThree"
              />
              Volunteer
              <span class="formbold-radio-checkmark"></span>
            </label>
          </div>
        </div>
      </div>

      <div class="formbold-mb-3"><label for="experience" class="formbold-form-label"> Location </label>
        <input
            type="text"
            name="experience"
            id="location"
            class="formbold-form-input"
        />
        </div> 

        <div>
            <label for="education" class="formbold-form-label"> Education Required </label>
            <input
             type="text"
                name="education"
                id="education"
                class="formbold-form-input"
            />
        </div>
        <div>
        <label for="experience" class="formbold-form-label"> Experience Required </label>
        <input
            type="number"
            name="experience"
            id="experience"
            class="formbold-form-input"
            max="40"
            min="0"
        />
        </div> 
      <button type="submit" class="btn-lg btn btn-primary ">Add Now</button>
    </form>
  </div>
</div>

</body>
</html>