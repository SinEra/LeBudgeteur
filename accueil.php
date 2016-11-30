<?php 

	require_once("partial/header.php");
	
	require_once("action/AccueilAction.php");
	$action = new AccueilAction();
	$action->execute();

?>

		<h1>Bienvenue

		<?php 
			 $action->getUser()["firstName"];
		?> 
		! </h1>

		<nav>
			<a href="transactions.php">Transactions</a>
			<a href="graphiques.php">Graphiques</a>
			<a href="calendrier.php">Calendrier</a>
			<a href="deconnexion.php">Déconnexion</a>
		</nav>

		<div style="width:400px">
			<canvas id="graphique" width="100" height="100"></canvas>
		</div>

		<script>
			CreatePieChart("graphique", <?= $action->graphique_data ?>)
		</script>

<?php

	require_once("partial/footer.php");