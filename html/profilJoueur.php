<?php
require("connexion.php");
$req = $GLOBALS['linkpdo']->prepare('SELECT * FROM JOUEUR WHERE idjoueur = :lid');
$req->execute(array('lid' => $_GET['id']));
while ($data = $req -> fetch()) {
    $nom = $data['nom'];
    $prenom = $data['prenom'];
    $photo = $data['photo'];
    $ddn = $data['datenaissance'];
    $taille = $data['taille'];
    $poids = $data['poids'];
}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="index.css">
		<title>Liste des joueurs</title>
	</head>

	<body>
	<?php $menu = 1; include("menu.php");?>
	<div style="float:left; margin-top: 1%">
        <img src=<?php echo("$photo");?> alt="Photo du joueur" style="height:128px;width:128; float:left;">
        <h1> <?php echo $nom." ".$prenom;?> </h1>
    </div>
    <div style="padding-left:40%">
        <p>Date de naissance : <?php echo $ddn?></p>
        <p>Taille            : <?php echo $taille?></p>
        <p>Poids             : <?php echo $poids?></p>
    </div>

    </body>
</html>
