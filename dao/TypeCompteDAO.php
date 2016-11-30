<?php
	require_once("bdd.php");

	class TypeCompteDAO {

		public static function lister(){
			
			global $bdd;
			
			$requete = $bdd->prepare('
				SELECT typeCompteId, nom 
				FROM typecompte');
			$requete->execute();

			$listeTypeComptes = array();
			while($ligne = $requete->fetch()){
				
				$listeTypeComptes[] = $ligne;
			}

			return $listeTypeComptes;
		}
	}