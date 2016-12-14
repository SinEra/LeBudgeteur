<?php 

	require_once("partial/header-login-inscription.php");	

	require_once("action/LoginAction.php");
	$action = new LoginAction();
	$action->execute();

?>

		<h1 class="text-center">Le budgeteur</h1>

		<form action="login.php" method="post" onsubmit="return validate()" class="login panel panel-default">
			
			<div class="panel-heading"><strong>Connexion</strong></div>
			<div class="panel-body">

				<!--Message si connexion erronée-->
				<?php if ($action->wasDenied === true){ ?>
					<div class="alert alert-danger" role="alert">Connexion refusée</div>
				
				<?php } else if ($action->wrongLogin === true){ ?>
					<div class="alert alert-danger" role="alert">Mauvais courriel/mot de passe. Veuillez recommencer.</div>

				<?php } else if ($action->champVide ===true){ ?>
					<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs s'il vous plaît</div>
				
				<?php } ?>

				<div class="form-group">
					<label for="emailInput">Courriel</label>
					<input class="form-control" placeholder="Courriel" type="text" name="email" id="emailInput">
				</div>

				<div class="form-group">
					<label for="passwordInput">Mot de passe</label>
					<input class="form-control" placeholder="Mot de passe" type="password" name="password" id="passwordInput">
				</div>

				<input type="submit" value="Connexion" class="btn btn-default">
				
				<div class="panel-footer">
					<div>Vous êtes nouveaux? <a href="inscriptionInfos.php">Cliquez ici</a></div>
					<div>Vous avez oublié votre mot de passe? <a href="oublimdp.php">Cliquez ici</a></div>
				</div>
			</div>
		</form>

<?php

	require_once("partial/footer.php");