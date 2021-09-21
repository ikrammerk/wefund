<?php

session_start();

require_once 'inc/Database.php';
if(isset($_SESSION['Auth'])){
  unset($_SESSION['Auth']);
}


if (!empty($_POST)) {
  if (!empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['password2']) && !empty($_POST['nom']) && !empty($_POST['prénom']) && !empty($_POST['tel']) && !empty($_POST['ville']) ) {

        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message']['danger'] = "L'email n'est pas valid";
            header('Location: inscription.php');
            exit;

        }
        if ($_POST['password'] !== $_POST['password2']) {
            $_SESSION['message']['danger'] = "Les 2 mots de passes doivent etre les memes";
            header('Location: inscription.php');
            exit;
        }

        if (empty($_POST['bio'])) {
          $_POST['bio'] = "  ";
        }

        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $statement = $db->prepare('INSERT INTO users SET Nom=:nom, Prénom=:prenom, Email=:email, Mdp=:mdp, Tél=:tel, Ville=:ville, Bio=:bio');
        $statement->bindValue(":nom", $_POST['nom']);
        $statement->bindValue(":prenom", $_POST['prénom']);
        $statement->bindValue(":email", $_POST['email']);
        $statement->bindValue(":mdp", $password);
        $statement->bindValue(":tel", $_POST['tel']);
        $statement->bindValue(":ville", $_POST['ville']);
        $statement->bindValue(":bio", $_POST['bio']);
        $statement->execute();
        $_SESSION['message']['success'] = "Vous etre enregistré maintenant vous pouvez se connecter";
        header('Location: connexion.php');
        exit;

  }else{
     $_SESSION['message']['danger'] = "Tous les champs doivent etre remplis";
    header('Location: inscription.php');
     exit;
  }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Formulaire d'inscription</title>
  <link rel="stylesheet" href="inscription.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
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
        <body1>
  <form method="POST">
      <?php if (isset($_SESSION['message'])): ?>
     <?php foreach ($_SESSION['message'] as $type => $message): ?>
       <div class="alert alert-<?=$type;?>">
          <div><?=$message;?></div>
       </div>
     <?php endforeach;?>
   <?php endif;?>
   <?php unset($_SESSION['message']);?>
    <h1>S'inscrire</h1>
    <div class="social-media">
      <p><i class="fab fa-google"></i></p>
      <p><i class="fab fa-youtube"></i></p>
      <p><i class="fab fa-facebook-f"></i></p>
      <p><i class="fab fa-twitter"></i></p>
    </div>
    <p class="choose-email">ou utiliser votre adresse e-mail :</p>
    
    <div class="inputs">
      <input type="text" name="nom" placeholder="Nom" required>
      <input type="text" name="prénom" placeholder="Prenom" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Mot de passe" required>
      <input type="password" name="password2" placeholder="confirmez votre mot de passe" required>
      <input type="text" name="tel" placeholder="Téléphone" maxlength="10" minlength="10" required>
      <input type="text" name="ville" placeholder="Ville, Pays" required>
      <textarea  name="bio" placeholder="Bio" ></textarea>
    </div>
    
    <p class="inscription">Je possède déjà un compte <span Type="button" onclick="window.location='connexion.php'">se connecter</span></p>
    <div align="center">
      <button type="submit">S'inscrire</button>
    </div>
  </form>
            </body1>
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
        </section>
    </section>
</body>
</html>