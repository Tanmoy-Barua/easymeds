<?php 
ob_start();
session_start();
include 'inc/config.php'; 
unset($_SESSION['user']);
unset($_SESSION['login_as_Pharmacists']);
header("location: login.php"); 
?>