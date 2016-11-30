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

		public static function ajouter($nom, $prenom, $courriel, $password){
			global $bdd;

			$requete = $bdd->prepare('
				INSERT INTO user(lastName, firstName, email, password) 
				VALUES(?, ?, ?, ?)');
			$requete->execute(array($_POST["nom"], $_POST["prenom"], $_POST["courriel"], password_hash($_POST["password"], PASSWORD_BCRYPT)));

			$_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;

			$_SESSION["userId"] = $bdd->lastInsertId();
		}
	}