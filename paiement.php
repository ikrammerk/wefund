<?php

session_start();
$idProject = $_GET['id'];
require_once 'inc/Database.php';
if (!empty($_POST)) {
  if (!empty($_POST['name']) && !empty($_POST['cardnumber']) && !empty($_POST['expdate']) && !empty($_POST['cvc']) ) {
    
        $statement = $db->prepare('SELECT nb_investisseur FROM projects WHERE id = :id');
        $statement->bindValue(":id",$idProject );
        $statement->execute();
        $prevValue = $statement->fetch();
        $newValue = (int)$prevValue->nb_investisseur + 1;

        $statement = $db->prepare('UPDATE `projects` SET `nb_investisseur`=:nb WHERE id=:id');
        $statement->bindValue(":nb", $newValue);
        $statement->bindValue(":id", $idProject);
        $statement->execute();

        $_SESSION['payment']['success'] = "Paiement effectué avec succés";
        header("Location: paiement.php?id=$idProject");
        exit;
    
       
  }else{
     $_SESSION['payment']['danger'] = "Tous les champs doivent etre remplis";
    header('Location: paiement.php');
     exit;
  }
}
?>
<head>
  <link rel="stylesheet" href="paiement.css">
</head>
<div class="wrapper">
  <div class="payment">
    <div class="payment-logo">
      <p>p</p>
    </div>
    
    
     <form method="POST">

    <h2>Paiement</h2>
    <?php if (isset($_SESSION['payment'])): ?>
     <?php foreach ($_SESSION['payment'] as $type => $message): ?>
       <div class="alert alert-<?=$type;?>">
          <div><?=$message;?></div>
        </div>
     <?php endforeach;?>
   <?php endif;?>
   <?php unset($_SESSION['payment']);?>
    <div class="form">
      <div class="card space icon-relative">
        <label class="label">Nom Complet:</label>
        <input type="text" class="input" name="name" placeholder="Nom sur La carte" required>
        <i class="fas fa-user"></i>
      </div>
      <div class="card space icon-relative">
        <label class="label">Numero de carte</label>
        <input type="text" class="input" name="cardnumber" data-mask="0000 0000 0000 0000" placeholder="Numero de carte" required>
        <i class="far fa-credit-card"></i>
      </div>
      <div class="card-grp space">
        <div class="card-item icon-relative">
          <label class="label">date d'expiration</label>
          <input type="text"  name="expdate" class="input"  placeholder="00 / 00" required>
          <i class="far fa-calendar-alt"></i>
        </div>
        <div class="card-item icon-relative">
          <label class="label">CVC:</label>
          <input type="text" class="input" data-mask="000" name="cvc" placeholder="000" required>
          <i class="fas fa-lock"></i>
        </div>
      </div>
        
      <button  type="submit">
        Payer
      </buton>
      
    </div>
  </form>
  </div>
</div>

<style>
  .alert {
    text-align: center;
    border-radius: 5px;
    padding: 20px 0 20px 0;
    margin-bottom: 25px;
  }
  .alert-danger {
    color: white;
    background: #ec3333;
  }
  .alert-success {
    color: white;
    background: #7de94d;
  }
</style>