<?php
require("connexion.php");
require("Rencontre.php");
$req = $GLOBALS['linkpdo']->prepare('SELECT * FROM RENCONTRE WHERE idrencontre = :lid');
$req->execute(array('lid' => $_GET['id']));
	while ($data = $req -> fetch()) {
        	$rencontre = new Rencontre($data["dateheure"],$data["adversaire"],$data["victoire"],$data["lieu"],$data["score"],
        	$data["idrencontre"]);
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css">
		<title>Liste des rencontres</title>
	</head>

	<body>
	<?php $menu = 1; include("menu.php");?>
	
	
	<div class="affrenc">
		<p> Adversaire : <?php echo $rencontre->getAdversaire(); ?> 
		<br>Lieu : <?php echo $rencontre->getLieu(); ?> 
		<br> Score : <?php echo $rencontre->getScore(); ?> </p>
	</div>
		
			
		
	</div>
	
    </body>
    			<?php echo "<a id=\"boutonedit\" href=\"editrencontre.php?idj=".$rencontre->getId()."\"> <div class=\"edit\"> Modifier rencontre </div> </a>" ?>
	    		<?php echo "<a id=\"boutondel\" href=\"supprimerrencontre.php?idj=".$rencontre->getId()."\"> <div class=\"delr\"> Supprimer Rencontre </div> </a>" ?>		
</html>
