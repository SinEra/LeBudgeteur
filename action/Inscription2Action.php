<?php

	require_once("action/CommonAction.php");

	class Inscription2Action extends CommonAction{

		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction(){
			
		}
	}