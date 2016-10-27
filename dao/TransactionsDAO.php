<?php

	require_once("bdd.php");

	class TransactionsDAO {

		public static function ajouter($date,$description,$montant,$categorie,$typepaiement){
			global $bdd;
			$requete = $bdd->prepare('INSERT INTO transaction(date, description, montant, categorieId, compteId, brouillon) 
				VALUES(?, ?, ?, ?, ?, ?)');
			$requete->execute(array($date, $description, $montant, $categorie,$typepaiement, false));
		}

		public static function lister(){
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
				WHERE brouillon = false');
			$requete->execute();

			$listeTransactions = array();
			while($ligne = $requete->fetch()){
				$listeTransactions[] = $ligne;
			}

			return $listeTransactions;
		}
	}