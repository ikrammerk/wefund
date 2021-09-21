<?php
session_start();
require_once '../inc/Database.php';

$statement = $db->prepare('SELECT * FROM projects WHERE  id = :id');
$statement->bindValue(":id", $_GET['id']);
$statement->execute();
$project = $statement->fetch();

$statement = $db->prepare('SELECT * FROM users WHERE  id = :idp');
$statement->bindValue(":idp", $project->id_entrepreneur);
$statement->execute();
$entrepreneur = $statement->fetch();
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>project</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">
    <link rel="stylesheet" href="project.css">
    <title>WEFUND WEBSITE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      </head>
    <body>
    </body>
      <br>
      <br>
      <body>
  <div class="container">
    <div class="row">
      
      <div class="col" >
        <div class="card box-shadow">
          <img src="../img/<?php echo $project->image;?>" style="height: 30%;" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $project->title;?> - <?php echo $project->Date;?></h5>
            <p class="card-text"><?php echo $project->description;?></p>
            <p class="card-text text-center">
            	<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
				  <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
				  <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
				</svg>
            	<?php echo $project->nb_investisseur;?> investisseur
            </p>
            <div class="card-text">
            	<h5 class="card-title">Créer par</h5>
            	<span class="grid-profile-info">
            		<img id="profile-image" src="img/<?php echo $entrepreneur->img;?>"  class="card-img-top" alt="...">
            		<?php echo($entrepreneur->Nom." ".$entrepreneur->Prénom);?>
            	</sapn>

            </div>
          </div>
        </div>
      </div>
        
    </div>
  </div>
 

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

    <br>

  <style type="text/css">
  	.grid-profile-info{
  		display: grid;
/*  		grid-template-columns: auto auto;
*/  	}
  	#profile-image{
  		border-radius: 100%;
  		margin-left: 20px;
  		width: 50px;
  		height: 50px;
  	}
  </style>