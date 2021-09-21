<?php
session_start();
require_once 'inc/Database.php';

$statement = $db->prepare('SELECT * FROM projects');
$statement->execute();
$projects = $statement->fetchAll(PDO::FETCH_ASSOC);
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
      <?php include_once 'inc/header.php'; ?>
    </body>
      <br>
      <br>
      <body>
 <div class="container">
    <div class="row">
      
      <?php foreach ($projects as $i => $project) { ?>
      <div class="col-sm-4 py-3 py-sm-0" style="margin-bottom: 30px">
        <div class="card box-shadow">
          <img src="img/<?php echo $project['image'];?>" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title"><?php echo $project['title'];?> - <?php echo $project['Date'];?></h5>
            <p class="card-text">
              <?php echo substr($project['description'],0,80);?>...
            </p>
             <p class="card-text ">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                               </svg>
              <?php echo $project['nb_investisseur'];?> investisseur
            </p>
            <a target="_blank" href="profil/aboutProject.php?id=<?php echo $project['id'];?>" class="btn btn-primary">Contacter</a>
            <a href="paiement.php?id=<?php echo $project['id'];?>" class="btn btn-primary">Investir</a>
          </div>
        </div>
      </div>
      <?php } ?>
        
    </div>
  </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

    <br>
        <div class="contact-section">
      <div class="inner-width">
        <h1>Contactez-nous</h1>
        <input type="text" class="name" placeholder="Nom complet">
        <input type="email" class="email" placeholder="Email">
        <textarea rows="1" placeholder="Message" class="message"></textarea>
        <button>Envoyez</button>
      </div>
    </div>
        
        <footer class="footer">
  	 <div class="container">
  	 	<div class="row">
  	 		<div class="footer-col">
  	 			<h4>Wefund</h4>
  	 			<ul>
  	 				<li><a href="investir.php">Investir</a></li>
  	 				<li><a href="fundraiser.php">Fundraiser</a></li>
  	 				<li><a href="profil/index.php">espace</a></li>
  	 				<li><a href="affiliation.php">affiliation</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Support</h4>
  	 			<ul>
  	 				<li><a href="inscription.php">type de profil</a></li>
  	 				<li><a href="paiement.php">methode de paiement</a></li>
  	 				<li><a href="affiliation.php">affiliation</a></li>
  	 				
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Contactez-nous</h4>
  	 			<ul>
  	 				<li><a href="inscription.php">envoyez nous un message</a></li>
  	 				<li><a href="inscription.php">verification du profil</a></li>
  	 				<li><a href="inscription.php">changer son type de profil</a></li>
  	 				<li><a href="affiliation.php">affiliation</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Voir plus</h4>
  	 			<div class="social-links">
  	 				<a href="#"><i class="fa fa-facebook-f"></i></a>
  	 				<a href="#"><i class="fa fa-twitter"></i></a>
  	 				<a href="#"><i class="fa fa-instagram"></i></a>
  	 				
  	 			</div>
  	 		</div>
  	 	</div>
  	 </div>
  </footer>