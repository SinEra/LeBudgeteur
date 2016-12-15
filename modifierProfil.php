<?php 

	require_once("partial/header.php");

	require_once("action/ModifierProfilAction.php");
	$action = new ModifierProfilAction();
	$action->execute();

?>

		<h2 class="text-center">Modification de profil</h2>

		<form action="modifierProfil.php" method="post" onsubmit="return validate()" 
			class="modificationprofilform panel panel-default">

			<div class="panel-heading"><strong>Votre profil</strong></div>
				
			<div class="panel-body">
				<div class="form-group">
					<label for="nom">Nom</label>
					<input class="form-control" value="<?= $action->getUser()["lastName"] ?>" type="text" name="nom" 
						id="nom">
				</div>

				<div class="form-group">
					<label for="prenom">Prénom</label>
					<input class="form-control" value="<?= $action->getUser()["firstName"] ?>" type="text" name="prenom" 
						id="prenom">
				</div>

				<div class="form-group">
					<label for="courriel">Courriel</label>
					<input class="form-control" value="<?= $action->getUser()["email"] ?>" type="text" name="courriel" 
						id="courriel">
				</div>

				<div class="form-group">
					<label for="question">Question secrète</label>
					<select class="form-control" name="question" id="question">
						<?php foreach ($action->listeQuestions as $question) { ?>
							<option <?php if( $action->getUser()["questionid"] == $question["questionId"] ){ ?> selected 
								<?php } ?> value="<?= $question["questionId"] ?>"> <?= $question["question"] ?> </option>
						<?php } ?>
					</select>
				</div>

				<div class="form-group">
					<label for="reponse">Réponse secrète</label>
					<input class="form-control" value="<?= $action->getUser()["reponse"] ?>" type="text" name="reponse" 
						id="reponse">
				</div>

				<div class="form-group">
					<label for="mdp">Mot de passe</label>
					<input class="form-control" type="password" name="password" id="mdp">
				</div>

				<div class="form-group">
					<label for="mdpconfirm">Confirmation du mot de passe</label>
					<input class="form-control" type="password" name="passwordConfirm" id="mdpconfirm">
				</div>
		
				<input type="submit" value="Sauvegarder"/ class="btn btn-default">
			</div>
		</form>

<?php

	require_once("partial/footer.php");