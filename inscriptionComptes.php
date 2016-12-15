<?php 

	require_once("partial/header-login-inscription.php");

	require_once("action/InscriptionComptesAction.php");
	$action = new InscriptionComptesAction();
	$action->execute();

?>

		<h1 class="text-center">Le budgeteur</h1>
		<h2 class="text-center">Inscription</h2>

		<!--Positionner selon grid-->	
		<div class="col-md-5">

			<form action="inscriptionComptes.php" method="post" onsubmit="return validate()" 
				class="inscriptioncompte panel panel-default">
			
				<div class="panel-heading"><strong>Informations du compte</strong></div>
				
				<div class="panel-body">
					<div class="form-group">
						<label for="nom">Nom du compte</label>
						<input class="form-control" placeholder="Nom du compte" type="text" name="nom" id="nom">
					</div>
					
					<div class="form-group">
						<label for="type">Type de compte</label>
						<select name="typeCompte" id="type">
						<?php foreach ($action->listeTypeComptes as $typeCompte) { ?>
							<option value="<?= $typeCompte["typeCompteId"] ?>"> <?= $typeCompte["nom"] ?> </option>
						<?php } ?>
						</select>	
					</div>
				
					<div class="form-group">
						<label for="montant">Montant</label>
						<input class="form-control" placeholder="Montant" type="text" name="montant" id="montant">
					</div>

					<input type="submit" value="Ajouter" name="ajouter" class="btn btn-default"/>
					<input type="submit" value="Terminer" name="terminer" class="btn btn-default"/>
				</div>
			</form>
		</div>

		<!--Positionner selon le grid-->
		<div class="col-md-5 col-md-offset-2">
			
			<table class="table table-hover table-striped">
				<tr>
					<th>Type</th>
					<th>Compte</th>
					<th>Montant</th>
				</tr>
				
				<?php foreach($action->listeComptes as $compte) { ?> 
					<tr>
						<td> <?= $compte["typeCompte"] ?> </td>
						<td> <?= $compte["nom"] ?> </td>
						<td class="text-right"> <?= $compte["montant"]?>$ </td> 
					</tr>
				<?php } ?>
			</table>
		</div>
<?php

	require_once("partial/footer.php");