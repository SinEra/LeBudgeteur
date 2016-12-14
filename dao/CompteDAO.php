<?php

	require_once("bdd.php");

	class CompteDAO {

		public static function ajouter($userId,$typeCompte,$montant,$nom){
			
			global $bdd;
			
			$requete = $bdd->prepare('
				INSERT INTO compte(userId, typeCompteId, montant, nom) 
				VALUES(?, ?, ?, ?)');
			$requete->execute(array($userId, $typeCompte, $montant, $nom));
		}

		public static function lister($userId){
			
			global $bdd;
			
			$requete = $bdd->prepare('
				SELECT compte.compteId, compte.nom, compte.montant, typecompte.nom AS typeCompte 

				FROM compte 
				INNER JOIN typecompte ON compte.typeCompteId = typecompte.typeCompteId
				WHERE userId = ?');
			$requete->execute(array($userId));

			$listeComptes = array();
			while($ligne = $requete->fetch()){
				$listeComptes[] = $ligne;
			}

			return $listeComptes;
		}

		public static function update($compteId,$typeCompte,$montant,$nom){

			global $bdd;
			
			$requete = $bdd->prepare('
				UPDATE compte
				SET typeCompteId = ?,
					montant = ?, 
					nom = ?
				WHERE compteId = ?');
			$requete->execute(array($typeCompte, $montant, $nom, $compteId));	
		}
	}