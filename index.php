<?php 

	require_once("action/IndexAction.php");
	$action = new IndexAction();
	$action->execute();

?>


<!DOCTYPE html>
<html>
	<head>
		<title>Le Budgeteur</title>
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
		<a href="logout.php">Déconnexion</a>

	</body>
</html>