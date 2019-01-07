<?php

require("connexion.php");
require("Joueur.php");


$req = $GLOBALS['linkpdo']->prepare('DELETE FROM JOUEUR WHERE idjoueur = :lid');
$req->execute(array('lid' => $_GET['idj']));

$req->closeCursor();

header('Location: index.php');



?>
