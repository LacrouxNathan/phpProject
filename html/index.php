<?php
require("ListeDeJoueur.php");
$listeJ = new ListeDeJoueurs();
$listeJ = $listeJ->listeJoueurs();
$listeJ[] = new Joueur("Test","Test", "17/10/1998", 173, 65);
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
				foreach ($listeJ as $joueur) {
					echo "<tr class=\"corp\">
							<td><a href=\"profilJoueur.php?nom=".$joueur->getNom()."\">".$joueur->getNom()."</a></td>
							<td><a href=\"profilJoueur.php?nom=".$joueur->getNom()."\">".$joueur->getPrenom()."</a></td>
							<td><a href=\"profilJoueur.php?nom=".$joueur->getNom()."\">".$joueur->getPoste()."</a></td>
							<td><a href=\"profilJoueur.php?nom=".$joueur->getNom()."\">".$joueur->getStatut()."</a></td>
						</tr>";
				}
				?>
			</table>
		</div>
	</body>
</html>