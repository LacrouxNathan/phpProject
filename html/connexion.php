<?php
	$server = 'localhost';
	$db = 'cnr3027a';
	$login = 'cnr3027a';
	$mdp = 'sG5kC5b3';
	try {
		$GLOBALS['linkpdo'] = new PDO("mysql:host=$server;dbname=$db", $login,$mdp);
	}
	catch (Exception $e) {
		die('Erreur : ' . $e->getMessage());
	}
?>
