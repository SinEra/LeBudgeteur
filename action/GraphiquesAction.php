<?php

	require_once("action/CommonAction.php");
	require_once("dao/GraphiqueDAO.php");

	class GraphiquesAction extends CommonAction{

		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction(){

			if(!empty($_POST["datedebut"]) && !empty($_POST["datefin"])){
				$this->listeTransactionsCat = GraphiqueDAO::listerParCategorie($this->getUser()["userId"], $_POST["datedebut"], $_POST["datefin"]);

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
				
				$this->graphique1_data = json_encode($data);
			}

			
		}
	}