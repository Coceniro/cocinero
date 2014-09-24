<?php
include_once("includes/code_header.php");
error_reporting(0);
/*$a = */ session_destroy();
//var_dump($a);
/*$b = */ session_unset();
//var_dump($b);
//print_r($_SESSION);
//print_r($_SESSION['error']);
unset($_SESSION['ses_user_id']);
unset($_SESSION['ses_user_name']);
header("Location:index.php");
?>
