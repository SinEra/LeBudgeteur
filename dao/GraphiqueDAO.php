<?php
	require_once("bdd.php");

	class GraphiqueDAO {

		public static function listerRevenusDepenses($userId){
			global $bdd;

			$requete = $bdd->prepare('
				SELECT 
					SUM(transaction.montant) AS total, 
					typeTransaction.nom AS typeTransactionNom 
					FROM transaction 
					INNER JOIN typetransaction ON typetransaction.typeTransactionId = transaction.typeTransactionId 
					INNER JOIN compte ON compte.compteId = transaction.compteId 
					WHERE compte.userId = ?
					AND date >= DATE_FORMAT(NOW(),\'%Y-%m-01\')
 					AND date < DATE_FORMAT(NOW(),\'%Y-%m-01\') + INTERVAL 1 MONTH
					GROUP BY typeTransactionNom
					');

			$requete->execute(array($userId));

			$listeRevenusDepenses = array();
			while($ligne = $requete->fetch()){
				$listeRevenusDepenses[] = $ligne;
			}

			return $listeRevenusDepenses;
		}

		public static function listerParCartegorie($userId, $dateDebut, $dateFin){
			global $bdd;

			$requete = $bdd->prepare('
				SELECT 
					categorie.nom AS categorie, 
					SUM(transaction.montant) AS total
				FROM transaction
				INNER JOIN compte ON compte.compteId = transaction.transactionId
				INNER JOIN categorie ON transaction.categorieId = categorie.categorieId
				WHERE compte.userId = ?
				GROUP BY transaction.categorieId
				');
			$requete->execute(array($userId, $dateDebut, $dateFin));
		}
	}