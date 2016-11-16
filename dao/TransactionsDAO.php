<?php

	require_once("bdd.php");

	class TransactionsDAO {

		public static function ajouter($date,$description,$montant,$categorie,$typepaiement){
			global $bdd;
			$requete = $bdd->prepare('INSERT INTO transaction(date, description, montant, categorieId, compteId, brouillon) 
				VALUES(?, ?, ?, ?, ?, ?)');
			$requete->execute(array($date, $description, $montant, $categorie,$typepaiement, true));
		}

		public static function lister($userId, $brouillon){
			global $bdd;
			$requete = $bdd->prepare('
				SELECT 
					transactionId, 
					date, 
					description, 
					transaction.montant, 
					transaction.categorieId, 
					transaction.compteId, 
					categorie.nom AS categorieNom, 
					compte.nom AS compteNom
				FROM transaction 
				INNER JOIN categorie ON categorie.categorieId = transaction.categorieId 
				INNER JOIN compte ON compte.compteId = transaction.compteId 
				WHERE 
					compte.userId = ? AND
					brouillon = ?');
			
			$requete->execute(array($userId,$brouillon));

			$listeTransactions = array();
			while($ligne = $requete->fetch()){
				$listeTransactions[] = $ligne;
			}

			return $listeTransactions;
		}
	}