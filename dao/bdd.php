<?php

	try{

		$url = getenv("CLEARDB_DATABASE_URL");

		if(empty($url)){
			$server = "localhost";
			$username = "root";
			$password = "";
			$db = "application_budget";
		} else {
			$url = parse_url($url);
			$server = $url["host"];
			$username = $url["user"];
			$password = $url["pass"];
			$db = substr($url["path"], 1);
		}

		$bdd = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
	}

?>