<?php

	require_once("action/CommonAction.php");
	require_once("dao/CompteDAO.php");
	require_once("dao/TypeCompteDAO.php");

	class ModifierCompteAction extends CommonAction{

		public $listeComptes = array();
		public $listeTypeComptes = array();

		public function __construct(){

			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction(){
			global $bdd;

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {

				if (!empty($_POST["ajouter"])) {

					if (!empty($_POST["nom"]) && 
					
						!empty($_POST["montant"])) {

						CompteDAO::ajouter(
							$this->getUser()["userId"], 
							$_POST["typeCompte"], 
							$_POST["montant"], 
							$_POST["nom"]);
					}
				} else if (!empty($_POST["Modifier"])){
					
					header("location:accueil.php?=" . $_POST("typePaiement"));
					exit;
				}

				if(!empty($_POST["retour"])){

					header("location:accueil.php");
					exit;
				}
			}

			$this->listeComptes = CompteDAO::lister($this->getUser()["userId"]);
			$this->listeTypeComptes = TypeCompteDAO::lister();
		}
	}