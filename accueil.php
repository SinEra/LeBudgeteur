<?php 

	require_once("partial/header.php");
	
	require_once("action/AccueilAction.php");
	$action = new AccueilAction();
	$action->execute();

?>

		<div style="width:400px" id="graphiqueAccueil">
			<canvas id="graphique" width="100" height="100"></canvas>
		</div>

		<script>
			CreatePieChart("graphique", <?= $action->graphique_data ?>)
		</script>

<?php

	require_once("partial/footer.php");