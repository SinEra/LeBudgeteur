<?php
	require_once("action/ListeSousCategorieAction.php");
	$action = new ListeSousCategorieAction();
	$action->execute();
	echo json_encode($action->listeSousCategorie);