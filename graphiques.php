<?php 

	require_once("action/GraphiquesAction.php");
	$action = new GraphiquesAction();
	$action->execute();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Graphiques</title>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
	<script src="js/graphiques.js"></script>
</head>
<body>

	<h1>Graphiques</h1>

	<form action="graphiques.php" method="post" onsubmit="return validate()">

		<div>Nombre de graphiques (Maximum: 4)</div>
			<select name="nbGraphiques">
				<option value="1">1</option>	
				<option value="2">2</option>	
				<option value="3">3</option>	
				<option value="4">4</option>	
			</select>

		<div>Date début: </div>
		<div><input type="date" name="datedebut"><div>
		
		<div>Date fin: </div>
		<div><input type="date" name="datefin"><div>

		<input type="submit" value="Afficher" name="afficher"/>
	</form>
	
	<div style="width:400px">
		<canvas id="graphique1" width="100" height="100"></canvas>
	</div>
	<script>
		CreatePieChart("graphique1", <?= $action->graphique1_data ?>)
	</script>
</body>
</html>