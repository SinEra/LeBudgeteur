<?php 

	require_once("action/inscription2Action.php");
	$action = new Inscription2Action();
	$action->execute();

	//print_r($action->listeTypeComptes);
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
	<form action="inscription2.php" method="post" onsubmit="return validate()">
		<div>Nom du compte: </div>
		<input type="text" name="nom">
		<div>Type de compte:</div>
		<select name="typeCompte">
			<?php
				foreach ($action->listeTypeComptes as $typeCompte) {
					?>
						<option value="<?= $typeCompte["typeCompteId"] ?>"> <?= $typeCompte["nom"] ?> </option>
					<?php
				}

			?>
		</select>
		<div>Montant:</div>
		<div><input type="text" name="montant"></div>
		<input type="submit" value="Ajouter" name="ajouter"/>
		<input type="submit" value="Terminer" name="terminer"/>

		<table>
			<tr>
				<td>Compte</td>
				<td>Montant</td>
			</tr>
			<?php foreach($action->listeComptes as $compte) { ?> 
				<tr>
					<td> <?= $compte["nom"] ?> </td>
					<td> <?= $compte["montant"]?> </td> 
				</tr>
			<?php } ?>
		</table>

	</form>
</body>
</html>