<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>mes annonces</title>
  <link rel="stylesheet" href="annonces.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEFUND WEBSITE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
</head>
<body>
    <?php include_once 'inc/header.php'; ?>
    <section> 
  <section class="articles">
     <div class="article">
      <div class="left">
        <img src="img/pexels-photo-1268855.jpeg" alt="">
      </div>
      <div class="right">
        <p class="date">Juillet, 29, 2020</p>
        <h1>Participez à une station touristique</h1>
        <p class="description">Participez à une start-up et station touristique révolutionnaire, la première du genre au Maroc dans des conditions de marché parfaites. Offrir un minimum de 20% de rendement annuel à l'investisseur dans une entreprise déjà rentable aujourd'hui</p>
        <p class="auteur">Ikram Merk</p>
      </div>
    </div> 
    
    
    <div class="article">
      <div class="left">
        <img src="img/bang.webp" alt="">
      </div>
      <div class="right">
        <p class="date">Mars, 24, 2020</p>
        <h1>Investir aux conforts des clients!</h1>
        <p class="description">Terrains en bord de mer dans un emplacement idéal pour les entreprises d'exploitation des installations hôtelières et en particulier pour les appartements de luxe villas Bungalows dans la zone touristique</p>
        <p class="auteur">Samia Joudar</p>
      </div>
    </div>
    
    <div class="article">
      <div class="left">
        <img src="img/menu.jpg" alt="">
      </div>
      <div class="right">
        <p class="date">Fevrier, 24, 2021</p>
        <h1>la seule application d'hébergement de menus</h1>
        <p class="description">La première et la seule application d'hébergement de menus, offrant aux clients tout ce dont ils ont besoin pour décider où manger au restaurant; Site Web et application en direct sur iOS et Android; En contact avec de grandes chaînes; En vedette dans les nouvelles de la presse nationale; Auparavant investi 80k £ +</p>
        <p class="auteur">Ikram Merk</p>
      </div>
    </div>
  </section>
        </section>
        <br>
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
  	 				<li><a href="affiliation.html">affiliation</a></li>
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
    
</body>
</html>