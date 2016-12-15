<?php 

	require_once("partial/header.php");

	require_once("action/TransactionsAction.php");
	$action = new TransactionsAction();
	$action->execute();

?>
		<h2 class="text-center">Transactions</h2>

		<div class="col-md-3">
			<form action="transactions.php" method="post" onsubmit="return validate()" 
				class="formtrans login panel panel-default">
				
				<div class="panel-heading"><strong>Ajouter une transaction</strong></div>

				<div class="panel-body">

					<div class="form-group">
						<label for="type">Type de transaction</label>
						<select class="form-control" name="typeTransaction" id="type">
							<option value="1" selected>Dépense</option>
							<option value="2">Revenu</option>
						</select>
					</div>
					
					<div class="form-group">
						<label for="date">Date</label>
						<input class="form-control" placeholder="" type="date" name="date" id="date">
					</div>

					<div class="form-group">
						<label for="desc">Description</label>
						<input class="form-control" placeholder="Description" type="text" name="description" id="desc">
					</div>

					<div class="form-group">
						<label for="montant">Montant</label>
						<input class="form-control" placeholder="Montant" type="text" name="montant" id="montant">
					</div>

					<div class="form-group">
						<label for="categorie">Catégorie</label> 
						<input type="submit" value="Ajouter une catégorie" name="ajouterCategorie" 
						class="btn btn-default btn-xs"/>
						<select class="form-control" name="categories" id="categorie">
						<?php foreach ($action->listeCategories as $categorie) { ?>
							<option value="<?= $categorie["categorieId"] ?>"> <?= $categorie["nom"] ?> </option>
						<?php } ?>
						</select>
					</div> 

					<div class="form-group">
						<label for="souscategorie">Sous-catégorie</label>
						<select class="form-control" name="souscategories" id="souscategorie">
						<?php foreach ($action->listeCategories as $categorie) { ?>
							<option value="<?= $categorie["categorieId"] ?>"> <?= $categorie["nom"] ?> </option>
						<?php } ?>
						</select>
					</div>

					<div class="form-group">
						<label for="typePaiement">Type de paiement</label>
						<select class="form-control" name="typePaiement" id="souscategorie">
						<?php foreach ($action->listeComptes as $compte) { ?>
							<option value="<?= $compte["compteId"] ?>"> <?= $compte["nom"] ?> </option>
						<?php } ?>		
						</select>
					</div>
					
					<input type="submit" value="Ajouter" name="ajouter" class="btn btn-default"/>
					<input type="submit" value="Terminer" name="terminer" class="btn btn-default"/>
				</div>
			</form>
		</div>

		<div class="col-md-9">
			<table class="tabletrans table table-hover table-striped">
				<tr>
					<th>Type de transaction</th>
					<th>Date</th>
					<th>Description</th>
					<th>Categorie</th>
					<th>Sous-Categorie</th>
					<th>Type de paiement</th>
					<th>Montant</th>
				</tr>

				<?php foreach($action->listeTransactions as $transaction) { ?> 
					<tr>
						<td> <?= $transaction["typeTransactionNom"] ?> </td>
						<td> <?= $transaction["date"] ?> </td>
						<td> <?= $transaction["description"]?> </td> 
						<td> <?= $transaction["categorieNom"]?> </td>
						<td> Sous-Categorie </td>  
						<td> <?= $transaction["compteNom"]?> </td> 
						<td class="text-right"> <?= $transaction["montant"]?> $</td> 
					</tr>
				<?php } ?>
			</table>
		</div>

<?php

	require_once("partial/footer.php");