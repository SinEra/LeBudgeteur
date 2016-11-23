<?php

	require_once("action/CommonAction.php");
	require_once("dao/GraphiqueDAO.php");

	class GraphiquesAction extends CommonAction{

		public function __construct(){
			parent::__construct(CommonAction::$VISIBILITY_MEMBER);
		}

		protected function executeAction(){
			
			$rows = GraphiqueDAO::

			TransactionsDAO::lister($this->getUser()["userId"], true);

			$labels = array();
			foreach($rows as $row) {
				$labels[] = $row[0];
			}

			$data = array();
			foreach($rows as $row) {
				$data[] = $row[1];
			}

			$data = array(
				"labels" => $labels,
				"datasets" => array(
					array(
						"data" => $data
					)
				)
			);
			//$data["label"] = array(...)

			$this->graphique1_data = json_encode($data);
		}
	}