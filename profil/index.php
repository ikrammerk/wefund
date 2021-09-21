<?php
session_start();

$Nom = $_SESSION["Auth"]->Nom;
$Prénom = $_SESSION["Auth"]->Prénom;
require_once '../inc/Database.php';

$statement = $db->prepare('SELECT * FROM projects WHERE  id_entrepreneur = :id');
$statement->bindValue(":id", $_SESSION['Auth']->id);
$statement->execute();
$projects = $statement->fetchAll(PDO::FETCH_ASSOC);

$statement = $db->prepare('SELECT * FROM users WHERE  id = :id');
$statement->bindValue(":id", $_SESSION['Auth']->id);
$statement->execute();
$user = $statement->fetch();

$statement = $db->prepare('SELECT COUNT(nb_investisseur) as nb FROM projects WHERE id_entrepreneur =:id');
$statement->bindValue(":id", $_SESSION['Auth']->id);
$statement->execute();
$nb = $statement->fetch();
$nbInv = (int) $nb->nb ;

$stars = 0;
if ( $nbInv < 1) {
  $stars = 1;  
}else if ( $nbInv <  3)  {
 $stars = 2 ;
}else if ( $nbInv <  5) {
  $stars = 3;  
}else if ( $nbInv <  8 ) {
  $stars = 4;  
}else {
  $stars = 5;    
}
if(!empty($_FILES)){
if (!empty($_FILES['img'])) {
    $name_file = $_FILES['img']['name'];
    $name_extension = strrchr($name_file, ".");
    $extensions_autorisation = array('.png', '.PNG', '.jpg', '.JPG','.jpeg', '.JPEG');
    $file_tmp_name = $_FILES['img']['tmp_name'];
    $file_dest = 'img/' . $name_file;

    
        if (in_array($name_extension, $extensions_autorisation)) {
            if (move_uploaded_file($file_tmp_name, $file_dest)) {
                $statement = $db->prepare("UPDATE users SET img=:img WHERE id=:id");
                $statement->bindValue(":img", $name_file);
                $statement->bindValue(":id", $_SESSION['Auth']->id);
                $statement->execute();
                $_SESSION["message"]['success'] = "Compte modifié !";
                header('Location: index.php');
                exit;
            } 
        } else {
        $_SESSION["message"]['danger'] = "Pour l'image de profile seuls les extensions PNG , JPG ou JPEG sont autorisées";
        header('Location: index.php');
        exit;
    }

}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Page</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./fontawesome/css/all.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WEFUND WEBSITE</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>
    
</head>
    <body>
      <?php include_once '../inc/header.php'; ?>
    </body>
<body1>
   <?php if (isset($_SESSION['message'])): ?>
     <?php foreach ($_SESSION['message'] as $type => $message): ?>
       <div class="alert alert-<?=$type;?>">
          <div><?=$message;?></div>
        </div>
     <?php endforeach;?>
   <?php endif;?>
   <?php unset($_SESSION['message']);?>

    <div class="container">
       <div class="profile-header">
           <div class="profile-img">
             <img src="img/<?php echo $user->img;?>">
           </div>
           <div class="profile-navy-info">
               <h3 class="user-name"><?php echo "$Nom  $Prénom"; ?></h3>
               <div class="address">
                   <p class="state"><?php echo $_SESSION["Auth"]->Ville; ?></p>
                   <!-- <span class="country">MAROC.</span> -->
               </div>
           </div>
           <!-- <div class="profile-option">
               <div class="notification">
                   <i class="fa fa-bell"></i>
                   <span class="alert-message">1</span>
               </div>
           </div> -->
       </div>
       <div class="main-bd">
           <div class="left-side">
               <div class="profile-side">
                   <p class="mobile-no"><i class="fa fa-phone"></i><?php echo $_SESSION["Auth"]->Tél; ?></p>
                   <p class="user-mail"><i class="fa fa-envelope"></i><?php echo $_SESSION["Auth"]->Email; ?></p>
                   <div class="user-bio">
                      <h3>Bio</h3>
                       <p class="bio"><?php echo $_SESSION["Auth"]->Bio; ?></p>
                   </div>
                  <!--  <div class="profile-btn">
                       <button class="chatbtn">
                           <i class="fa fa-comment"></i> message
                       </button>
                       <button class="createbtn">
                           <i class="fa fa-plus"></i>Ajouter
                       </button>
                   </div> -->
                   <div class="user-rating">
                       <h3 class="rating"><?php echo $stars; ?></h3>
                       <div class="rate">
                          <div class="stars">
                            <?php for ($i=1; $i <= $stars; $i++) { ?>
                           <i class="fa fa-star"></i>
                           <?php } ?>
                  
                          </div>
                          <span class="no-user"><span><?php echo $nb->nb; ?></span>&nbsp;&nbsp; Investisements</span>
                       </div>
                   </div>
                   
               </div>
           </div>
           <div class="right-side">
               <div class="navy">
                   <ul>
                       <li onclick="tabs(0)" class="user-post active">Projets</li>
                       <li onclick="tabs(1)" class="user-review">Paramétres</li>
<!--                        <li onclick="tabs(2)" class="user-setting">Blog</li>
 -->                   </ul>
               </div>
               <div class="profile-body">
                   <div class="profile-posts tab">
                       <h1>Vos projets actuel</h1>
                      <?php foreach ($projects as $i => $project) { ?>
                      <div class="card">
                          <h5 class="card-header">#<?php echo $i+1;?> <?php echo $project['title'];?> - <?php echo $project['Date'];?></h5>
                          <div class="card-body">
                            <h5 class="card-title">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                               </svg>
                            <?php echo $project['nb_investisseur'];?> investisseur</h5>
                            <p class="card-text"><?php echo $project['description'];?></p>
                            <a class="btn btn-danger" href="delete.php?id=<?php echo $project['id'];?>">Supprimer le projet</a>
                          </div>
                      </div><br><br>  
                    <?php } ?>
                    <div class="col text-center">
                            <a class="btn btn-primary col-sm-5" href="formm.php">Ajoutez un projet</a>
                          </div>
                        </div>
                   </div>
                   <div class="profile-reviews tab">
                      <h1>Gérer votre compte</h1>
                      <p>Vous pouvez changer ou paramétrer ou modiifier vos informations personnelles grace au formulaire suivants :</p>
                      <form method="POST" enctype="multipart/form-data">
                        <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-4 col-form-label">Changer la photo de profile</label>
                        <div class="col-sm-7">
                          <input type="file" name="img" class="form-control" required>
                        </div>
                        </div>
                        <div class="form-group row">
                          <div class="col text-center">
                            <button type="submit" class="btn btn-primary col-sm-5">Modifier</button>
                          </div>
                        </div>
                      </form>
                   </div>
                   <!-- <div class="profile-settings tab">
                      <h1>Blog</h1>
                       <p>En tant qu'ingénieur junior se préparant à entrer sur le marché du travail, la programmation en binôme est probablement l'une des premières techniques que vous rencontrerez sur le tas au fur et à mesure que vos coéquipiers vous familiariseront avec un projet. Vous pouvez également jumeler le programme pendant votre entretien d'ingénierie, ce qui donnera à l'intervieweur une idée de votre façon de travailler, de vos compétences techniques et de votre approche de la résolution de problèmes.</p>
                   </div> -->
               </div>
           </div>
       </div>
   </div>
    
    
    
    
    <script src="./jquery/jquery.js"></script>
    <script src="./main.js"></script>
</body1>
      <br>
        <br>
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
  	 				<li><a href="file:///E:/PFE/investir.html">Investir</a></li>
  	 				<li><a href="file:///E:/PFE/fundraiser.html">Fundraiser</a></li>
  	 				<li><a href="file:///E:/PFE/profil/index.html">espace</a></li>
  	 				<li><a href="file:///E:/PFE/affiliation.html">affiliation</a></li>
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Support</h4>
  	 			<ul>
  	 				<li><a href="file:///E:/PFE/inscription.html">type de profil</a></li>
  	 				<li><a href="file:///E:/PFE/paeiment.html">methode de paiement</a></li>
  	 				<li><a href="file:///E:/PFE/affiliation.html">affiliation</a></li>
  	 				
  	 			</ul>
  	 		</div>
  	 		<div class="footer-col">
  	 			<h4>Contactez-nous</h4>
  	 			<ul>
  	 				<li><a href="file:///E:/PFE/inscription.html">envoyez nous un message</a></li>
  	 				<li><a href="file:///E:/PFE/inscription.html">verification du profil</a></li>
  	 				<li><a href="file:///E:/PFE/inscription.html">changer son type de profil</a></li>
  	 				<li><a href="file:///E:/PFE/affiliation.html">affiliation</a></li>
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
</html>




















