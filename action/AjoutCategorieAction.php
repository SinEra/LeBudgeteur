<?php

	require_once("action/CommonAction.php");
	require_once("dao/CategorieDAO.php");

	class AjoutCategorieAction extends CommonAction{

		public function __construct(){

			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction(){

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {

				if(!empty($_POST["ajouter"])) {

					if(!empty($_POST["categorie"])) {

						$categoriesParent = $_POST["categoriesParent"];
						if (empty($categoriesParent)) {

							$categoriesParent = null;
						}

						CategorieDAO::ajouterCat($_POST["categorie"], 
							$this->getUser()["userId"], 
							$categoriesParent);
					}
				}

				if(!empty($_POST["retour"])){
					
					header("location:transactions.php");
					exit;
				}
			}

			$this->listeCategories = CategorieDAO::lister($this->getUser()["userId"]);
		}
	}