<?php

	require_once("action/CommonAction.php");

	class DeconnexionAction extends CommonAction{

		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction(){
			session_destroy();

			header("location:login.php");
		}
	}