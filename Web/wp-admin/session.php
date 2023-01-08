<?php 
include_once("../wp-includes/session.php");
if($role != 'administrator'){
    header("Location: ../dashboard/");
}
?>