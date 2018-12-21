<?php
require("connexion.php");
require("Joueur.php");
$req = $GLOBALS['linkpdo']->prepare('SELECT * FROM JOUEUR WHERE idjoueur = :lid');
$req->execute(array('lid' => $_GET['id']));
while ($data = $req -> fetch()) {
    $joueur = new Joueur($data["nom"],$data["prenom"],$data["datenaissance"],$data["photo"],$data["taille"],
        $data["poids"],$data["numlicence"],$data["statut"],$data["poste"],$data["commentaire"], $data["idjoueur"]);

}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style.css">
        <title><?php echo "profil de ".$joueur->getNom()." ".$joueur->getPrenom();?></title>
	</head>

	<body>
	<?php $menu = 0; include("menu.php");?>
    <div class="content">
        <div id="photo">
            <img src=<?php echo($joueur->getPhoto());?> alt="Photo du joueur">
            <div id="donne">
                <h1> <?php echo $joueur->getNom()." ".$joueur->getPrenom();?> </h1>
                <h3> <?php echo $joueur->getNumLicence()?></h3>
            </div>
        </div>
        <div id="infos">
            <p>Date de naissance : <?php echo $joueur->getDdn()?></p>
            <p>Taille            : <?php echo $joueur->getTaille()?> cm</p>
            <p>Poids             : <?php echo $joueur->getPoids()?> Kg</p>
            <p>Statut            : <strong><?php echo $joueur->getStatut()?></strong></p>
            <p>Poste            : <strong><?php echo $joueur->getPoste()?></strong></p>
        </div>
        <div id="divtabRencontre">
            <table id="tableprofil">
                <thead>
                    <tr class="entete" style="font-size: 18pt">
                        <td>Adversaire</td>
                        <td>Resultat de l'equipe</td>
                        <td>Score</td>
                        <td>Note du coach</td>
                        <td>Lieu</td>
                        <td>Date</td>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                    <tr><td>test</td></tr>
                </tbody>
            </table>
        </div>
    </div>
    <div>
    		
    		<?php echo "<a id=\"boutonedit\" href=\"editjoueur.php?idj=".$joueur->getId()."\"> <div class=\"edit\"> Modifier Joueur </div> </a>" ?>
    		<?php echo "<a id=\"boutondel\" href=\"index.php?idj=".$joueur->getId()."&del=1"."\"> <div class=\"del\"> Supprimer Joueur </div> </a>" ?>		
	
							
    </div
    </body>
</html>
