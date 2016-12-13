<?php 

	require_once("partial/header.php");

	require_once("action/InscriptionComptesAction.php");
	$action = new InscriptionComptesAction();
	$action->execute();

?>

		<h1>Inscription</h1>
		<h2>Vos comptes</h2>
	
		<form action="inscriptionComptes.php" method="post" onsubmit="return validate()" class="formulaire" id="formCompte">
		
			<div>Nom du compte: </div>
			<input type="text" name="nom">
		
			<div>Type de compte:</div>
			<select name="typeCompte">
				<?php
					foreach ($action->listeTypeComptes as $typeCompte) {
						?>
							<option value="<?= $typeCompte["typeCompteId"] ?>"> <?= $typeCompte["nom"] ?> </option>
							<?php } ?>
			</select>

			<div>Montant:</div>
			<div><input type="text" name="montant"></div>

			<input type="submit" value="Ajouter" name="ajouter" class="bouton"/>
			<input type="submit" value="Terminer" name="terminer" class="bouton"/>

		</form>

		<table id="tableCompte">
			<tr>
				<th>Compte</th>
				<th>Montant</th>
			</tr>
			
			<?php foreach($action->listeComptes as $compte) { ?> 
				<tr>
					<td> <?= $compte["nom"] ?> </td>
					<td> <?= $compte["montant"]?> </td> 
				</tr>
			<?php } ?>
		</table>

<?php

	require_once("partial/footer.php");