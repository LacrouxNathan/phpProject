<?php
require("ListeDeJoueur.php");
$listeJ = new ListeDeJoueurs();
$listeJ->listeJoueurs();



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
		<div id="tableau">
			<table>
				<tr class="entete">
					<td>Nom</td>
					<td>Prenom</td>
					<td>Poste</td>
					<td>Statut</td>
				</tr>
				<?php
				$listeJ = $listeJ->getListeJoueurs();
				foreach ($listeJ as $joueur) {
					echo "<tr class=\"corp\">
							<td><a href=\"profilJoueur.php?id=".$joueur->getId()."\">".$joueur->getNom()."</a></td>
							<td><a href=\"profilJoueur.php?id=".$joueur->getId()."\">".$joueur->getPrenom()."</a></td>
							<td><a href=\"profilJoueur.php?id=".$joueur->getId()."\">".$joueur->getPoste()."</a></td>
							<td><a href=\"profilJoueur.php?id=".$joueur->getId()."\">".$joueur->getStatut()."</a></td>
						</tr>";
				}
				?>
			</table>
		</div>
	</body>
</html>
