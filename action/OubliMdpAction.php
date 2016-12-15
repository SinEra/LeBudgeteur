<?php 

	require_once("action/CommonAction.php");
	require_once("dao/UserDAO.php");

	class OubliMdpAction extends CommonAction {

		public $question = "";
		public $error = false;
		public $email = "";

		public function __construct() {

			parent::__construct(CommonAction::$VISIBILITY_PUBLIC);
		}

		protected function executeAction() {

			if(!empty($_POST["reponse"])){
				$ligne = UserDAO::trouverparemail($_POST["email"]);

				if ($ligne && $ligne["reponse"] == $_POST["reponse"]) {

					$_SESSION["visibility"] = CommonAction::$VISIBILITY_MEMBER;
					$_SESSION["userId"] = $ligne["userId"];

					header("location:changermdp.php");
					exit;
				}else{
					$this->question = $ligne["question"];
					$this->email = $_POST["email"];
					$this->error = true;
				}		
			}
			else if (!empty($_POST["email"])) {				

				$ligne = UserDAO::trouverparemail($_POST["email"]);

				if($ligne){
					$this->question = $ligne["question"];
					$this->email = $_POST["email"];

				}else{
					$this->error = true;
				}
			}
		}
	}