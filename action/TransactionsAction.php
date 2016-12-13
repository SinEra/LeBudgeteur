<?php

	require_once("action/CommonAction.php");
	require_once("dao/CategorieDAO.php");
	require_once("dao/CompteDAO.php");
	require_once("dao/TransactionsDAO.php");

	class TransactionsAction extends CommonAction{

		public $listeTransactions = array();
		public $listeCategories = array();
		public $listeComptes = array();

		public function __construct(){

			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction(){

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {

				if(!empty($_POST["ajouterCategorie"])){

					header("location:ajoutCategorie.php");
					exit;
				}

				if(!empty($_POST["ajouter"])) {

					if(!empty($_POST["date"]) && 
						!empty($_POST["description"]) &&
						!empty($_POST["montant"]) &&
						!empty($_POST["categories"]) &&
						!empty($_POST["typePaiement"])) {

						TransactionsDAO::ajouter($_POST["typeTransaction"], 
							$_POST["date"], 
							$_POST["description"], 
							$_POST["montant"], 
							$_POST["categories"], 
							$_POST["typePaiement"]);
					}
				}

				if(!empty($_POST["terminer"])){

					TransactionsDAO::enleverBrouillon();
					header("location:accueil.php");
					exit;
				}
			}
			
			$this->listeTransactions = TransactionsDAO::lister($this->getUser()["userId"], true);
			print_r( $this->listeTransactions);
			$this->listeCategories = CategorieDAO::lister($this->getUser()["userId"]);
			$this->listeComptes = CompteDAO::lister($this->getUser()["userId"]);
		}
	}