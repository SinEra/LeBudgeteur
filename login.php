<?php 

	require_once("action/LoginAction.php");
	$action = new LoginAction();
	$action->execute();

?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link href="css/global.css" rel="stylesheet" type="text/css" media="screen" />
	<title>Le budgeteur</title>
</head>
<body>
	<h1>Le budgeteur</h1>
	<form action="login.php" method="post" onsubmit="return validate()">
		<div>Courriel</div>
		<div><input type="text" name="email" id="email"></div>
		<div>Mot de passe</div>
		<div><input type="password" name="password" id="password"></div>
		<input type="submit" value="Connexion"/>
		<div><font color="black">Vous êtes nouveaux? <a href="inscription1.php">Cliquez ici</a></div>
	</form>
</body>
</html>