<?php include_once "allFrags.php";
includeHeader("Authentification");
session_start();
needsNOAuthentication();
function getPerviousInsertedEmail()
{
    if(!isset($_SESSION['insertedEmail']))
        return "";
    session_start_once();
    return $_SESSION['insertedEmail'];
}

?>

<body >
  <div class="container">

    <div class="row text-center" style="margin: auto;">
        <?= showErrorIfExists() ?>
      <div class="col-7 text-center">
        <img class="photolog" src="assets/templates/LoginBackground.jpg" alt="" srcset="" style="width: 100%; height: 100%;">
        <p id="registernow">Don't you have an account? <a href="register.php">Register Now</a></p>
      </div>
      <div class="col-5 text-center">
        <form action="logInProcess.php" method="post">
          <img class="logo" src="assets/templates/logo.png" alt="" srcset="">
          <h1 class="h3 ">Please sign in</h1>
<!--            --><?php
//            if (isset($_GET['error'])) {
//                if ($_GET['error'] == 1) {
//                    echo '<div class="alert alert-danger" role="alert">
//                    Please check your email and password combination !
//                    </div>';
//                }
//            }
//            ?>
          <div class="form-floating">
            <input
                    name="email"
                    type="email"
                    class="form-control"
                    id="floatingInput"
                    value = '<?php echo getPerviousInsertedEmail() ; unset($_SESSION['insertedEmail']); ?>'
                    placeholder="name@example.com"
            />
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="Password"/>
            <label for="floatingPassword">Password</label>
          </div>
          <button class="w-100 btn btn-lg btn btn-outline-primary" type="submit">
            Sign in
          </button>
          <p class="mt-5 mb-3 text-body-secondary">&copy;2023</p>
        </form>
      </div>
    </div>
  </div>

</body>
</html>