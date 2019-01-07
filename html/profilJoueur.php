<?php
require("connexion.php");
require("Joueur.php");
require("Rencontre.php");

$req = $GLOBALS['linkpdo']->prepare('SELECT * FROM JOUEUR WHERE idjoueur = :lid');
$req->execute(array('lid' => $_GET['id']));
while ($data = $req -> fetch()) {
    $joueur = new Joueur($data["nom"],$data["prenom"],$data["datenaissance"],$data["photo"],$data["taille"],
        $data["poids"],$data["numlicence"],$data["statut"],$data["poste"],$data["commentaire"], $data["idjoueur"]);
}
$req->closeCursor();

$req = $GLOBALS['linkpdo']->prepare('SELECT r.adversaire, r.victoire, r.score, p.note, r.lieu, r.dateheure, r.idrencontre FROM RENCONTRE r, PARTICIPER p, JOUEUR j WHERE j.idjoueur = :lid AND j.idjoueur = p.idjoueur AND p.idrencontre = r.idrencontre');
$req->execute(array('lid' => $_GET['id']));
$res = array();
while ($data = $req -> fetch()) {
    $res[] = array(new Rencontre($data["dateheure"],$data["adversaire"],$data["victoire"], $data["lieu"], $data["score"], $data["id"]), $data["note"]);
}

$req->closeCursor();
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
            <p>Poste             : <strong><?php echo $joueur->getPoste()?></strong></p>
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
                    <?php foreach ($res as $ligne) {
                    echo "<tr class=\"corp\">".
                        "<td><a href=\"profilRencontre.php?id=".$ligne[0]->getId()."\">".$ligne[0]->getAdversaire()."</a></td>".
                        "<td><a href=\"profilRencontre.php?id=".$ligne[0]->getId()."\">".$ligne[0]->getVictoire()."</a></td>".
                        "<td><a href=\"profilRencontre.php?id=".$ligne[0]->getId()."\">".$ligne[0]->getScore()."</a></td>".
                        "<td><a href=\"profilRencontre.php?id=".$ligne[0]->getId()."\">".$ligne[1]  ."</a></td>".
                        "<td><a href=\"profilRencontre.php?id=".$ligne[0]->getId()."\">".$ligne[0]->getLieu()."</a></td>".
                        "<td><a href=\"profilRencontre.php?id=".$ligne[0]->getId()."\">".$ligne[0]->getDateHeure()."</a></td>".
                        "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div>
    		
    		<?php echo "<a id=\"boutonedit\" href=\"editjoueur.php?idj=".$joueur->getId()."\"> <div class=\"edit\"> Modifier Joueur </div> </a>" ?>
    		<?php echo "<a id=\"boutondel\" href=\"supprimer.php?idj=".$joueur->getId()."\"> <div class=\"del\"> Supprimer Joueur </div> </a>" ?>		
	
							
    </div
    </body>
</html>
