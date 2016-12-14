<?php 

	require_once("partial/header-login-inscription.php");

	require_once("action/InscriptionInfosAction.php");
	$action = new InscriptionInfosAction();
	$action->execute();

?>

		<h1 class="text-center">Le budgeteur</h1>
		<h2 class="text-center">Inscription </h2>
		

		<form action="inscriptionInfos.php" method="post" onsubmit="return validate()" class="inscriptioninfo panel panel-default">

			<div class="panel-heading"><strong>Vos informations personnelles</strong></div>
			
			<div class="panel-body">

				<!--Message si connexion erronée-->
				<?php if ($action->emailExistant === true){ ?>
					<div class="alert alert-danger" role="alert">Ce courriel est déjà utilisé.</div>
				
				<?php } else if ($action->mdpIncorrect === true){ ?>
					<div class="alert alert-danger" role="alert">Les mots de passe ne sont pas identiques.</div>

				<?php } else if ($action->champVide ===true){ ?>
					<div class="alert alert-danger" role="alert">Veuillez remplir tous les champs s'il vous plaît</div>
				
				<?php } ?>

				<div class="form-group">
					<label for="nom">Nom</label>
					<input class="form-control" placeholder="Nom" type="text" name="nom" id="nom">
				</div>

				<div class="form-group">
					<label for="prenom">Prénom</label>
					<input class="form-control" placeholder="Prénom" type="text" name="prenom" id="prenom">
				</div>

				<div class="form-group">
					<label for="courriel">Courriel</label>
					<input class="form-control" placeholder="Courriel" type="text" name="courriel" id="courriel">
				</div>

				<div class="form-group">
					<label for="questions">Questions secrètes</label>
					<select class="form-control" name="question" id="question">
					<?php foreach ($action->listeQuestions as $question) { ?>
						<option selected value="<?= $question["questionId"] ?>"> <?= $question["question"] ?> </option>
					<?php } ?>
					</select>
				</div>

				<div class="form-group">
					<label for="reponse">Réponse secrète</label>
					<input class="form-control" placeholder="Réponse à la question" type="text" name="reponse" 
						id="reponse">
				</div>				

				<div class="form-group">
					<label for="mdp">Mot de passe</label>
					<input class="form-control" placeholder="Mot de passe" type="password" name="password" id="mdp">
				</div>							
				
				<div class="form-group">
					<label for="mdpConfirm">Confirmation du mot de passe</label>
					<input class="form-control" placeholder="Confirmation du mot de passe" type="password" 
						name="passwordConfirm" id="mdpConfirm">
				</div>
				
				<input type="submit" value="Suivant" class="btn btn-default">
			</div>
		</form>

<?php

	require_once("partial/footer.php");