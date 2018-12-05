<?php
require("ListeDeRencontres.php");
$listeR = new ListeDeRencontres();
$listeR->listeRencontres();



?>

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="index.css">
		<title>Liste des rencontres</title>
	</head>

	<body>
		<?php $menu = 1; include("menu.php");?>
		<div id="tableau">
			<table>
				<tr class="entete">
					<td>Adversaire</td>
					<td>Résultat</td>
					<td>Score</td>
					<td>Lieu</td>
					<td>Date</td>
				</tr>
				<?php
				$listeR = $listeR->getListeRencontres();
				foreach ($listeR as $recontre) {
					echo "<tr class=\"corp\">
							<td><a href=\"profilRencontre.php?nom=".$rencontre->getId()."\">".$rencontre->getAdversaire()."</a></td>
							<td><a href=\"profilRencontre.php?nom=".$rencontre->getId()."\">".$rencontre->getPrenom()."</a></td>
							<td><a href=\"profilRencontre.php?nom=".$rencontre->getId()."\">".$rencontre->getPoste()."</a></td>
							<td><a href=\"profilRencontre.php?nom=".$rencontre->getId()."\">".$rencontre->getStatut()."</a></td>
						</tr>";
				}
				?>
			</table>
		</div>
	</body>
</html>
