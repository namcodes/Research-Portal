<?php
session_start();
include_once('cn_config.php');
if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $user_query = $conn->query("SELECT * FROM tbl_users WHERE user_id = '{$user_id}' LIMIT 1");
    if($user_query->num_rows > 0){
        $fetch_data = $user_query->fetch_assoc();
        $first_name = $fetch_data['first_name'];
        $last_name = $fetch_data['last_name'];
        $user_name = $fetch_data['first_name']. " ". $fetch_data['last_name'];
        $role = $fetch_data['role'];
        $avatar = $fetch_data['avatar'];
        $_SESSION['role'] = $fetch_data['role'];
    }else{
        header("Location: ../");
    }
}else{
    header("Location: ../");
}
?>