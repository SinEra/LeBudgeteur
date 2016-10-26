<?php

	require_once("action/CommonAction.php");
	require_once("bdd.php");

	class Inscription1Action extends CommonAction{

		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction(){
			global $bdd;

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if(!empty($_POST["nom"]) &&
					!empty($_POST["prenom"]) &&
					!empty($_POST["courriel"]) &&
					!empty($_POST["password"]) &&
					!empty($_POST["passwordConfirm"])){
					if($_POST["password"] === $_POST["passwordConfirm"]){

						$requete = $bdd->prepare('INSERT INTO user(lastName, firstName, email, password) VALUES(?, ?, ?, ?)');
						$requete->execute(array($_POST["nom"], $_POST["prenom"], $_POST["courriel"], password_hash($_POST["password"], PASSWORD_BCRYPT)));

						$_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;

						$_SESSION["userId"] = $bdd->lastInsertId();

						header("location:inscription2.php");
						exit;
					}
				}
			}

		}
	}