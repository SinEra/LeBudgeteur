<?php 

	require_once("action/IndexAction.php");
	$action = new IndexAction();
	$action->execute();

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h1>Ça marche!</h1>
<div>Allo 

<?php 
	echo $action->getUser()["firstName"];
?>

</div>
</body>
</html>