<?php

	require_once("bdd.php");

	class CompteDAO {

		public static function ajouter($userId,$typeCompte,$montant,$nom){
			global $bdd;
			$requete = $bdd->prepare('INSERT INTO compte(userId, typeCompteId, montant, nom) VALUES(?, ?, ?, ?)');
			$requete->execute(array($userId, $typeCompte, $montant, $nom));
		}

		public static function lister(){
			global $bdd;
			$requete = $bdd->prepare('SELECT nom, montant FROM compte');
			$requete->execute();

			$listeComptes = array();
			while($ligne = $requete->fetch()){
				$listeComptes[] = $ligne;
			}

			return $listeComptes;
		}
	}