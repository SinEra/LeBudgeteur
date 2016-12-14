<?php

	try{

		$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

		$server = $url["host"];
		$username = $url["user"];
		$password = $url["pass"];
		$db = substr($url["path"], 1);

		if(empty($url)){
			$server = "localhost";
			$username = "root";
			$password = "";
			$db = "application_budget";
		}

		$bdd = new PDO('mysql:host='.$server.';dbname='.$db.';charset=utf8', $username, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
	}

?>