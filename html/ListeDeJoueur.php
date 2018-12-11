<?php
	require("connexion.php");
	require("Joueur.php");
	
		
	class ListeDeJoueurs
	{
		private $listeJoueurs;
		
		function __construct() {
			$listeJoueurs = array();
		}
		
		function listeJoueurs() {
			$res = $GLOBALS['linkpdo'] -> query('SELECT * FROM JOUEUR');
			while ($data = $res -> fetch()) {
				$this->listeJoueurs[] = new Joueur($data['nom'],$data['prenom'],$data['datenaissance'], $data['photo'],$data['taille'], $data['poids'], $data['numlicence'], $data ['statut'], $data['poste'],$data['commentaire'],$data['idjoueur']);
			}
			$res->closeCursor();
		}
		
		function getListeJoueurs() {
			return $this->listeJoueurs;
		}
	}
		
?>
			
		
		
		
		
		

	
