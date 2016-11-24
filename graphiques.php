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
	<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script src="js/graphiques.js"></script>
</head>
<body>

	<h1>Graphiques</h1>

	<form action="graphiques.php" method="post" onsubmit="return validate()">

		<div>Nombre de graphiques (Maximum: 4)</div>
			<select id="nbGraphiques" name="nbGraphiques">
				<option value="1" selected>1</option>	
				<option value="2">2</option>	
				<option value="3">3</option>	
				<option value="4">4</option>	
			</select>

	<div class="date" >
		<h2>Graphique 1 </h2>
		<div>Date début: </div>
		<div><input type="date" name="datedebut1" value="<?=$action->datedebut1?>"></div>
		
		<div>Date fin: </div>
		<div><input type="date" name="datefin1" value="<?=$action->datefin1?>"></div>
	</div>

	<div class="date" >
		<h2>Graphique 2 </h2>
		<div>Date début: </div>
		<div><input type="date" name="datedebut2" value="<?=$action->datedebut2?>"></div>
		
		<div>Date fin: </div>
		<div><input type="date" name="datefin2" value="<?=$action->datefin2?>"></div>
	</div>

	<div class="date" >
		<h2>Graphique 3 </h2>
		<div>Date début: </div>
		<div><input type="date" name="datedebut3" value="<?=$action->datedebut3?>"></div>
		
		<div>Date fin: </div>
		<div><input type="date" name="datefin3" value="<?=$action->datefin3?>"></div>
	</div>

	<div class="date" >
		<h2>Graphique 4 </h2>
		<div>Date début: </div>
		<div><input type="date" name="datedebut4" value="<?=$action->datedebut4?>"></div>
		
		<div>Date fin: </div>
		<div><input type="date" name="datefin4" value="<?=$action->datefin4?>"></div>
	</div>
		<input type="submit" value="afficher" name="afficher"/>
	</form>
	
	<?php 
		//$i va être l'index de chaque élément
		foreach ($action->graphique_data as $i => $data){
	?>

	<div style="width:400px">
		<canvas id="graphique<?= $i ?>" width="100" height="100"></canvas>
	</div>
	<script>
	
		CreatePieChart("graphique<?= $i ?>", <?= $data ?>)
	
	</script>

	<?php 
		}
	?>

	<script>
	//Math.max, le plus grand entre 1 et le count
	//Si on arrive pour la premiere fois, graphique_data sera vide donc le count est à zero mais on veut quand même un form
	//Si ya 2 graphiques, on prend le max entre 1 et 2 et on fait apparaitre les 2 forms
		afficherGraphiques(Math.max(1, <?= count($action->graphique_data) ?>));
	</script>

</body>
</html>