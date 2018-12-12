<?php
	/**
	 * Joueur
	 */
	class Joueur
	{
		private $nom;
		private $prenom;
		private $ddn;
		private $photo;
		private $taille;
		private $poids;
		private $numlicence;
		private $statut; //0-> actif, 1->absent, 2->Suspendu, 3-> blesse
		private $poste; //0-> attaquant, 1-> defenseur
		private $commentaire;
		private $id;

		function __construct($nom, $prenom, $ddn, $photo="",$taille, $poids, $numlicence, $statut = 0, $poste = 0,$commentaire="",$id)
		{
			$this->nom = $nom;
			$this->prenom = $prenom;
			$this->taille = $taille;
			$this->poids = $poids;
			$this->photo = $photo;
			$this->numlicence = $numlicence;
			$this->commentaire = $commentaire;
			$this->id = $id;
			switch ($statut) {
				case 1:
					$this->statut = "Absent";
					break;
				case 2:
					$this->statut = "Suspendu";
					break;
				case 3:
					$this->statut = "Bléssé";
					break;
				default:
					$this->statut = "Actif";
			}
			switch ($poste) {
				case 1:
					$this->poste = "Défenseur";
					break;
				default:
					$this->poste = "Attaquant";
					break;
			}

			//fommatage de la date
            $date = new DateTime($ddn);
			$this->ddn = $date->format("d-m-Y");
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
		function getNumLicence() {
			return $this->numlicence;
		}
		function getPhoto() {
			return $this->photo;
		}
		function getCommentaire() {
			return $this->commentaire;
		}
		function getId() {
			return $this->id;
		}
	}
?>
