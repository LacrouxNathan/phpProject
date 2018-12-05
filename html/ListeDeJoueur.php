<?php
	require("Joueur.php");
	
		
	class ListeDeJoueurs
	{
		private $listeJoueurs;
		
		function __construct() {
			$listeJoueurs = array();
		}
		
		function listeJoueurs() {
			$server = 'localhost';
			$db = 'cnr3027a';
			$login = 'cnr3027a';
			$mdp = 'sG5kC5b3';
				try {
					$linkpdo = new PDO("mysql:host=$server;dbname=$db",$login,$mdp);
				}
				catch (Exception $e) {
					return $this->listeJoueurs;
				}
			$res = $linkpdo -> query('SELECT * FROM JOUEUR');
			while ($data = $res -> fetch()) {
				$this->listeJoueurs[] = new Joueur($data['nom'],$data['prenom'],$data['datenaissance'], $data['photo'],$data['taille'], $data['poids'], $data['numlicence'], $data ['statut'], $data['poste'],$data['commentaire']);
			}
			$res->closeCursor();
		}
		
		function getListeJoueurs() {
			return $this->listeJoueurs;
		}
	}
		
?>
			
		
		
		
		
		

	
