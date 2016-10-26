<?php

	require_once("bdd.php");

	class UserDAO {

		public static function login($email, $password){
			global $bdd;
			$requete = $bdd->prepare('SELECT userId, password FROM user WHERE email = ?');
			$requete->execute(array($email));

			$ligne = $requete->fetch();

			if($ligne){
				if(password_verify($password, $ligne['password'])){
					echo 132;
					return $ligne['userId'];
				}
			}
			return false;
		}

		public static function trouver($id){
			global $bdd;
			$requete = $bdd->prepare('SELECT * FROM user WHERE userId = ?');
			$requete->execute(array($id));

			$ligne = $requete->fetch();
			return $ligne;
		}

	}

