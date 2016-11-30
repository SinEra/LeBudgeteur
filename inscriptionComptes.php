<?php 

	require_once("partial/header.php");

	require_once("action/InscriptionComptesAction.php");
	$action = new InscriptionComptesAction();
	$action->execute();

?>

		<h1>Inscription</h1>
		<h2>Vos comptes</h2>
	
		<div class="center">
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

				<input type="submit" value="Ajouter" name="ajouter"/>
				<input type="submit" value="Terminer" name="terminer"/>

			</form>

			<table>
				<tr>
					<td>Compte</td>
					<td>Montant</td>
				</tr>
				
				<?php foreach($action->listeComptes as $compte) { ?> 
					<tr>
						<td> <?= $compte["nom"] ?> </td>
						<td> <?= $compte["montant"]?> </td> 
					</tr>
				<?php } ?>
			</table>
		</div>

<?php

	require_once("partial/footer.php");