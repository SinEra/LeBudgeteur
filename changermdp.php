<?php 

	require_once("action/ChangementmdpAction.php");
	$action = new ChangementmdpAction();
	$action->execute();

	require_once("partial/header.php");

?>

		<h1>Réinitialisation du mot de passe</h1>


		<form action="changermdp.php" method="post" onsubmit="return validate()" class="formulaire">			
			
			<div>Mot de passe:</div>
			<div><input type="password" name="password"></div>
			
			<div>Confirmer le mot de passe:</div>
			<div><input type="password" name="passwordConfirm"></div>
			
			<input type="submit" value="Réinitialiser" class="bouton">
		</form>

<?php

	require_once("partial/footer.php");