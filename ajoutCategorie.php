<?php 

	require_once("partial/header.php");

	require_once("action/AjoutCategorieAction.php");
	$action = new AjoutCategorieAction();
	$action->execute();

?>
		<h2 class="text-center">Nouvelle-catégorie</h2>

		<form action="ajoutCategorie.php" method="post" onsubmit="return validate()" 
			class="ajoutcompte panel panel-default">
		
			<div class="panel-heading"><strong>Ajout d'une catégorie</strong></div>

			<div class="panel-body">
				<div class="form-group">
					<label for="categorie">Nom de la catégorie</label>
					<input class="form-control" placeholder="Nom de la catégorie" type="text" name="categorie" 
						id="categorie">
				</div>
			
				<div class="form-group">
					<label for="categorieparent">Nom de la catégorie parent</label>
					<select class="form-control" name="categoriesParent" id="categorieparent">
						<option value="">Aucune catégorie parent</option>
					<?php foreach ($action->listeCategories as $categorie) { ?>
						<option value="<?= $categorie["categorieId"] ?>"> <?= $categorie["nom"] ?> </option>
					<?php } ?>
					</select>
				</div>
			
				<div class="form-group">
					<label for="souscategorie">Nom de la sous-catégorie</label>
					<input class="form-control" placeholder="Nom de la sous-catégorie" type="text" name="souscategorie" 
						id="souscategorie">
				</div>
			
				<input type="submit" value="Ajouter" name="ajouter" class="btn btn-default"/>
				<input type="submit" value="Retour à la page de transactions" name="retour" class="btn btn-default"/>
			</div>
		</form>

<?php 

	require_once("partial/footer.php");