<?php
require("connexion.php");
require("Rencontre.php");
if (isset($_POST['dateheure'])) {
	$dateheure = $_POST['dateheure'];
	$adversaire = $_POST['adversaire'];
	if (isset($_POST['victoire'])) {
		$victoire = 1;
	} else {
		$victoire = 0;
	}
	
	if ($_POST['lieu'] == 'domicile') {
		$lieu = 'Domicile';
	} else {
		$lieu = 'Exterieur';
	}
	
	$score = $_POST['score'];

	$req = $GLOBALS['linkpdo']->prepare('UPDATE RENCONTRE SET dateheure = :dateheure, adversaire = :adversaire,victoire = :victoire, lieu = :lieu, score = :score)');

$req->execute(array('dateheure' => $dateheure,
		    	'adversaire' => $adversaire,
		    	'victoire' => $victoire,
		    	'lieu' => $lieu,
		    	'score' => $score));
}



$req = $GLOBALS['linkpdo']->prepare('SELECT * FROM RENCONTRE WHERE idrencontre = :lid');
$req->execute(array('lid' => $_GET['idj']));
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
        <title>Modifier Rencontre</title>
    </head>
    <body>
        <form action="ajoutrencontre.php" method="post" class="form">
	Date et Heure (AAAA-MM-JJ HH-MM-SS) : <input type="text" name="dateheure" required minlength="1" maxlength="19" value="<?php echo $rencontre->getDateheure() ?>"> <br />
	Adversaire : <input type="text" name="adversaire" required minlength="1" maxlength="30" class="adv" value="<?php echo $rencontre->getAdversaire() ?>"> 		<br />
	
  	<div>
  	Lieu :
   	 <input type="radio" id="domicile" name="lieu" value="domicile" checked>
   	 <label for="domicile">Domicile</label>
   	 <input type="radio" id="exterieur" name="lieu" value="exterieur">
   	 <label for="exterieur">Exterieur</label>
   	 <br />
	Victoire : <input type="checkbox" name="victoire" value="victoire" checked ><br />
	Score (XX-XX): <input type="text" name="score" required minlength="5" maxlength="5" value="<?php echo $rencontre->getScore() ?>"> <br />
	<br />
	<input type="submit" value="OK">
	<input type="reset" value="Reset">
    </body>
        <a id="boutonadd" href=index.php> <div class="add"> Retour </div> </a>
</html>