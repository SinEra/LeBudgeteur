<?php 

	require_once("action/inscription1Action.php");
	$action = new inscription1Action();
	$action->execute();

?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="css/global.css" rel="stylesheet" type="text/css" media="screen" />
	<title>Inscription</title>
</head>
<body>
	<h1>Inscription</h1>

	<form action="inscription1.php" method="post" onsubmit="return validate()">
		<div>Nom:</div>
		<div><input type="text" name="nom" id="nom"></div>
		<div>Prénom:</div>
		<div><input type="text" name="prenom" id="prenom"></div>
		<div>Courriel:</div>
		<div><input type="text" name="courriel" id="courriel"></div>
		<div>Mot de passe:</div>
		<div><input type="password" name="password" id="password"></div>
		<div>Confirmer le mot de passe:</div>
		<div><input type="password" name="passwordConfirm" id="password"></div>
		<input type="submit" value="Suivant"/>
	</form>

</body>
</html>