<?php
session_start();
require_once '../inc/Database.php';

if (!empty($_POST)) {
    
    $name_file = $_FILES['img']['name'];
    $name_extension = strrchr($name_file, ".");
    $extensions_autorisation = array('.png', '.PNG', '.jpg', '.JPG','.jpeg', '.JPEG');
    $file_tmp_name = $_FILES['img']['tmp_name'];
    $file_dest = '../img/' . $name_file;

        if (in_array($name_extension, $extensions_autorisation)) {
            if (move_uploaded_file($file_tmp_name, $file_dest)) {
                $statement = $db->prepare("INSERT INTO projects (title,description,Date,image,id_entrepreneur) VALUES (:title,:des,:dt,:img,:id) ");
                $statement->bindValue(":title", $_POST['title']);
                $statement->bindValue(":des", $_POST['description']);
                $statement->bindValue(":dt", date('Y-m-d H:i:s'));
                $statement->bindValue(":img", $name_file);
                $statement->bindValue(":id", $_SESSION['Auth']->id);
                $statement->execute();
                $_SESSION["message"]['success'] = "Projet bien créé !";
                header('Location: index.php');
                exit;
            } 
        } else {
        $_SESSION["message"]['danger'] = "Pour l'image de projet seuls les extensions PNG , JPG ou JPEG sont autorisées";
        header('Location: formm.php');
        exit;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>form</title>
  <link rel="stylesheet" href="formm.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</head>
<body>
<form method="POST" enctype="multipart/form-data">
  <?php if (isset($_SESSION['message'])): ?>
     <?php foreach ($_SESSION['message'] as $type => $message): ?>
       <div class="alert alert-<?=$type;?>">
          <div><?=$message;?></div>
        </div>
     <?php endforeach;?>
   <?php endif;?>
   <?php unset($_SESSION['message']);?>
<div class="wrapper">
    <div class="title">
      Ajouter un projet
    </div>
    <div class="form">
        <div class="inputfield">
          <label>Titre du projet</label>
          <input type="text" name="title" class="input" required>
       </div> 
      <div class="inputfield">
          <label>Description</label>
          <textarea class="textarea" name="description" required></textarea>
       </div> 
       <div class="inputfield">
          <label>Image de projet</label>
          <input type="file" id="img" name="img" required>
       </div> 
           
      <div class="inputfield">
        <input type="submit" value="Ajouter" class="btn">
      </div>
    </div>
    
    </body>
    
    <bodyy>
   <div class="drag-area">
    <div class="icon"><i class="fas fa-cloud-upload-alt"></i></div>
  </div>
  <script src="script.js"></script>
    
</div>
</form>
    </boddy>
</html>
