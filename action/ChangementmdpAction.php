<?php 
	require_once("action/CommonAction.php");

	class ChangementmdpAction extends CommonAction {

		public $error = false;

		public function __construct() {

			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {

			if(!empty($_POST["password"]) &&
				!empty($_POST["passwordConfirm"])){

					if($_POST["password"] === $_POST["passwordConfirm"]){

						UserDAO::changermdp($this->getUser()["userId"], $_POST["password"]);

						header("location:accueil.php");
						exit;
					}
				}
		}
	}