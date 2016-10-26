<?php 
	require_once("action/CommonAction.php");

	class LoginAction extends CommonAction {

		public $wrongLogin = false;
		public $wasDenied = false;

		public function __construct() {
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {
			if (!empty($_GET["login-error"])) {
				$this->wasDenied = true;
			}

			if (!empty($_POST["email"])) {
				$userid = UserDAO::login($_POST["email"], $_POST["password"]);

				if ($userid !== false) {

					$_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;
					$_SESSION["userId"] = $userid;

					header("location:index.php");
					exit;
				}
				else {
					$this->wrongLogin = true;
				}
			}
		}


	}