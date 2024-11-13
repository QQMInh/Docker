<?php
ob_start();
include_once("config/config.php");
define('level', true);
session_start();
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
  
    $sql = "SELECT*FROM user WHERE email='$email'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($query);
    if ($row['user_level'] == 1) {
        define("admin", true);
        include_once('Admin/admin.php');
    
    } else {
        define("user", true);
        include_once('Pages/index.php');
    }
}
else{
    include_once('Pages/index.php');
}
?>