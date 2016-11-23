<?php

	require_once("bdd.php");

	class TransactionsDAO {

		public static function ajouter($typetransaction,$date,$description,$montant,$categorie,$typepaiement){
			global $bdd;
			$requete = $bdd->prepare('INSERT INTO transaction(typeTransactionId, date, description, montant, categorieId, compteId, brouillon) 
				VALUES(?, ?, ?, ?, ?, ?, ?)');
			$requete->execute(array($typetransaction, $date, $description, $montant, $categorie, $typepaiement, true));
		}

		public static function lister($userId, $brouillon){
			global $bdd;
			
			$requete = $bdd->prepare('
				SELECT 
					transactionId,
					transaction.typeTransactionId,
					date, 
					description, 
					transaction.montant, 
					transaction.categorieId, 
					transaction.compteId, 
					typeTransaction.nom AS typeTransactionNom,
					categorie.nom AS categorieNom, 
					compte.nom AS compteNom
				FROM transaction 
				INNER JOIN typetransaction ON typetransaction.typeTransactionId = transaction.typeTransactionId
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

		public static function enleverBrouillon(){
			global $bdd;
			
			$requete = $bdd->prepare('UPDATE transaction
			SET brouillon = false
			WHERE brouillon = true');	

			$requete->execute();
		}
	}