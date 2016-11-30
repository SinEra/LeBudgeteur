<?php 

	require_once("action/CommonAction.php");
	require_once("dao/GraphiqueDAO.php");

	class AccueilAction extends CommonAction {

		public function __construct() {

			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction() {

			$this->listeRevenusDepenses = GraphiqueDAO::listerRevenusDepenses($this->getUser()["userId"]);

			$labels = array();
			$data = array();

			foreach($this->listeRevenusDepenses as $listeRevenuDepense) {
				
				$labels[] = $listeRevenuDepense[0];
				$data[] = $listeRevenuDepense[1];
			}

			$data = array(
				"labels" => $labels,
				"datasets" => array(
					array(
						"data" => $data
					)
				)
			);

			$this->graphique_data = json_encode($data);
		}
	}