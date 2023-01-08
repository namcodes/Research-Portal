<?php
session_start();
include_once("cn_config.php");
if (isset($_POST['sign-up'])) {
    $redirect = header("Location: ../register.php");
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $user_id = $_POST['user_id'];

    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];

    $ucheck = $conn->query("SELECT * FROM tbl_users WHERE user_id = '{$user_id}' LIMIT 1");

    if ($ucheck->num_rows > 0) {
        $_SESSION['error'] = "User ID is already exist, Try new one.";
        $redirect;
    } else {
        $date = date("Y-m-d");
        if ($password == $cpassword) {
            $hash_password = password_hash($password, PASSWORD_DEFAULT);
            $user_query = $conn->query("INSERT INTO tbl_users (avatar, user_id, first_name, last_name, password, role, date_created)
                                    VALUES ('default-avatar.png', '{$user_id}', '{$fname}', '{$lname}', '{$hash_password}', 'student', '{$date}')");
            if ($user_query) {
                $_SESSION['success'] = "Registered Successfully";
                header("Location: ../login.php");
            } else {
                $_SESSION['error'] = "Something went wrong";
                $redirect;
            }
        } else {
            $_SESSION['error'] = "Your password not matched";
            $redirect;
        }
    }
} else {
    echo ("invalid request");
}
?>