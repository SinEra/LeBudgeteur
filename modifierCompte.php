<?php 

	require_once("partial/header.php");

	require_once("action/ProfilAction.php");
	$action = new ProfilAction();
	$action->execute();

?>

		<h1>Profil</h1>
		<h2>Vos comptes</h2>
	
		<!-- Ajouter un compte -->

		<form action="profilComptes.php" method="post" onsubmit="return validate()" class="formulaire" id="formAjoutCompte">
		
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

		<!-- Modifier un compte -->

			<select name="typePaiement">
				<?php
					foreach ($action->listeComptes as $compte) {
						?>
							<option value="<?= $compte["compteId"] ?>"> <?= $compte["nom"] ?> </option>
						<?php } ?>		
			</select>

			<input type="submit" value="Modifier" name="modifier" class="bouton"/>
			<input type="submit" value="Retour" name="retour" class="bouton"/>

		<!--Liste des comptes-->



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


	$(document).ready(function animation(){
                 
  $('#form_create').hide();
                     
  $('#hidding').toggle(
    function show(){
      $('#form_create').slideDown("slow");
    },
    function hide(){
      $('#form_create').slideUp("normal");
    }
  );
                 
})