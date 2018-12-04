<?php
require("Joueur.php");
$listeJ = array(new Joueur("Auper", "Pascal", "14/07/1961", 178, 81));
$listeJ[] = new Joueur("Coquet", "Marie", "24/09/1999", 155, 90);
?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="index.css">
		<title>Liste des joueurs</title>
	</head>

	<body>
		<?php include("menu.php");?>
		<div id="tableau">
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
		</div>
	</body>
</html>