
<section id="nav-bar">
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
	<?php if(isset($_SESSION['Auth'])):?>
		<a class="navbar-brand" href="#"><img src="WEFUND.jpg"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<ul class="navbar-nav ml-auto">
			<li class="nav-item">
				<a class="nav-item nav-link" href="affiliation.php">Affiliation</a>
			</li>
			<li class="nav-item">
				<a class="nav-item nav-link" href="projects.php">Projets</a>
			</li> 
			<li class="nav-item">
				<a class="nav-item nav-link" href="index.php">Mon espace</a>
			</li>
			<li class="nav-item">
				<a class="nav-item nav-link" href="logout.php">Logout</a>
			</li> 
	<?php else: ?>
		<a class="navbar-brand" href="#"><img src="img/WEFUND.jpg"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavAltMarkup">
			<ul class="navbar-nav ml-auto">
					<li class="nav-item">
						<a class="nav-item nav-link" href="index.php">Accueil</a>
					</li>
					<li class="nav-item">
						<a class="nav-item nav-link" href="fundraiser.php">Fundraiser</a>
					</li>
					<li class="nav-item">
						<a class="nav-item nav-link" href="investir.php">Investir</a>
					</li> 
					<li class="nav-item">
						<a class="nav-item nav-link" href="annonces.php">Annonces</a>
					</li> 
					<li class="nav-item">
						<a class="nav-item nav-link" href="domaine.php">Domaines</a>
					</li> 
					<li class="nav-item">
						<a class="nav-item nav-link" href="connexion.php">Connexion</a>
					</li>
				<?php endif;?>
				</ul>

			</div>
            </ul>
        </div>
		</nav>
	</section>