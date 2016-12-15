<?php 

	require_once("partial/header-login-inscription.php");	

?>

	<h1 class="text-center">Le budgeteur</h1>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-md-6 col-md-offset-3">
					<div class="panel panel-default">
						<div class="panel-heading"><strong>Connexion</strong></div>
						<div class="panel-body">
							<form action="login.php" method="post" onsubmit="return validate()" class="login">
								<div class="form-group">
									<label for="emailInput">Courriel</label>
									<input class="form-control" placeholder="Courriel" type="text" name="email" id="emailInput">
								</div>

								<div class="form-group">
									<label for="passwordInput">Mot de passe</label>
									<input class="form-control" placeholder="Mot de passe" type="password" name="password" id="passwordInput">
								</div>

								<input type="submit" value="Connexion" class="btn btn-default">
							</form>
						</div>
					</div>
				</div>
			</div>

			<h2>Présentation du projet</h2>
			<p>Le budgeteur est un site web qui permet à l'usager de mieux gérer son porte-feuille. En entrant chacune de ses transactions quotidiennes, le site lui permet de visualiser des dépenses et ses revenus pour une période spécifiée.</p>

			<p>À l’ère des cartes de crédit et de débit, il n’est plus aussi facile de réaliser à quel niveau l’argent défile sous nos yeux. Avec de l’argent « virtuel », notre impression de notre situation financière n’est pas nécessairement réaliste. Ne serait-ce que pour réaliser des petits ou des gros projets, réduire ses dettes ou en prévision d’un imprévu, il faut parfois faire des suivis rigoureux de notre budget sur du long terme. Pour contrôler ses dépenses, il faut être capable de connaître ses besoins essentiels, de déterminer ses priorités, savoir quelles dépenses superflues éliminer. Avec le rythme de vie qu’on peut avoir de nos jours, on n’a pas toujours le temps de s’asseoir pour tout gérer. Le projet d’application de budget sera un outil qui aura pour but d’aider les gens à planifier et à réaliser leur état financier.</p>

			<h2>Quelques images...</h2>
			<h3>Page de connexion</h3>
			<p>Ici l'usager peut se connecter sur le site.</p>
			<img src="images\login.png">
			<h3>Page d'accueil</h3>
			<p>Voici la page d'accueil que l'usager voit lorsqu'il se connecter au site. Il peut voir un graphique global de ses revenus versus ses dépenses du mois courant.</p>
			<img src="images\accueil.png">
			<h3>Page d'ajout des transactions</h3>
			<p>La page où l'usager ajoute ses transactions quotidiennes.</p>
			<img src="images\transactions.png">
			<h3>Page d'affichage des graphiques</h3>
			<p>La page ou le client peut afficher ses graphiques de dépenses et de revenus selon la période et les catégorie.</p>
			<img src="images\graphiques.png">
			<h3>Page de modification de comptes.</h3>
			<p>Via cette page, l'usager peut ajuster ses comptes.</p>
			<img src="images\modif.png">

			<h2>Outils technologiques utilisés</h2>
			<p> Au niveau de l'IDE, j'ai utilisé SublimeText afin d'écrire le code php et MySQL Workbench pour la base de données en ligne.</p>

			<p>Les langages utilisés étaient principalement PHP, JavaScript, MySQL</p>

			<p>J'ai utilisés librairies chart.js pour les graphiques, BootStrap pour le visuel, PDO (MySQL) le moteur de base de données MySQL</p>

			<p>Pour l'élaboration du travail, j'ai également utilisé xampp pour Apache, MySQL et PHP. Heroku pour le déploiement du site, clearDB pour la base de données avec Heroku ainsi que GitHub</p>

			<h2>Temps total investi</h2>
			<p>Ce travail a été effectué en environ 75 heures</p>

			<h2>Les Coordonnées</h2>
			<p>Era Sinbandith erasinbandith@gmail.com</p>



			
			
			<div class="text-center col-md-12">
				<a href="inscriptionInfos.php" class="btn btn-default">Inscrivez-vous maintenant</a>
			</div>
		</div>
	</div>

<?php

	require_once("partial/footer.php");

