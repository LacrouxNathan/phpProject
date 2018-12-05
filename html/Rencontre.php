<?php

	class Rencontre
	{
	
	private $dateheure
	private $adversaire
	private $victoire
	private $lieu
	private $resultat
	private $id
	
	function __construct($dateheure,$adversaire,$lieu,$resultat,$id) {
		$this->dateheure = $dateheure;
		$this->adversaire = $adversaire;
		$this->lieu = $lieu;
		$this->resultat = $resultat;
		$this->id = $id;
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
	function getResultat() {
		return $this->resultat;
	}
	function getId() {
		return $this->id;
	}
	
?>
