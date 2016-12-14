<?php 

	require_once("partial/header.php");

	require_once("action/ModifierCompteAction.php");
	$action = new ModifierCompteAction();
	$action->execute();

?>

		<h1>Profil</h1>
		<h2>Vos comptes</h2>

		<!--Liste des comptes-->

		<table id="listeCompte">
			<tr>
				<th>Type de compte</th>
				<th>Compte</th>
				<th>Montant</th>
				<th></th>
			</tr>
			
			<?php foreach($action->listeComptes as $compte) { ?> 
				<tr>
					<td> 
						<input type="hidden" name="compteId" value="<?= $compte["compteId"] ?>" />
						<select class="input" name="typeCompte" style="display:none;" name="typeCompte">
							<?php foreach ($action->listeTypeComptes as $typeCompte) { ?>
								<option 
									value="<?= $typeCompte["typeCompteId"] ?>"
									<?php if($typeCompte["nom"] == $compte["typeCompte"]) { ?> selected <?php } ?>
									> <?= $typeCompte["nom"] ?> </option>
							<?php } ?>
						</select>
						<div class="value value-typeCompte">
							<?= $compte["typeCompte"]?>
						</div> 
					</td>
					<td> 
						<div class="value value-nom"> <?= $compte["nom"] ?> </div>
						<input class="input" type="text" name="nom" style="display:none;" value="<?= $compte["nom"] ?>"> 
					</td>
					<td> 
						<div class="value value-montant"> <?= $compte["montant"]?> </div>
						<input class="input" type="text" name="montant" style="display:none;" value="<?= $compte["montant"]?>">
					</td>
					<td>
						<a class="input sauvegarder-compte" style="display:none;" href="#">[Sauvegarder]</a> 
						<a class="value modifier-compte" href="#">[Modifier]</a> 
					</td> 
				</tr>
			<?php } ?>
		</table>
	
		<!-- Ajouter un compte -->

		<form action="modifierCompte.php" method="post" onsubmit="return validate()" class="formulaire" id="formAjoutCompte">
		
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

		</form>

<?php

	require_once("partial/footer.php");