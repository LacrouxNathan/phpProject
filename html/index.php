<?php
require("ListeDeJoueur.php");
$listeJ = new ListeDeJoueurs();
$listeJ = $listeJ->listeJoueurs();
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="index.css">
		<title>Liste des joueurs</title>
	</head>

	<body>
		<table>
			<tr>
				<td>Nom</td>
				<td>Prenom</td>
				<td>Poste</td>
				<td>Statut</td>
			</tr>
			<?php
			foreach ($listeJ as $joueur) {
				echo "<tr>
						<td>".$joueur->getNom()."</td>
						<td>".$joueur->getPrenom()."</td>
						<td>".$joueur->getPoste()."</td>
						<td>".$joueur->getStatut()."</td>
					  </tr>";
			}
			?>
		</table>
	</body>
</html>
