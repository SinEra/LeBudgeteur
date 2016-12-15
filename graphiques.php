<?php 
	require_once("action/GraphiquesAction.php");
	$action = new GraphiquesAction();
	$action->execute();

	$grapheCompte = count($action->graphique_data);
	if ($grapheCompte==0) {
		$grapheCompte = 1;
	}

	require_once("partial/header.php");	

?>

		<h2 class="text-center">Graphiques</h2>

		<form action="graphiques.php" method="post" onsubmit="return validate()" 
			class="graphiqueform panel panel-default">

			<div class="panel-body">
				<div class="form-group">
					<label for="nbGraphiques">Nombre de graphique (Maximum: 4)</label>
					<select id="nbGraphiques" name="nbGraphiques">
						<option value="1" <?php if($grapheCompte==1){echo 'selected';}?> >1</option>	
						<option value="2" <?php if($grapheCompte==2){echo 'selected';}?>>2</option>	
						<option value="3" <?php if($grapheCompte==3){echo 'selected';}?>>3</option>	
						<option value="4" <?php if($grapheCompte==4){echo 'selected';}?>>4</option>	
					</select>
					<input type="submit" value="afficher" name="afficher" class="btn btn-default" style="margin-left:20px;"/>
				</div>


				<div class="date form-group col-md-3">
					<h4>Graphique 1</h4>
					<label for="datedebut1">Date début</label>
					<input class="form-inline" type="date" name="datedebut1" value="<?=$action->datedebut1?>" 
						id="datedebut1">

					<label for="datefin1">Date fin</label>
					<input class="form-inline" type="date" name="datefin1" value="<?=$action->datefin1?>" 
						id="datefin1">
				</div>

				<div class="date form-group col-md-3">
					<h4>Graphique 2</h4>
					<label for="datedebut2">Date début</label>
					<input class="form-inline" type="date" name="datedebut2" value="<?=$action->datedebut2?>" 
						id="datedebut2">

					<label for="datefin2">Date fin</label>
					<input class="form-inline" type="date" name="datefin2" value="<?=$action->datefin2?>" 
						id="datefin2">
				</div>

				<div class="date form-group col-md-3">
					<h4>Graphique 3</h4>
					<label for="datedebut3">Date début</label>
					<input class="form-inline" type="date" name="datedebut3" value="<?=$action->datedebut3?>" 
						id="datedebut3">

					<label for="datefin3">Date fin</label>
					<input class="form-inline" type="date" name="datefin3" value="<?=$action->datefin3?>" 
						id="datefin3">
				</div>

				<div class="date form-group col-md-3">
					<h4>Graphique 4</h4>
					<label for="datedebut4">Date début</label>
					<input class="form-inline" type="date" name="datedebut4" value="<?=$action->datedebut4?>" 
						id="datedebut4">

					<label for="datefin4">Date fin</label>
					<input class="form-inline" type="date" name="datefin4" value="<?=$action->datefin4?>" 
						id="datefin4">
				</div>
			</div>

		</form>
	
		<!--$i va être l'index de chaque élément-->
		<?php foreach ($action->graphique_data as $i => $data){ ?>

			<div class="col-md-6">
				<div class="panel panel-default">
					<div class="panel-heading">
						Graphique <?= $i+1 ?>
					</div>
					<div class="panel-body">
						<canvas id="graphique<?= $i ?>" width="100" height="100"></canvas>
					</div>
				</div>
			</div>
			<script>
				CreatePieChart("graphique<?= $i ?>", <?= $data ?>)
			</script>

		<?php } ?>

		<!--Math.max, le plus grand entre 1 et le count
		Si on arrive pour la premiere fois, graphique_data sera vide donc le count est à zero mais on veut quand même un form
		Si ya 2 graphiques, on prend le max entre 1 et 2 et on fait apparaitre les 2 forms-->
		<script>
			afficherGraphiques(<?= $grapheCompte ?>)
		</script>

<?php 

	require_once("partial/footer.php");	