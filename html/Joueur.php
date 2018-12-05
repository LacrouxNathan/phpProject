<?php
	/**
	 * Joueur
	 */
	class Joueur
	{
		private $nom;
		private $prenom;
		private $ddn;
		private $taille;
		private $poids;
		private $statut; //0-> actif, 1->absent, 2->Suspendu, 3-> blesse
		private $poste; //0-> attaquant, 1-> defenseur

		function __construct($nom, $prenom, $ddn, $taille, $poids, $statut = 0, $poste = 0)
		{
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->ddn = $ddn;
			$this->taille = $taille;
			$this->poids = $poids;
			switch ($statut) {
				case 1:
					$this->statut = "Absent";
					break;
				case 2:
					$this->statut = "Suspendu";
					break;
				case 3:
					$this->statut = "Blesse";
					break;
				default:
					$this->statut = "actif";
			}
			switch ($poste) {
				case 1:
					$this->poste = "Defenseur";
					break;
				default:
					$this->poste = "Attaquant";
					break;
			}
		}

		function getNom() {
			return $this->nom;
		}

		function getPrenom() {
			return $this->prenom;
		}

		function getDdn() {
			return $this->ddn;
		}

		function getTaille() {
			return $this->taille;
		}

		function getPoids() {
			return $this->poids;
		}

		function getStatut() {
			return $this->statut;
		}

		function getPoste() {
			return $this->poste;
		}
	}
?>