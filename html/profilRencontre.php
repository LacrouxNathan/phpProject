<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="index.css">
		<title>Liste des rencontres</title>
	</head>

	<body>
	<?php $menu = 1; include("menu.php");?>
	<?php 
	require("connexion.php");
	$req = $GLOBALS['linkpdo']->prepare('SELECT * FROM RENCONTRE WHERE idrencontre = :lid'); 
		$req->execute(array('lid' => $_GET['id'])); 
		while ($data = $req -> fetch()) {
			echo $data['adversaire'];
		}
	?>
    </body>
</html>
