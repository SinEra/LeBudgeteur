<?php 

	require_once("action/TransactionsAction.php");
	$action = new TransactionsAction();
	$action->execute();

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Transactions</title>
	</head>
	<body>
		<h1>Transactions</h1>
		<form action="transactions.php" method="post" onsubmit="return validate()">
			<div>Date: </div>
			<div><input type="date" name="date"><div>

			<div>Description: </div>
			<div><input type="text" name="description" id="description"></div>

			<div>Montant: </div>
			<div><input type="text" name="montant" id="montant"></div>

			<div>Catégories:</div>
			<select name="categories">
				<?php
					foreach ($action->listeCategories as $categorie) {
						?>
							<option value="<?= $categorie["categorieId"] ?>"> <?= $categorie["nom"] ?> </option>
						<?php
					}

				?>
			</select>

			<!-- Sous-Categorie -->

			<div>Type de paiement:</div>
			<select name="typePaiement">
				<?php
					foreach ($action->listeComptes as $compte) {
						?>
							<option value="<?= $compte["compteId"] ?>"> <?= $compte["nom"] ?> </option>
						<?php
					}

				?>		
			</select>

			<input type="submit" value="Ajouter" name="ajouter"/>
			<input type="submit" value="Terminer" name="terminer"/>
		</form>
		<table>
			<tr>
				<td>Date</td>
				<td>Description</td>
				<td>Categorie</td>
				<td>Sous-Categorie</td>
				<td>Type de paiement</td>
				<td>Montant</td>
			</tr>

			<?php foreach($action->listeTransactions as $transaction) { ?> 
				<tr>
					<td> <?= $transaction["date"] ?> </td>
					<td> <?= $transaction["description"]?> </td> 
					<td> <?= $transaction["categorieNom"]?> </td>
					<td> Sous-Categorie </td>  
					<td> <?= $transaction["compteNom"]?> </td> 
					<td> <?= $transaction["montant"]?> </td> 
				</tr>
			<?php } ?>
		</table>


	</body>
</html>