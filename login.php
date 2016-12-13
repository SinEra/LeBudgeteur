<?php 

	require_once("partial/header.php");	

	require_once("action/LoginAction.php");
	$action = new LoginAction();
	$action->execute();

?>

		<h1>Le budgeteur</h1>

		<form action="login.php" method="post" onsubmit="return validate()" class="formulaire">
		
			<h3>Connexion</h3>

			<!--Message si connexion erronée-->
			<?php 

				if($action->wasDenied === true){
					?>
					<div class="erreur">Connexion refusée</div>
					<?php	
				}
				else if($action->wrongLogin ===true){
					?>
					<div class="erreur">Mauvais courriel ou mot de passe. Veuillez recommencer</div>
					<?php
				}
			?>

			<div>Courriel</div>
			<div><input type="text" name="email"></div>
		
			<div>Mot de passe</div>
			<div><input type="password" name="password"></div>
		
			<input type="submit" value="Connexion"/ class="bouton">

			<div><font color="black">Vous êtes nouveaux? <a href="inscriptionInfos.php" id="cliquez">Cliquez ici</a></div>
			<div><font color="black">Vous avez oublié votre mot de passe? <a href="oublimdp.php" id="cliquez">Cliquez ici</a></div>
		
		</form>

<?php

	require_once("partial/footer.php");