<?php
session_start();
include_once("cn_config.php");

if(isset($_POST['login-account'])){
    $redirect = header("Location: ../wp-admin/");

    $user_id = $_POST['user_id'];
    $password = $_POST['password'];


    $user_query = $conn->query("SELECT * FROM tbl_users WHERE user_id = '{$user_id}' AND role = 'administrator' LIMIT 1");
    if($user_query->num_rows > 0){
        $fetch_user = $user_query->fetch_assoc();

        if(password_verify($password, $fetch_user['password'])){
            $_SESSION['user_id'] = $fetch_user['user_id'];
            header("Location: ../wp-admin/dashboard.php");
        }else{
            $_SESSION['error'] = "Incorrect User ID or Password";
            $redirect;
        }
    }else{
        $_SESSION['error'] = "Invalid User ID or Password";
        $redirect;
    }
}else{
    echo("Invalid Request");
}
?>