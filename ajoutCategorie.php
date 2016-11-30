<?php 

	require_once("partial/header.php");

	require_once("action/AjoutCategorieAction.php");
	$action = new AjoutCategorieAction();
	$action->execute();

?>

	<h1>Ajout d'une catégorie</h1>

	<form action="ajoutCategorie.php" method="post" onsubmit="return validate()">
			
			<div>Catégorie: </div>
			<div><input type="text" name="categorie"><div>

			<div>Catégories parent:</div>
			<select name="categoriesParent">
				<option value="">Aucune catégorie parent</option>
				<?php
					foreach ($action->listeCategories as $categorie) {
						?>
							<option value="<?= $categorie["categorieId"] ?>"> <?= $categorie["nom"] ?> </option>
						<?php
					}
				?>
			</select>

			<div>Sous-Categorie: </div>
			<div><input type="text" name="sousCategorie"></div>
			
			<input type="submit" value="Ajouter" name="ajouter"/>
			<input type="submit" value="Retour à la page de transactions" name="retour"/>
		</form>

<?php 

	require_once("partial/footer.php");