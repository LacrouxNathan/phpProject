<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Nouveau Joueur</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <form action="ajoutjoueur.php" method="post">
	Nom : <input type="text" name="nom" required minlength="1" maxlength="30"> <br />
	Prénom : <input type="text" name="prenom" required minlength="1" maxlength="30"> <br />
	Numéro de licence : <input type="text" name="numlicence" required minlength="8" maxlength="8"><br />
	Date Naissance : <input type="date" name="ddn" min="1900-01-01" max="2020-12-31"> <br />
	Photo : <input type="text" name="photo" required minlength="1" maxlength="30"> <br />
	Taille : <input type="text" name="taille" required minlength="3" maxlength="3"> <br />
	Poids : <input type="text" name="poids" required minlength="2" maxlength="3"> <br />
	Statut : <input type="text" name="statut" required minlength="1" maxlength="8"> <br />
	Poste : <input type="text" name="poste" required minlength="1" maxlength="9"> <br />
	<input type="submit" value="OK">
	<input type="reset" value="Reset">
    </body>
    
    <a id="boutonadd" href=index.php> <div class="add"> Retour </div> </a>
</html>

<?php
require("connexion.php");
if (isset($_POST['nom'])) {
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$ddn = $_POST['ddn'];
	$numlicence = $_POST['numlicence'];
	$photo = $_POST['photo'];
	$taille = $_POST['taille'];
	$poids = $_POST['poids'];
	$statut = $_POST['statut'];
	$poste = $_POST['poste'];


$req = $GLOBALS['linkpdo']->prepare('INSERT INTO JOUEUR(nom,prenom,datenaissance,photo,numlicence,taille,poids,statut,poste) VALUES(:nom,:prenom,:ddn,:photo,:numlicence,:taille,:poids,:statut,:poste)');

$test = $GLOBALS['linkpdo']->prepare('SELECT * from JOUEUR where numlicence = :lenum');
$test->execute(array('lenum' => $numlicence));
$result = $test->fetchAll();
if(empty($result)) {
	$req->execute(array('nom' => $nom,
		    	'prenom' => $prenom,
		    	'ddn' => $ddn,
		    	'photo' => $photo,
		    	'numlicence' => $numlicence,
		    	'taille' => $taille,
		    	'poids' => $poids,
		    	'statut' => $statut,
		    	'poste' => $poste));
} else {
	echo "Un joueur possédant ce numéro de licence existe déjà";
}





}
	
	
	


?>


