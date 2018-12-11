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
				foreach ($listeR as $rencontre) {
					echo "<tr class=\"corp\">
							<td><a href=\"profilRencontre.php?id=".$rencontre->getId()."\">".$rencontre->getAdversaire()."</a></td>
							<td><a href=\"profilRencontre.php?id=".$rencontre->getId()."\">".$rencontre->getVictoire()."</a></td>
							<td><a href=\"profilRencontre.php?id=".$rencontre->getId()."\">".$rencontre->getScore()."</a></td>
							<td><a href=\"profilRencontre.php?id=".$rencontre->getId()."\">".$rencontre->getLieu()."</a></td>
							<td><a href=\"profilRencontre.php?id=".$rencontre->getId()."\">".$rencontre->getDateheure()."</a></td>
						</tr>";
				}
				?>
			</table>
		</div>
	</body>
</html>
