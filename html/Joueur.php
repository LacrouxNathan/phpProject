<?php
	/**
	 * Joueur
	 */
	class Joueur
	{
		
		private String ddn;
		private int taille;
		private int poids;
		private int statut; //0-> actif, 1->absent, 2->Suspendu, 3-> blesse
		private int poste; //0-> attaquant, 1-> defenseur

		function __construct($ddn, $taille, $poids, $statut = 0, $poste = 0)
		{
			$this->ddn = $ddn;
			$this->taille = $taille;
			$this->poids = $poids;
			$this->statut = $statut;
			$this->poste = $poste;
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