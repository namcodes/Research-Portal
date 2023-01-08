<?php
session_start();
if(isset($_SESSION['user_id'])){
	header("Location: dashboard/");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Research Portal | Register</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="wp-plugins/bootstrap-v1/css/bootstrap.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="wp-plugins/fonts/font-awesome-4.7.0/css/font-awesome.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="wp-plugins/animate/animate.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="wp-plugins/css-hamburgers/hamburgers.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="wp-plugins/select2/select2.min.css" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="wp-plugins/css/util.css" />
  <link rel="stylesheet" type="text/css" href="wp-plugins/css/main.css" />
  <!--===============================================================================================-->
  <script src="wp-plugins/sweetalert2/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="wp-plugins/sweetalert2/sweetalert2.min.css" />
</head>

<body>
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <div class="login100-pic js-tilt" data-tilt>
          <img src="wp-plugins/images/img-01.png" alt="IMG" />
        </div>

        <form action="wp-includes/register.php" method="post" class="login100-form validate-form">
          <div class="login100-form-title">
            <h1>Register Now</h1>
            <small>Create your account by filling the form below.</small>
          </div>
          <div class="flex-input">
            <div class="wrap-input100 validate-input mb-3" data-validate="Enter your First Name">
              <input class="input100" type="text" id="first_name" name="fname" placeholder="First Name" />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-user" aria-hidden="true"></i>
              </span>
            </div>
            <div class="wrap-input100 validate-input mb-3" data-validate="Enter your Last Name">
              <input class="input100" type="text" id="last_name" name="lname" placeholder="Last Name" />
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-user" aria-hidden="true"></i>
              </span>
            </div>
          </div>
          <div class="wrap-input100 validate-input mb-3" data-validate="Please enter your LRN or Employee ID">
            <input class="input100" type="text" name="user_id" id="user_id" placeholder="Student LRN / Employee Id" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-user" aria-hidden="true"></i>
            </span>
          </div>
          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="password" placeholder="Password" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Password is required">
            <input class="input100" type="password" name="cpassword" placeholder="Confirm Password" />
            <span class="focus-input100"></span>
            <span class="symbol-input100">
              <i class="fa fa-lock" aria-hidden="true"></i>
            </span>
          </div>

          <div class="container-login100-form-btn">
            <button name="sign-up" type="submit" class="login100-form-btn">Sign Up</button>
          </div>

          <div class="p-t-20 d-flex justify-content-center">
            <p class="txt1 mr-1">Already have an account?</p>

            <a class="txt2" href="login.php"> Sign In </a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!--===============================================================================================-->
  <script src="wp-plugins/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="wp-plugins/bootstrap-v1/js/popper.js"></script>
  <script src="wp-plugins/bootstrap-v1/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="wp-plugins/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="wp-plugins/tilt/tilt.jquery.min.js"></script>
  <script>
    $(".js-tilt").tilt({
      scale: 1.1,
    });
  </script>
  <!--===============================================================================================-->
  <script src="wp-plugins/js/main.js"></script>
  <script src="wp-plugins/js/validation.js"></script>
  <?php
  include_once("wp-includes/response.php");
  ?>
</body>

</html>