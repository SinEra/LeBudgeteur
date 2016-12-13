<?php 

	require_once("partial/header.php");

	require_once("action/InscriptionInfosAction.php");
	$action = new InscriptionInfosAction();
	$action->execute();

?>

		<h1>Inscription</h1>
		<h2>Vos informations personnelles</h2>


		<form action="inscriptionInfos.php" method="post" onsubmit="return validate()" class="formulaire">

			<div>Nom:</div>
			<div><input type="text" name="nom"></div>

			<div>Prénom:</div>
			<div><input type="text" name="prenom"></div>

			<div>Courriel:</div>
			<div><input type="text" name="courriel"></div>

			<div>Question secrètes:</div>
			<select name="question">
				<?php
					foreach ($action->listeQuestions as $question) {
						?>
							<option selected value="<?= $question["questionId"] ?>"> <?= $question["question"] ?> </option>
						<?php
					}

				?>
			</select>

			<div>Réponse secrète:</div>
			<div><input type="text" name="reponse"></div>			
			
			<div>Mot de passe:</div>
			<div><input type="password" name="password"></div>
			
			<div>Confirmer le mot de passe:</div>
			<div><input type="password" name="passwordConfirm"></div>
			
			<input type="submit" value="Suivant"/ class="bouton">
		</form>

<?php

	require_once("partial/footer.php");