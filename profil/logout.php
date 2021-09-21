<?php 
session_start();

unset($_SESSION['Auth']);
header('Location: ../index.php');
exit;
?>