<?php 

	require_once("action/OubliMdpAction.php");
	$action = new OubliMdpAction();
	$action->execute();


	require_once("partial/header.php");	
?>

		<h1>Le budgeteur</h1>
		<h2>Réinitialiser le mot de passe</h2>

		<?php if(empty($action->question)){ ?>

		<form action="oublimdp.php" method="post" onsubmit="return validate()" class="formulaire">

			<!--Message si connexion erronée-->
			<?php 

				if($action->error === true){
					?>
					<div class="erreur">Le compte n'exite pas</div>
					<?php	
				}
			?>

			<div>Courriel</div>
			<div><input type="text" name="email"></div>
		
			<input type="submit" value="Rechercher" class="bouton">
		</form>

		<?php } else {?>

			<form action="oublimdp.php" method="post" onsubmit="return validate()" class="formulaire">

			<!--Message si connexion erronée-->
			<?php 

				if($action->error === true){
					?>
					<div class="erreur">Réponse invalide</div>
					<?php	
				}
			?>

			<div> <?= $action->question ?></div>

			<div>Reponse</div>
			<div><input type="text" name="reponse"></div>
			<input type="hidden" value="<?= $action->email ?>" name="email">
			<input type="submit" value="Valider" class="bouton">
			</form>
		<?php } ?>


<?php

	require_once("partial/footer.php");