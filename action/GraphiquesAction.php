<?php

	require_once("action/CommonAction.php");
	require_once("dao/GraphiqueDAO.php");

	class GraphiquesAction extends CommonAction{

		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction(){
			$dates = array();
			$this->graphique_data = array();

			//$this->datedebut1 = date("Y-m-d");

			$this->datedebut1 = "";
			$this->datedfin1 = "";
			$this->datedebut2 = "";
			$this->datedfin2 = "";
			$this->datedebut3 = "";
			$this->datedfin3 = "";
			$this->datedebut4 = "";
			$this->datedfin4 = "";

			if(!empty($_POST["datedebut1"]) && !empty($_POST["datefin1"])){
				$dates[] = array($_POST["datedebut1"], $_POST["datefin1"]);
				$this->datedebut1 = $_POST["datedebut1"];
				$this->datefin1 = $_POST["datefin1"];
			}			

			if(!empty($_POST["datedebut2"]) && !empty($_POST["datefin2"])){
				$dates[] = array($_POST["datedebut2"], $_POST["datefin2"]);
				$this->datedebut2 = $_POST["datedebut2"];
				$this->datefin2 = $_POST["datefin2"];
			}	

			if(!empty($_POST["datedebut3"]) && !empty($_POST["datefin3"])){
				$dates[] = array($_POST["datedebut3"], $_POST["datefin3"]);
				$this->datedebut3 = $_POST["datedebut3"];
				$this->datefin3 = $_POST["datefin3"];
			}	

			if(!empty($_POST["datedebut4"]) && !empty($_POST["datefin4"])){
				$dates[] = array($_POST["datedebut4"], $_POST["datefin4"]);
				$this->datedebut4 = $_POST["datedebut4"];
				$this->datefin4 = $_POST["datefin4"];
			}	

			foreach($dates as $date){

				$this->listeTransactionsCat = GraphiqueDAO::listerParCategorie($this->getUser()["userId"], $date[0], $date[1]);

				$labels = array();
				$data = array();

				foreach($this->listeTransactionsCat as $listeTransactionCat) {
					$labels[] = $listeTransactionCat[0];
					$data[] = $listeTransactionCat[1];
				}

				$data = array(
					"labels" => $labels,
					"datasets" => array(
						array(
							"data" => $data
							)
						)
					);

				$this->graphique_data[] = json_encode($data);
			}

			
		}
	}