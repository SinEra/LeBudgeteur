<?php 

	require_once("partial/header.php");

	require_once("action/ModifierProfilAction.php");
	$action = new ModifierProfilAction();
	$action->execute();

?>

		<h1>Modification de profil</h1>

		<form action="modifierProfil.php" method="post" onsubmit="return validate()" class="formulaire">

			<div>Nom:</div>
			<div><input type="text" name="nom" value="<?= $action->getUser()["lastName"] ?>"></div>

			<div>Prénom:</div>
			<div><input type="text" name="prenom" value="<?= $action->getUser()["firstName"] ?>"></div>

			<div>Courriel:</div>
			<div><input type="text" name="courriel" value="<?= $action->getUser()["email"] ?>"></div>

			<div>Question secrètes:</div>
			<select name="question">
				<?php
					foreach ($action->listeQuestions as $question) {
						?>
							<option <?php if( $action->getUser()["questionid"] == $question["questionId"] ){ ?> selected <?php } ?> value="<?= $question["questionId"] ?>"> <?= $question["question"] ?> </option>
						<?php
					}

				?>
			</select>

			<div>Réponse secrète:</div>
			<div><input type="text" name="reponse" value="<?= $action->getUser()["reponse"] ?>"></div>			
			
			<div>Mot de passe:</div>
			<div><input type="password" name="password"></div>
			
			<div>Confirmer le mot de passe:</div>
			<div><input type="password" name="passwordConfirm"></div>
			
			<input type="submit" value="Sauvegarder"/ class="bouton">
		</form>

<?php

	require_once("partial/footer.php");