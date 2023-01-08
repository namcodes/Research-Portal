<?php
include_once("cn_config.php");
foreach ($_GET as $key => $val) {
    switch ($key) {
            //Delete user account
        case 'delete_user': {
                $delete_user = $conn->query("DELETE FROM tbl_users WHERE user_id = '{$_GET['delete_user']}' LIMIT 1");
                if ($delete_user > 0) {
                    header("Location: ../wp-admin/users.php");
                } else {
                    $_SESSION['error'] = "Something went wrong.";
                    header("Location: ../wp-admin/users.php");
                }
                break;
            }
            //Delete Category
        case 'delete_category': {
                $delete_category = $conn->query("DELETE FROM tbl_category WHERE category_id = '{$_GET['delete_category']}' LIMIT 1");
                if ($delete_category > 0) {
                    header("Location: ../wp-admin/category.php");
                } else {
                    $_SESSION['error'] = "Something went wrong.";
                    header("Location: ../wp-admin/category.php");
                }
                break;
            }
            //Delete File

            case 'delete_file': {
                $delete_files = $conn->query("DELETE FROM tbl_files WHERE _id = '{$_GET['delete_file']}' LIMIT 1");
                if ($delete_files > 0) {
                    header("Location: ../wp-admin/files.php");
                } else {
                    $_SESSION['error'] = "Something went wrong.";
                    header("Location: ../wp-admin/files.php");
                }
                break;
            }
        default: {
                $_SESSION['error'] = "Something went wrong.";
                header("Location: ../");
                break;
            }
    }
}
?>