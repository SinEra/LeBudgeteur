<?php

	require_once("action/CommonAction.php");
	require_once("dao/CompteDAO.php");

	class SauvegarderCompteAction extends CommonAction{

		public function __construct(){

			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction(){
			
			CompteDAO::update($_POST["compteId"],$_POST["typeCompte"],$_POST["montant"], $_POST["nom"]);
		}
	}