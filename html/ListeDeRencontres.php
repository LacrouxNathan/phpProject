<?php
	require("Rencontre.php");
	
		
	class ListeDeRencontres
	{
		private $listeRencontres;
		
		function __construct() {
			$listeRencontres = array();
		}
		
		function listeRencontres() {
			$server = 'localhost';
			$db = 'cnr3027a';
			$login = 'cnr3027a';
			$mdp = 'sG5kC5b3';
				try {
					$linkpdo = new PDO("mysql:host=$server;dbname=$db",$login,$mdp);
				}
				catch (Exception $e) {
					return $this->listeRencontres;
				}
			$res = $linkpdo -> query('SELECT * FROM RECONTRE');
			while ($data = $res -> fetch()) {
				$this->listeRencontres[] = new Rencontre($data['dateheure'],$data['adversaire'],$data['lieu'], $data['resultat']);
			}
			$res->closeCursor();
		}
		
		function getListeRencontres() {
			return $this->listeRencontres;
		}
	}
		
?>
			
