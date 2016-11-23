<?php 

	require_once("action/IndexAction.php");
	$action = new IndexAction();
	$action->execute();

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Le Budgeteur</title>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
		<script src="js/graphiques.js"></script>
	</head>
	<body>
		<h1>Bienvenue

		<?php 
			echo $action->getUser()["firstName"];
		?> 
		! </h1>

		<a href="transactions.php">Transactions</a>
		<a href="graphiques.php">Graphiques</a>
		<a href="calendrier.php">Calendrier</a>
		<a href="deconnexion.php">Déconnexion</a>

		<div style="width:400px">
			<canvas id="graphique" width="100" height="100"></canvas>
		</div>
		<script>
			CreatePieChart("graphique", <?= $action->graphique1_data ?>)
		</script>
	</body>
</html>