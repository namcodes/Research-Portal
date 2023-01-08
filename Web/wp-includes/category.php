<?php
session_start();
include_once("cn_config.php");
include_once("utils.php");

if (isset($_POST['create-category'])) {
    $redirect = header("Location: ../wp-admin/category.php");
    $cat_name = $_POST['cat_name'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $category_id = "_id" . token_generator(12);

    //Slog
    $slog = str_replace(' ', '-', $name);

    $smtp = $conn->prepare("INSERT INTO tbl_category (category_id, slog, folder_name, name, description)
                            VALUES (?, ?, ?, ?, ?)");
    $smtp->bind_param("sssss", $category_id, $slog, $cat_name, $name, $description);
    if ($smtp->execute()) {
        //Query successfully executed;
        $_SESSION['success'] = "Successfully Added";
        $redirect;
    } else {
        //Query not executed;
        $_SESSION['error'] = "Something went wrong";
        $redirect;
    }
} elseif (isset($_POST['category_Token'])) {
    $category_id = $_POST['category_id'];

    $category_query = $conn->query("SELECT * FROM tbl_category WHERE category_id = '{$category_id}' LIMIT 1");

    if ($category_query->num_rows > 0) {
        $response = $category_query->fetch_assoc();
    } else {
        $response = "Something went wrong.";
    }
    echo (json_encode($response));
} elseif (isset($_POST['edit-category'])) {
    $redirect = header("Location: ../wp-admin/category.php");
    $category_id = $_POST['category_id'];
    $cat_name = $_POST['cat_name'];
    $name = $_POST['name'];
    $description = $_POST['description'];

    //Slog
    $slog = str_replace(' ', '-', $name);

    if (empty($cat_name)) {
        $smtp = $conn->prepare("UPDATE tbl_category SET slog = ?, name = ?, description = ? WHERE category_id = ?");
        $smtp->bind_param("ssss", $slog, $name, $description, $category_id);
        if ($smtp->execute()) {
            //Query successfully executed;
            $_SESSION['success'] = "Successfully Updated";
            $redirect;
        } else {
            //Query not executed;
            $_SESSION['error'] = "Something went wrong";
            $redirect;
        }
    } else {
        $smtp = $conn->prepare("UPDATE tbl_category SET slog = ?, folder_name = ?, name = ?, description = ? WHERE category_id = ?");
        $smtp->bind_param("sssss", $slog, $cat_name, $name, $description, $category_id);
        if ($smtp->execute()) {
            //Query successfully executed;
            $_SESSION['success'] = "Successfully Updated";
            $redirect;
        } else {
            //Query not executed;
            $_SESSION['error'] = "Something went wrong";
            $redirect;
        }
    }
} else {
    echo ("Invalid Request");
}
?>