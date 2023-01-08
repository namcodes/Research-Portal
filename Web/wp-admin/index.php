<?php
session_start();
if(isset($_SESSION['role'])){
    if($_SESSION['role'] == 'administrator'){
        header("Location: dashboard.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin | Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../wp-plugins/bootstrap-v1/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../wp-plugins/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../wp-plugins/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../wp-plugins/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../wp-plugins/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="../wp-plugins/css/util.css">
	<link rel="stylesheet" type="text/css" href="../wp-plugins/css/main.css">
	<!--===============================================================================================-->
	<script src="../wp-plugins/sweetalert2/sweetalert2.min.js"></script>
	<link rel="stylesheet" href="../wp-plugins/sweetalert2/sweetalert2.min.css" />
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            min-height: 100vh;
            display: grid;
            place-content: center;
        }
    </style>
</head>
<body>
    <div class="admin-login">
            <form action="../wp-includes/admin-login.php" method="post" class="login100-form validate-form">
                <div class="login100-form-title">
                    <h1>Welcome Back Admin!</h1>
                    <small>Enter your credentials to access your account.</small>
                </div>
                <div class="wrap-input100 validate-input mb-3" data-validate="Enter your user id">
                    <input class="input100" type="text" name="user_id" id="user_id" placeholder="Enter your Student LRN / Employee ID">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                    </span>
                </div>

                <div class="p-t-5 mb-1">
                    <a class="txt2" href="#">
                        Forgot Password?
                    </a>
                </div>

                <div class="container-login100-form-btn">
                    <button name="login-account" type="submit" class="login100-form-btn">
                        Sign In
                    </button>
                </div>
            </form>
    </div>
    	<!--===============================================================================================-->
	<script src="../wp-plugins/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="../wp-plugins/bootstrap-v1/js/popper.js"></script>
	<script src="../wp-plugins/bootstrap-v1/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="../wp-plugins/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="../wp-plugins/tilt/tilt.jquery.min.js"></script>
	<script>
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<!--===============================================================================================-->
	<script src="../wp-plugins/js/main.js"></script>
	<script src="../wp-plugins/js/validation.js"></script>
	<?php
	include_once("../wp-includes/response.php");
	?>
</body>
</html>