<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
         <link rel="stylesheet" href="style.css">
        <title>Nouveau Joueur</title>
    </head>

    <body>
        <form action="ajoutrencontre.php" method="post" class="form">
	Date et Heure (AAAA-MM-JJ HH-MM-SS) : <input type="text" name="dateheure" required minlength="1" maxlength="19"> <br />
	Adversaire : <input type="text" name="adversaire" required minlength="1" maxlength="30" class="adv"> 		<br />
	
  	<div>
  	Lieu :
   	 <input type="radio" id="domicile" name="lieu" value="domicile" checked>
   	 <label for="domicile">Domicile</label>
   	 <input type="radio" id="exterieur" name="lieu" value="exterieur">
   	 <label for="exterieur">Exterieur</label>
   	 <br />
	Victoire : <input type="checkbox" name="victoire" value="victoire" checked ><br />
	Score (XX-XX): <input type="text" name="score" required minlength="5" maxlength="5"> <br />
	<br />
	<input type="submit" value="OK">
	<input type="reset" value="Reset">
    </body>
    			<a id="boutonadd" href=index.php> <div class="add"> Retour </div> </a>
    
</html>

<?php
require("connexion.php");
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



$req = $GLOBALS['linkpdo']->prepare('INSERT INTO RENCONTRE(dateheure,adversaire,victoire,lieu,score) VALUES(:dateheure,:adversaire,:victoire,:lieu,:score)');

$test = $GLOBALS['linkpdo']->prepare('SELECT idrencontre from RENCONTRE where dateheure = :ladateheure AND adversaire = :ladversaire');
$test->execute(array('ladateheure' => $dateheure, 'ladversaire' => $adversaire));
$result = $test->fetchAll();
if(empty($result)) {
	$req->execute(array('dateheure' => $dateheure,
		    	'adversaire' => $adversaire,
		    	'victoire' => $victoire,
		    	'lieu' => $lieu,
		    	'score' => $score));
} else {
	echo "Une rencontre avec cet adversaire existe déjà ce jour à cette heure";
}





}
	
	
	


?>


