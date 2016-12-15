<?php

	require_once("action/CommonAction.php");
	require_once("dao/UserDAO.php");
	require_once("dao/QuestionDAO.php");

	class InscriptionInfosAction extends CommonAction{

		public $listeQuestions = array();

		public $emailExistant = false;
		public $mdpIncorrect = false;
		public $champVide = false;
		public $emailIncorrect = false;

		public function __construct(){

			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction(){

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				
				if (empty($_POST["nom"]) ||
					empty($_POST["prenom"]) ||
					empty($_POST["courriel"]) ||
					empty($_POST["reponse"]) ||
					empty($_POST["password"]) ||
					empty($_POST["passwordConfirm"])){

					$this->champVide = true;
				}

				if (!empty($_POST["nom"]) &&
					!empty($_POST["prenom"]) &&
					!empty($_POST["courriel"]) &&
					!empty($_POST["reponse"]) &&
					!empty($_POST["password"]) &&
					!empty($_POST["passwordConfirm"])){

					if ($_POST["password"] === $_POST["passwordConfirm"]){

						if(filter_var($_POST["courriel"], FILTER_VALIDATE_EMAIL)) {
							try {
								UserDAO::ajouter($_POST["nom"], 
									$_POST["prenom"], 
									$_POST["courriel"], 
									$_POST["question"], 
									$_POST["reponse"],
									$_POST["password"]);

								header("location:inscriptionComptes.php");
								exit;
							//Si erreur lors de ajouter (Email non unique)
							} catch (Exception $e) {
								$this->emailExistant = true;							
							}
						} else {
							$this->emailIncorrect = true;
						}

					} else {

						$this->mdpIncorrect = true;
					}
				}
			}

			$this->listeQuestions = QuestionDAO::listerQuestions();
		}
	}