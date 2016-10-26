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
		<div>Compte:</div>
		<select>
			<option value="debit">Débit</option>
			<option value="credit">Crédit</option>
		</select>
		<div>Montant:</div>
		<div><input type="text" name="montant"></div>
		<input type="submit" value="Ajouter"/>
		<input type="submit" value="Terminer"/>
	</form>
</body>
</html>