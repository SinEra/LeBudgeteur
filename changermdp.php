<?php 

	require_once("action/ChangementmdpAction.php");
	$action = new ChangementmdpAction();
	$action->execute();

	require_once("partial/header-login-inscription.php");

?>

		<h1 class="text-center">Réinitialisation du mot de passe</h1>

		<form action="changermdp.php" method="post" onsubmit="return validate()" class="changermdp panel panel-default">			
			<div class="panel-heading"><strong>Entrez un nouveau mot de passe</strong></div>
			<div class="panel-body">
				<div class="form-group">
					<label for="mdp">Nouveau mot de passe</label>
					<input class="form-control" placeholder="Nouveau mot de passe" type="password" name="password" id="mdp">
				</div>
				<div class="form-group">
					<label for="mdpConfirm">Confimation du mot de passe</label>
					<input class="form-control" placeholder="Confirmation du mot de passe" type="password" 
						name="passwordConfirm" id="mdpConfirm">
				</div>
				<input type="submit" value="Réinitialiser" class="btn btn-default">
			</div>
		</form>

<?php

	require_once("partial/footer.php");