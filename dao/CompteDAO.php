<?php

	require_once("bdd.php");

	class CompteDAO {

		public static function ajouter($userId,$typeCompte,$montant,$nom){
			global $bdd;
			$requete = $bdd->prepare('INSERT INTO compte(userId, typeCompteId, montant, nom) VALUES(?, ?, ?, ?)');
			$requete->execute(array($userId, $typeCompte, $montant, $nom));
		}

		public static function lister($userId){
			global $bdd;
			$requete = $bdd->prepare('SELECT compteId, nom, montant FROM compte WHERE userId = ?');
			$requete->execute(array($userId));

			$listeComptes = array();
			while($ligne = $requete->fetch()){
				$listeComptes[] = $ligne;
			}

			return $listeComptes;
		}
	}