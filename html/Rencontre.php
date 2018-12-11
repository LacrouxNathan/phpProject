<?php

	class Rencontre
	{
	
	private $dateheure;
	private $adversaire;
	private $victoire;
	private $lieu;
	private $score;
	private $id;
	
	function __construct($dateheure,$adversaire,$victoire,$lieu,$score,$id) {
		$this->dateheure = $dateheure;
		$this->adversaire = $adversaire;
		$this->lieu = $lieu;
		$this->score = $score;
		$this->id = $id;
		switch ($victoire) {
				case 0:
					$this->victoire = "Défaite";
					break;
				case 1:
					$this->victoire = "Victoire";
					break;
				default:
					$this->victoire = "Victoire";
			}
	}
	
	function getDateheure() {
		return $this->dateheure;
	}

	function getAdversaire() {
		return $this->adversaire;
	}
	function getLieu() {
		return $this->lieu;
	}
	function getScore() {
		return $this->score;
	}
	function getId() {
		return $this->id;
	}
	
	function getVictoire() {
		return $this->victoire;
	}

	}
	
?>
