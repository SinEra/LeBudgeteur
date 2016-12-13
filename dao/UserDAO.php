<?php

	require_once("bdd.php");

	class UserDAO {

		public static function login($email, $password){
			
			global $bdd;
			
			$requete = $bdd->prepare('
				SELECT userId, password 
				FROM user 
				WHERE email = ?');
			$requete->execute(array($email));

			$ligne = $requete->fetch();

			if($ligne){
				if(password_verify($password, $ligne['password'])){
					return $ligne['userId'];
				}
			}
			return false;
		}

		public static function trouver($id){
			global $bdd;
			$requete = $bdd->prepare('
				SELECT * 
				FROM user 
				WHERE userId = ?');
			$requete->execute(array($id));

			$ligne = $requete->fetch();
			return $ligne;
		}

		public static function ajouter($nom, $prenom, $courriel, $question, $reponse, $password){
			global $bdd;

			$requete = $bdd->prepare('
				INSERT INTO user(lastName, firstName, email, questionid, reponse, password) 
				VALUES(?, ?, ?, ?, ?, ?)');
			$requete->execute(array($nom, $prenom, $courriel, $question, $reponse, password_hash($password, PASSWORD_BCRYPT)));

			$_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;

			$_SESSION["userId"] = $bdd->lastInsertId();
		}

		public static function trouverparemail($courriel){
			global $bdd;
			
			$requete = $bdd->prepare('
				SELECT questions.question,
				user.reponse,
				user.userId
				FROM user
				LEFT JOIN questions ON questions.questionid = user.questionid
				WHERE email = ?');
			$requete->execute(array($courriel));

	
			$ligne = $requete->fetch();
			return $ligne;	
		}

		public static function changermdp($userid, $mdp){
			global $bdd;
			
			$requete = $bdd->prepare('
				UPDATE user
				SET password = ?
				WHERE userid = ?');
			$requete->execute(array(password_hash($mdp, PASSWORD_BCRYPT), $userid));
		}

		public static function updateUser($userid, $nom, $prenom, $courriel, $question, $reponse){
			global $bdd;
			
			$requete = $bdd->prepare('
				UPDATE user
				SET lastName = ? ,
				firstName = ? ,
				 email = ? , 
				 questionid = ? , 
				 reponse = ?
				WHERE userid = ?');
			$requete->execute(array($nom, $prenom, $courriel, $question, $reponse, $userid));
		}		

	}