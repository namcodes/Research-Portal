<?php 
session_start();
include_once("cn_config.php");
include_once("utils.php");
if(isset($_POST['edit-admin'])){
    $redirect = header("Location: ../wp-admin/dashboard.php");

    $old_id = $_POST['token_id'];
   
    $user_id = $_POST['user_id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];

    //It can be empty fields
    $password = $_POST['password'];
   

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    if(empty($password)){
       
            if (isset_file('avatar')) {
                $img_name = $_FILES['avatar']['name'];
                $tmp_name = $_FILES['avatar']['tmp_name'];
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);
                $img_extension = ['png', 'jpg', 'jpeg'];
                $new_name = rand(100, 999) . '.' . $img_ext;
                if (in_array($img_ext, $img_extension) === true) {
                    if (move_uploaded_file($tmp_name, "../wp-images/" . $new_name)) {
                        $user_query = $conn->query("UPDATE tbl_users SET user_id = '$user_id', avatar = '{$new_name}', first_name = '{$first_name}', last_name = '{$last_name}' WHERE user_id = '$old_id' LIMIT 1");
                        if ($user_query) {
                            $_SESSION['success'] = "Successfully Updated";
                            $redirect;
                        } else {
                            $_SESSION['error'] = "Something went wrong";
                            $redirect;
                        }
                    }
                } else {
                    $_SESSION['error'] = "The file is not support only jpeg, jpg and png";
                    $redirect;
                }
            } else {
                // for empty profile
                $user_query = $conn->query("UPDATE tbl_users SET user_id = '$user_id', first_name = '{$first_name}', last_name = '{$last_name}' WHERE user_id = '$old_id' LIMIT 1");
                if ($user_query) {
                    $_SESSION['success'] = "Successfully Updated";
                    $redirect;
                } else {
                    $_SESSION['error'] = "Something went wrong";
                    $redirect;
                }
            }
    }else{
        if (isset_file('avatar')) {
            $img_name = $_FILES['avatar']['name'];
            $tmp_name = $_FILES['avatar']['tmp_name'];
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);
            $img_extension = ['png', 'jpg', 'jpeg'];
            $new_name = rand(100, 999) . '.' . $img_ext;
            if (in_array($img_ext, $img_extension) === true) {
                if (move_uploaded_file($tmp_name, "../wp-images/" . $new_name)) {
                    $user_query = $conn->query("UPDATE tbl_users SET user_id = '$user_id', avatar = '{$new_name}', first_name = '{$first_name}', last_name = '{$last_name}', password = '{$password}' WHERE user_id = '$old_id' LIMIT 1");
                    if ($user_query) {
                        $_SESSION['success'] = "Successfully Updated";
                        $redirect;
                    } else {
                        $_SESSION['error'] = "Something went wrong";
                        $redirect;
                    }
                }
            } else {
                $_SESSION['error'] = "The file is not supported only jpeg, jpg and png";
                $redirect;
            }
        } else {
            // for empty profile
            $user_query = $conn->query("UPDATE tbl_users SET user_id = '$user_id', first_name = '{$first_name}', last_name = '{$last_name}', password = '{$password}' WHERE user_id = '{$old_id}' LIMIT 1");
            if ($user_query) {
                $_SESSION['success'] = "Successfully Updated";
                $redirect;
            } else {
                $_SESSION['error'] = "Something went wrong";
                $redirect;
            }
        }
    }
}else{
    $redirect = header("Location: ../dashboard/");

    $old_id = $_POST['token_id'];
   
    $user_id = $_POST['user_id'];
    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];

    //It can be empty fields
    $password = $_POST['password'];

    $hash_password = password_hash($password, PASSWORD_DEFAULT);

    if(empty($password)){
   
            if (isset_file('avatar')) {
                $img_name = $_FILES['avatar']['name'];
                $tmp_name = $_FILES['avatar']['tmp_name'];
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);
                $img_extension = ['png', 'jpg', 'jpeg'];
                $new_name = rand(100, 999) . '.' . $img_ext;
                if (in_array($img_ext, $img_extension) === true) {
                    if (move_uploaded_file($tmp_name, "../wp-images/" . $new_name)) {
                        $user_query = $conn->query("UPDATE tbl_users SET user_id = '$user_id', avatar = '{$new_name}', first_name = '{$first_name}', last_name = '{$last_name}' WHERE user_id = '$old_id' LIMIT 1");
                        if ($user_query) {
                            $_SESSION['success'] = "Successfully Updated";
                            $redirect;
                        } else {
                            $_SESSION['error'] = "Something went wrong";
                            $redirect;
                        }
                    }
                } else {
                    $_SESSION['error'] = "The file is not support only jpeg, jpg and png";
                    $redirect;
                }
            } else {
                // for empty profile
                $user_query = $conn->query("UPDATE tbl_users SET user_id = '$user_id', first_name = '{$first_name}', last_name = '{$last_name}' WHERE user_id = '$old_id' LIMIT 1");
                if ($user_query) {
                    $_SESSION['success'] = "Successfully Updated";
                    $redirect;
                } else {
                    $_SESSION['error'] = "Something went wrong";
                    $redirect;
                }
            }
    }else{
        if (isset_file('avatar')) {
            $img_name = $_FILES['avatar']['name'];
            $tmp_name = $_FILES['avatar']['tmp_name'];
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode);
            $img_extension = ['png', 'jpg', 'jpeg'];
            $new_name = rand(100, 999) . '.' . $img_ext;
            if (in_array($img_ext, $img_extension) === true) {
                if (move_uploaded_file($tmp_name, "../wp-images/" . $new_name)) {
                    $user_query = $conn->query("UPDATE tbl_users SET user_id = '$user_id', avatar = '{$new_name}', first_name = '{$first_name}', last_name = '{$last_name}', password = '{$password}' WHERE user_id = '$old_id' LIMIT 1");
                    if ($user_query) {
                        $_SESSION['success'] = "Successfully Updated";
                        $redirect;
                    } else {
                        $_SESSION['error'] = "Something went wrong";
                        $redirect;
                    }
                }
            } else {
                $_SESSION['error'] = "The file is not supported only jpeg, jpg and png";
                $redirect;
            }
        } else {
            // for empty profile
            $user_query = $conn->query("UPDATE tbl_users SET user_id = '$user_id', first_name = '{$first_name}', last_name = '{$last_name}', password = '{$password}' WHERE user_id = '{$old_id}' LIMIT 1");
            if ($user_query) {
                $_SESSION['success'] = "Successfully Updated";
                $redirect;
            } else {
                $_SESSION['error'] = "Something went wrong";
                $redirect;
            }
        }
    }
}
?>