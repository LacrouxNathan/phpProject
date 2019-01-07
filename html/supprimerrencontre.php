<?php

require("connexion.php");
require("Rencontre.php");


$req = $GLOBALS['linkpdo']->prepare('DELETE FROM RENCONTRE WHERE idrencontre = :lid');
$req->execute(array('lid' => $_GET['idj']));

$req->closeCursor();

header('Location: index.php');



?>
