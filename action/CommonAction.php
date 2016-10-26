<?php

	require_once("dao/UserDAO.php");

	session_start();

	abstract class CommonAction{
		public static $VISIBILITY_PUBLIC = 0;
		public static $VISIBILITY_MEMBER = 1;

		private $pageVisibility;
		private $user = null;

		public function __construct($pageVisibility){
			$this->pageVisibility = $pageVisibility;
		}

		public final function execute() {

			if (empty($_SESSION["visibility"])) {
				$_SESSION["visibility"] = CommonAction::$VISIBILITY_PUBLIC;
			}

			if ($_SESSION["visibility"] < $this->pageVisibility) {
				header("location:login.php?login-error=true");
				exit;
			}

			$this->executeAction();
		}

		public function isLoggedIn() {
			return $_SESSION["visibility"] > CommonAction::$VISIBILITY_PUBLIC;
		}

		public function getUser() {

			if(empty($_SESSION["userId"])){

				return null;
			}

			if($this->user !== null){
				return $this->user;
			}

			$this->user = UserDAO::trouver($_SESSION["userId"]);
			return $this->user;
		}

		// Design pattern : Template method
		protected abstract function executeAction();
	}
	