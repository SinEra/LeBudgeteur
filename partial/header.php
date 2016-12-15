<!DOCTYPE html>
<html>
	<head>
		<title>Le Budgeteur</title>
		<meta charset="utf-8">

		<!--Responsive-->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		<!--Chart.js pour les graphiques-->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.bundle.min.js"></script>
		
		<!--JQuery-->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		
		<!--Javascript-->
		<script src="js/graphiques.js"></script>
		<script src="js/form.js"></script>

		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
				
		<!--CSS-->
		<link rel="stylesheet" href="css/theme.min.css" />		
		<link rel="stylesheet" media="screen" href="css/style.css">
	
	</head>
	
	<body>
		<nav class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a class="navbar-brand" href="accueil.php">Le Budgeteur</a>
				</div>
				<ul class="nav navbar-nav">
					<li><a>Bienvenue</a></li>
					<li><a href="transactions.php">Transactions</a></li>
					<li><a href="graphiques.php">Graphiques</a></li>
					<li><a href="calendrier.php">Calendrier</a></li>
					<li role="presentation" class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Profil <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="modifierCompte.php">Modifier les comptes</a></li>
							<li><a href="modifierProfil.php">Modifier le profil</a></li>
						</ul>
					</li>
					<li><a href="deconnexion.php">Déconnexion</a></li>
				</ul>
			</div>
		</nav>
		<div style="padding-top: 75px" class="container">