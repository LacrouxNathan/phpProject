<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="index.css">
		<title>Liste des joueurs</title>
	</head>

	<body>
	<?php $menu = 1; include("menu.php");?>
	<?php
		require("connexion.php");
		$req = $GLOBALS['linkpdo']->prepare('SELECT nom FROM JOUEUR WHERE idjoueur = :lid'); 
		$req->execute(array('lid' => $_GET['id'])); 
		while ($data = $req -> fetch()) {
			$nom = $data['nom'];
		}		
	?>
	<h1> <?php echo $nom ?> </h1>
		
    </body>
</html>
