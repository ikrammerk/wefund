<?php
session_start();

require_once '../inc/Database.php';

$statement = $db->prepare('DELETE FROM  projects WHERE  id = :id');
$statement->bindValue(":id", $_GET['id']);
$statement->execute();

$_SESSION['message']['success'] = "Projets modifiées !";
header('Location: index.php');
exit;


?>