<?php 
	require_once("action/CommonAction.php");

	class LoginAction extends CommonAction {

		public $wrongLogin = false;
		public $wasDenied = false;
		public $champVide = false;

		public function __construct() {

			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {

			if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
				if (!empty($_GET["login-error"])) {

					$this->wasDenied = true;
				}

				if (empty($_POST["email"]) || empty($_POST["password"])){
					
					$this->champVide = true;
				}

				if (!empty($_POST["email"]) && !empty($_POST["password"])) {
					
					$userid = UserDAO::login($_POST["email"], $_POST["password"]);

					if ($userid !== false) {

						$_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;
						$_SESSION["userId"] = $userid;

						header("location:accueil.php");
						exit;
					} else {
						$this->wrongLogin = true;
					}
				} 
			}
		}
	}