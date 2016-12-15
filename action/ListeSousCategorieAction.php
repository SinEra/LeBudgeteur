<?php

	require_once("action/CommonAction.php");
	require_once("dao/CategorieDAO.php");

	class ListeSousCategorieAction extends CommonAction{

		public function __construct(){

			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction(){
			$this->listeSousCategorie = 
				CategorieDAO::listerSousCategorie($this->getUser()["userId"], $_GET["categorieId"]);
		}
	}