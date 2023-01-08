<?php
session_start();
include_once("cn_config.php");
include_once("utils.php");

if (isset($_POST['upload-file'])) {
    $redirect = header("Location: ../wp-admin/files.php");
    $file_name = $_POST['name'];
    $date_created = date("Y-m-d");
    $category_id = $_POST['category'];

    if (isset_file('file')) {
        $file_description = $_FILES['file']['name'];
        $file_tmp_name = $_FILES['file']['tmp_name'];
        $file_extension = pathinfo($file_description, PATHINFO_EXTENSION);
        $allowed_extensions = ['pdf', 'xlsx', 'ppt', 'docx']; //pending upload for jpeg, jpg, png and etc.

        // Check if the avatar file has a valid extension
        if (in_array($file_extension, $allowed_extensions)) {
            // Move the uploaded file to the wp-images directory
            if (move_uploaded_file($file_tmp_name, "../wp-files/" . $file_description)) {
                $stmt = $conn->prepare('INSERT INTO tbl_files(file_name, file_description, date_created, category_id) 
                            VALUES (?, ?, ?, ?)');
                $stmt->bind_param('ssss', $file_name, $file_description, $date_created, $category_id);
                if ($stmt->execute()) {
                    $_SESSION['success'] = "Successfully Added";
                    $redirect;
                } else {
                   $_SESSION['error'] = "Something went wrong.";
                    $redirect;
                }
            } else {
                $_SESSION['error'] = "The file is not moved";
                $redirect;
            }
        } else {
            $_SESSION['error'] = "Your file extension is not supported.";
            $redirect;
        }
    } else {
        $_SESSION['error'] = "Please select a file";
        $redirect;
    }
}elseif(isset($_POST['file_Token'])){
    $file_id = $_POST['file_id'];
    $file_query = $conn->query("SELECT * FROM tbl_files WHERE _id = '{$file_id}' LIMIT 1");
    if($file_query->num_rows > 0){
        $response = $file_query->fetch_assoc();
    }else{
        $response = "Something went wrong.";
    }
    echo(json_encode($response));

}elseif(isset($_POST['edit-file'])){
    $redirect = header("Location: ../wp-admin/files.php");

    $file_id = $_POST['file_id'];
    $file_name = $_POST['name'];

    $category = $_POST['category']; //It can be empty fields

    if(empty($category)){
        if (isset_file('file')) {
            $file_description = $_FILES['file']['name'];
            $file_tmp_name = $_FILES['file']['tmp_name'];
            $file_extension = pathinfo($file_description, PATHINFO_EXTENSION);
            $allowed_extensions = ['pdf', 'xlsx', 'ppt', 'docx']; //pending upload for jpeg, jpg, png and etc.
    
            // Check if the avatar file has a valid extension
            if (in_array($file_extension, $allowed_extensions)) {
                // Move the uploaded file to the wp-images directory
                if (move_uploaded_file($file_tmp_name, "../wp-files/" . $file_description)) {
                    $stmt = $conn->prepare('UPDATE tbl_files SET file_name = ?, file_description = ? WHERE _id = ? LIMIT 1');
                    $stmt->bind_param('ssss', $file_name, $file_description, $file_id);
                    if ($stmt->execute()) {
                        $_SESSION['success'] = "Successfully Updated";
                        $redirect;
                    } else {
                       $_SESSION['error'] = "Something went wrong.";
                        $redirect;
                    }
                } else {
                    $_SESSION['error'] = "The file is not moved";
                    $redirect;
                }
            } else {
                $_SESSION['error'] = "Your file extension is not supported.";
                $redirect;
            }
        } else {
            $stmt = $conn->prepare('UPDATE tbl_files SET file_name = ? WHERE _id = ? LIMIT 1');
            $stmt->bind_param('ss', $file_name, $file_id);
            if ($stmt->execute()) {
                $_SESSION['success'] = "Successfully Updated";
                $redirect;
            } else {
               $_SESSION['error'] = "Something went wrong.";
                $redirect;
            }
        }
    }else{
        if (isset_file('file')) {
            $file_description = $_FILES['file']['name'];
            $file_tmp_name = $_FILES['file']['tmp_name'];
            $file_extension = pathinfo($file_description, PATHINFO_EXTENSION);
            $allowed_extensions = ['pdf', 'xlsx', 'ppt', 'docx']; //pending upload for jpeg, jpg, png and etc.
    
            // Check if the avatar file has a valid extension
            if (in_array($file_extension, $allowed_extensions)) {
                // Move the uploaded file to the wp-images directory
                if (move_uploaded_file($file_tmp_name, "../wp-files/" . $file_description)) {
                    $stmt = $conn->prepare('UPDATE tbl_files SET file_name = ?, file_description = ?, category_id = ? WHERE _id = ? LIMIT 1');
                    $stmt->bind_param('ssss', $file_name, $file_description, $category, $file_id);
                    if ($stmt->execute()) {
                        $_SESSION['success'] = "Successfully Updated";
                        $redirect;
                    } else {
                       $_SESSION['error'] = "Something went wrong.";
                        $redirect;
                    }
                } else {
                    $_SESSION['error'] = "The file is not moved";
                    $redirect;
                }
            } else {
                $_SESSION['error'] = "Your file extension is not supported.";
                $redirect;
            }
        } else {
            $stmt = $conn->prepare('UPDATE tbl_files SET file_name = ?, category_id = ? WHERE _id = ?');
            $stmt->bind_param('sss', $file_name, $category, $file_id);
            if ($stmt->execute()) {
                $_SESSION['success'] = "Successfully Updated";
                $redirect;
            } else {
               $_SESSION['error'] = "Something went wrong.";
                $redirect;
            }
        }
    }
    
}else{
    echo("Invalid Request");
}

?>