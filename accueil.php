<?php 

	require_once("action/AccueilAction.php");
	$action = new AccueilAction();
	$action->execute();

	require_once("partial/header.php");
?>

	<div class="col-md-6 col-md-offset-3" style="margin-top:20px;">
		<div class="panel panel-default">
			<div class="panel-heading">
				Graphique
			</div>
			<div class="panel-body">
				<canvas id="graphique" width="100" height="100"></canvas>
			</div>
		</div>
	</div>

		<script>
			CreatePieChart("graphique", <?= $action->graphique_data ?>)
		</script>

<?php

	require_once("partial/footer.php");