<?php
session_start();
include_once("../wp-includes/utils.php");
if (isset($_GET['f']) && isset($_GET['v']) && isset($_GET['mode'])) {
    $_SESSION['file_name'] = htmlspecialchars($_GET['f']);
    $_SESSION['view_name'] = htmlspecialchars($_GET['v']);
    $mode = $_GET['mode'];

    if($mode == "students"){
        header("Location: view-students.php?v=".token_generator(5));
    }else{
        header("Location: view-teachers.php?v=".token_generator(5));
    }
}else{
    unset($_SESSION['file_name']);
    unset($_SESSION['view_name']);
} 

$lines = file("../" . '/.env');
foreach ($lines as $line) {
    [$key, $value] = explode('=', $line, 2);
    $key = trim($key);
    $value = trim($value);

    putenv(sprintf('%s=%s', $key, $value));
    $_ENV[$key] = $value;
    $_SERVER[$key] = $value;
}

if($_ENV['web_status'] == "Online" || $_ENV['web_status'] == "online"){
    $_SESSION['web_status'] = "Online";
    $_SESSION['web_address'] = $_ENV['web_address'];
}else{
    $_SESSION['web_status'] = "Offline";
}
?>