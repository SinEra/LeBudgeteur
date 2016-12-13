<?php

	require_once("bdd.php");

	class QuestionDAO {

		public static function listerQuestions(){
			
			global $bdd;
			
			$requete = $bdd->prepare('
				SELECT question,
				questionId 
				FROM questions ');
			$requete->execute();

			$listeQuestions = array();
			while($ligne = $requete->fetch()){
				$listeQuestions[] = $ligne;
			}

			return $listeQuestions;
		}
	}
	