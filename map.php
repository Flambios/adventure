<?php
require 'montagne.php';
require 'plaine.php';
require 'tresor.php';
require 'gobelin.php';
require 'orc.php';
require 'aventurier.php';

class map
{


	private $nbLignesMap;
	private $nbColonnesMap;
	public $mapTab = array(array());
	private $aventurierPos = array(array());
	private $aventu = 0;


	public function __construct($ligne, $colonnes)
	{

		$this->nbLignesMap = $ligne;
		$this->nbColonnesMap = $colonnes;

	}



	public function createMap()
	{


		for ($i = 0; $i < $this->nbLignesMap; $i++) {
			for ($j = 0; $j < $this->nbColonnesMap; $j++) {

				$this->mapTab[$i][$j] = new plaine;
			}
		}
	}


	public function addMontagne($ligne, $colonnes)
	{
		$ligne = $ligne;
		$colonnes = $colonnes;
		$this->mapTab[$ligne][$colonnes] = new montagne;
	}

	public function addGobelin($ligne, $colonnes, $lvl, $nbD)
	{
		$ligne = $ligne;
		$colonnes = $colonnes;
		$this->mapTab[$ligne][$colonnes] = new gobelin($lvl, $nbD);
	}

	public function addOrc($ligne, $colonnes, $lvl, $nbD)
	{
		$ligne = $ligne;
		$colonnes = $colonnes;
		$this->mapTab[$ligne][$colonnes] = new orc($lvl, $nbD);
	}


	public function addTresor($ligne, $colonnes, $nombre)
	{
		$ligne = $ligne;
		$colonnes = $colonnes;
		$this->mapTab[$ligne][$colonnes] = new tresor($nombre);
	}


	public function addAventurier($prenomAventurier, $ligneAventurier, $colonneAventurier, $orientationAventurier, $mouvementAventurier)
	{

		$this->mapTab[$ligneAventurier][$colonneAventurier] = new aventurier($prenomAventurier, $ligneAventurier, $colonneAventurier, $orientationAventurier, $mouvementAventurier);
		//$this->prenomAventurier=$prenom;
		$this->mouvement = $mouvementAventurier;
		$this->aventurierPos[$this->aventu][0] = $ligneAventurier;
		$this->aventurierPos[$this->aventu][1] = $colonneAventurier;
		$this->aventu++;

	}

	public function mouvementsAventurier($tour)
	{
		for ($i = 0; $i < $tour; $i++) {
			for ($j = 0; $j < $this->aventu; $j++) {

				//var_dump($this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]);
				echo "</br>";
				if ($this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->mouvement[0] != false) {


					if ($this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->mouvement[0] == "A") {

						$resultat = $this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->bougerAventurier();
						var_dump($resultat);

						if ($this->mapTab[$resultat[0][0]][$resultat[0][1]] == FALSE) {

							$this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->noSaveMove();

						} elseif ($this->mapTab[$resultat[0][0]][$resultat[0][1]]->print() == ".") {

							$this->mapTab[$resultat[0][0]][$resultat[0][1]] = $this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]];
							$this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]] = new plaine;

							$this->aventurierPos[$j][0] = $resultat[0][0];
							$this->aventurierPos[$j][1] = $resultat[0][1];
							//var_dump($resultat);
							$this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->saveMove();

						} elseif ($this->mapTab[$resultat[0][0]][$resultat[0][1]]->print() == "T") {

							$this->mapTab[$resultat[0][0]][$resultat[0][1]] = $this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]];
							$this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]] = new plaine;

							$this->aventurierPos[$j][0] = $resultat[0][0];
							$this->aventurierPos[$j][1] = $resultat[0][1];

							$this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->saveMove();
						} elseif ($this->mapTab[$resultat[0][0]][$resultat[0][1]]->print() == "G") {

							$this->mapTab[$resultat[0][0]][$resultat[0][1]] = $this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]];
							$this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]] = new plaine;

							$this->aventurierPos[$j][0] = $resultat[0][0];
							$this->aventurierPos[$j][1] = $resultat[0][1];

							$this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->saveMove();
						} elseif ($this->mapTab[$resultat[0][0]][$resultat[0][1]]->print() == "O") {

							$this->mapTab[$resultat[0][0]][$resultat[0][1]] = $this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]];
							$this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]] = new plaine;

							$this->aventurierPos[$j][0] = $resultat[0][0];
							$this->aventurierPos[$j][1] = $resultat[0][1];

							$this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->saveMove();
						}




					} elseif ($this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->mouvement[0] == "G") {
						$resultat = $this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->bougerAventurier();
					} elseif ($this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->mouvement[0] == "D") {
						$resultat = $this->mapTab[$this->aventurierPos[$j][0]][$this->aventurierPos[$j][1]]->bougerAventurier();
					}
				}
			}
		}

	}

	public function afficherMap()
	{
		foreach ($this->mapTab as $mapTabL) {
			foreach ($mapTabL as $mapTabC) {
				echo "&nbsp" . $mapTabC->print() . "&nbsp";
			}
			echo '<br>';
		}
	}
}
