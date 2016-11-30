<?php
	require_once("bdd.php");

	class CategorieDAO {

		public static function lister($userId){
			
			global $bdd;

			$requete = $bdd->prepare('
				SELECT categorieId, nom 
				FROM categorie 
				WHERE (userId IS NULL OR userId = ?) 
				AND categorieParentId IS NULL');
			$requete->execute(array($userId));

			$listeCategories = array();
			while($ligne = $requete->fetch()){
				
				$listeCategories[] = $ligne;
			}

			return $listeCategories;
		}

		public static function ajouterCat($nom, $userId, $parent){
			
			global $bdd;

			$requete = $bdd->prepare('
				INSERT INTO categorie(nom, userId, categorieParentId) 
				VALUES (?,?,?)');
			$requete->execute(array($nom, $userId, $parent));
		}
	}