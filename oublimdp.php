<?php 

	require_once("action/OubliMdpAction.php");
	$action = new OubliMdpAction();
	$action->execute();


	require_once("partial/header-login-inscription.php");	
?>

		<h1 class="text-center">Le budgeteur</h1>
		<h2 class="text-center">Réinitialiser le mot de passe</h2>

		<?php if(empty($action->question)){ ?>

		<form action="oublimdp.php" method="post" onsubmit="return validate()" class="oublimdpemail panel panel-default">

			<!--Message si connexion erronée-->
			<?php if ($action->error === true){ ?>
				<div class="erreur">Le compte n'exite pas</div>
			<?php } ?>

			<div class="panel-heading"><strong>Veuillez entrer votre courriel.</strong></div>
			<div class="panel-body">
				<div class="form-group">
					<input class="form-control" placeholder="Courriel" type="text" name="email" id="email">
				</div>
				<input type="submit" value="Rechercher" class="btn btn-default">
			</div>
		</form>

		<?php } else {?>

		<form action="oublimdp.php" method="post" onsubmit="return validate()" class="oublimdpquestion panel panel-default">

			<!--Message si connexion erronée-->
			<?php if($action->error === true){ ?>
				<div class="erreur">Réponse invalide</div>
			<?php } ?>

			<div class="panel-heading"><strong><?= $action->question ?></strong></div>
			<div class="panel-body">
				<div class="form-group">
					<input class="form-control" placeholder="Votre réponse secrète" type="text" name="reponse" id="reponse">
				</div>
				<input type="submit" value="Valider" class="btn btn-default">
				<input type="hidden" value="<?= $action->email ?>" name="email">
			</div>
		</form>
		<?php } ?>

<?php

	require_once("partial/footer.php");