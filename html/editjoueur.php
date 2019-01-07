<?php
require("connexion.php");
require("Joueur.php");
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
	$req = $GLOBALS['linkpdo']->prepare('UPDATE JOUEUR SET nom = :nom, prenom = :prenom,datenaissance = :ddn, photo = :photo, numlicence = :numlicence, taille = :taille,poids = :poids, statut = :statut, poste =:poste)');

$req->execute(array('nom' => $nom,
		    	'prenom' => $prenom,
		    	'ddn' => $ddn,
		    	'photo' => $photo,
		    	'numlicence' => $numlicence,
		    	'taille' => $taille,
		    	'poids' => $poids,
		    	'statut' => $statut,
		    	'poste' => $poste));
}



$req = $GLOBALS['linkpdo']->prepare('SELECT * FROM JOUEUR WHERE idjoueur = :lid');
$req->execute(array('lid' => $_GET['idj']));
while ($data = $req -> fetch()) {
    $joueur = new Joueur($data["nom"],$data["prenom"],$data["datenaissance"],$data["photo"],$data["taille"],
        $data["poids"],$data["numlicence"],$data["statut"],$data["poste"],$data["commentaire"], $data["idjoueur"]);

}
?>


<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Nouveau Joueur</title>
    </head>
    <body>
        <form action="editjoueur.php" method="post">
	Nom : <input type="text" name="nom" required minlength="1" maxlength="30" value="<?php echo $joueur->getNom() ?>"> <br />
	Prénom : <input type="text" name="prenom" required minlength="1" maxlength="30"value="<?php echo $joueur->getPrenom() ?>"> <br />
	Numéro de licence : <input type="text" name="numlicence" required minlength="8" maxlength="8"value="<?php echo $joueur->getNumLicence() ?>"><br />
	Date Naissance : <input type="date" name="ddn" min="1900-01-01" max="2020-12-31" value="<?php echo $joueur->getDdn() ?>"> <br />
	Photo : <input type="text" name="photo" required minlength="1" maxlength="30"value="<?php echo $joueur->getPhoto() ?>"> <br />
	Taille : <input type="text" name="taille" required minlength="3" maxlength="3"value="<?php echo $joueur->getTaille() ?>"> <br />
	Poids : <input type="text" name="poids" required minlength="2" maxlength="3"value="<?php echo $joueur->getPoids() ?>"> <br />
	Statut : <input type="text" name="statut" required minlength="1" maxlength="8"value="<?php echo $joueur->getStatut() ?>"> <br />
	Poste : <input type="text" name="poste" required minlength="1" maxlength="9"value="<?php echo $joueur->getPoste() ?>"> <br />
	<input type="submit" value="Modifier">
	<input type="reset" value="Reset">
    </body>
</html>
