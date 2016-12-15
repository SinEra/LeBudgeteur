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
			<p>Le budgeteur est un site web qui permet à l'usager de mieux gérer son porte-feuille. En entrant chacune de ses transactions quotidiennes, le site lui permet de visualiser des dépenses et ses revenus.</p>

			<p>À l’ère des cartes de crédit et de débit, il n’est plus aussi facile de réaliser à quel niveau l’argent défile sous nos yeux. Avec de l’argent « virtuel », notre impression de notre situation financière n’est pas nécessairement réaliste. Ne serait-ce que pour réaliser des petits ou des gros projets, réduire ses dettes ou en prévision d’un imprévu, il faut parfois faire des suivis rigoureux de notre budget sur du long terme. Pour contrôler ses dépenses, il faut être capable de connaître ses besoins essentiels, de déterminer ses priorités, savoir quelles dépenses superflues éliminer. Avec le rythme de vie qu’on peut avoir de nos jours, on n’a pas toujours le temps de s’asseoir pour tout gérer. Le projet d’application de budget sera un outil qui aura pour but d’aider les gens à planifier et à réaliser leur état financier.</p>

			<p>Ce travail a été effectué en 75 heures</p>

			<p>Les Coordonnées</p>
			<p>Era Sinbandith erasinabndith@gmail.com</p>
			

			<div class="text-center col-md-12">
				<a href="inscriptionInfos.php" class="btn btn-default">Inscrivez-vous maintenant</a>
			</div>
		</div>
	</div>

<?php

	require_once("partial/footer.php");

/* 
Dans un but de promotion, quelques captures d’écran avec explications (au moins 3) 1.00 % 
Présentation de tous les outils technologiques utilisés pour le développement 0.50 % 
	IDE, langages de programmation, librairies, moteur de base de données, etc. */