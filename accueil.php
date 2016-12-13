<?php 

	require_once("partial/header.php");
	
	require_once("action/AccueilAction.php");
	$action = new AccueilAction();
	$action->execute();

?>

		<h1>Le budgeteur</h1>
		<h2>Bienvenue

		<?php 
			 echo $action->getUser()["firstName"];
		?> 
		! </h2>

		<ul id="nav">
			<li><a href="transactions.php">Transactions</a></li>
			<li><a href="graphiques.php">Graphiques</a></li>
			<li><a href="calendrier.php">Calendrier</a></li>
			<li><a href="modifierCompte.php">Modifier les comptes</a></li>
			<li><a href="modifierProfil.php">Modifier le profil</a></li>
			<li><a href="deconnexion.php">Déconnexion</a></li>
		</ul>

		<div style="width:400px" id="graphiqueAccueil">
			<canvas id="graphique" width="100" height="100"></canvas>
		</div>

		<script>
			CreatePieChart("graphique", <?= $action->graphique_data ?>)
		</script>

<?php

	require_once("partial/footer.php");