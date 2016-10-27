<?php

	require_once("action/CommonAction.php");
	require_once("dao/TypeCompteDAO.php");
	require_once("dao/CompteDAO.php");

	class Inscription2Action extends CommonAction{

		public $listeTypeComptes = array();
		public $listeComptes = array();

		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction(){
			global $bdd;

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
				if(!empty($_POST["ajouter"])) {
					if(!empty($_POST["nom"]) && !empty($_POST["montant"])) {
						CompteDAO::ajouter($this->getUser()["userId"], $_POST["typeCompte"], $_POST["montant"], $_POST["nom"]);
					}
				}

				if(!empty($_POST["terminer"])){
					header("location:index.php");
					exit;
				}
			}

			$this->listeTypeComptes = TypeCompteDAO::lister();
			$this->listeComptes = CompteDAO::lister();
		}
	}