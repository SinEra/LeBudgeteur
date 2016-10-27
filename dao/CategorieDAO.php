<?php
	require_once("bdd.php");

	class CategorieDAO {

		/*public static function ajouter($userId,$typeCompte,$montant,$nom){
			global $bdd;
			$requete = $bdd->prepare('INSERT INTO compte(userId, typeCompteId, montant, nom) VALUES(?, ?, ?, ?)');
			$requete->execute(array($userId, $typeCompte, $montant, $nom));
		}*/

		public static function lister(){
			global $bdd;

			$requete = $bdd->prepare('SELECT categorieId, nom FROM categorie');
			$requete->execute();

			$listeCategories = array();
			while($ligne = $requete->fetch()){
				$listeCategories[] = $ligne;
			}

			return $listeCategories;
		}
	}