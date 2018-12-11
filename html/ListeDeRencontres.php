<?php
	require("connexion.php");
	require("Rencontre.php");
	
	
		
	class ListeDeRencontres
	{
		private $listeRencontres;
		
		function __construct() {
			$listeRencontres = array();
		}
		
		function listeRencontres() {
			$res = $GLOBALS['linkpdo'] -> query('SELECT * FROM RENCONTRE');
			while ($data = $res -> fetch()) {
				$this->listeRencontres[] = new Rencontre($data['dateheure'],$data['adversaire'],$data['victoire'],$data['lieu'], $data['score'],$data['idrencontre']);
			}
			$res->closeCursor();
		}
		
		function getListeRencontres() {
			return $this->listeRencontres;
		}
	}
		
?>
			
