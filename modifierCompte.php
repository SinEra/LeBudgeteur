<?php 

	require_once("action/ModifierCompteAction.php");
	$action = new ModifierCompteAction();
	$action->execute();

	require_once("partial/header.php");
?>

		<h2>Profil</h2>
		<h3>Vos comptes</h3>

		<!--Liste des comptes-->
		<div class="col-md-6">
			<table class="table table-hover table-bordered table-striped">
				<thead>
					<tr>
						<th>Type de compte</th>
						<th>Compte</th>
						<th>Montant</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($action->listeComptes as $compte) { ?> 
						<tr>
							<td> 
								<input type="hidden" name="compteId" value="<?= $compte["compteId"] ?>" />
								<select class="input" name="typeCompte" style="display:none;" name="typeCompte">
									<?php foreach ($action->listeTypeComptes as $typeCompte) { ?>
										<option value="<?= $typeCompte["typeCompteId"] ?>"
									<?php if($typeCompte["nom"] == $compte["typeCompte"]) { ?> selected 
									<?php } ?> > <?= $typeCompte["nom"] ?> </option>
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
				</tbody>
			</table>
		</div>
	
		<!-- Ajouter un compte -->
		<div class="col-md-6">
			<form action="modifierCompte.php" method="post" onsubmit="return validate()" 
				class="modifierCompte panel panel-default">

				<div class="panel-heading"><strong>Ajouter un compte</strong></div>
				
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

				</div>
			</form>
		</div>
<?php

	require_once("partial/footer.php");