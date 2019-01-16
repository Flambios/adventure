<?php
require 'map.php';



/*    OUVERTURE DE MON FICHER DE CREATION ET MISE DES PARAMETRES DANS UN TABLEAU  */
$files = fopen('fichier.txt', 'r');

$fileContent = file_get_contents('fichier.txt');
$nbL = substr_count($fileContent, "\n");
$nbL = $nbL + 1;

for ($i = 0; $i < $nbL; $i++) {

	$fileLigne = fgets($files);
	$tabLigne[$i] = $fileLigne;
}


/* ANALYSE DE CHAQUE COMMANDE LIGNE PAR LIGNE */
$check = 0;
$nbAventurier = 0;
$tabAdventure = array(array());
$seq = 0;

foreach ($tabLigne as $value) {
	$val = $value;

	if ($val[0] == 'c') {
		$val = str_replace(' ', '', $val);
		$val = str_replace(PHP_EOL, '', $val);
		$mapTab = explode('-', $val);


		$mapLigne = $mapTab[2];
		$mapColonne = $mapTab[1];
		if ($check == 0) {
			$map = new map($mapLigne, $mapColonne);
			$map->createMap();
			$check++;
		}

	} elseif ($val[0] == 'm') {
		$val = str_replace(' ', '', $val);
		$val = str_replace(PHP_EOL, '', $val);
		$montagneTab = explode('-', $val);

		$mapLigneM = $montagneTab[2];
		$mapColonneM = $montagneTab[1];

		$map->addMontagne($mapLigneM, $mapColonneM);
	} elseif ($val[0] == 't') {
		$val = str_replace(' ', '', $val);
		$val = str_replace(PHP_EOL, '', $val);
		$tresorTab = explode('-', $val);

		$mapLigneT = $tresorTab[2];
		$mapColonneT = $tresorTab[1];
		$mapNbT = $tresorTab[3];

		$map->addTresor($mapLigneT, $mapColonneT, $mapNbT);
	} elseif ($val[0] == 'g') {
		$val = str_replace(' ', '', $val);
		$val = str_replace(PHP_EOL, '', $val);
		$gobelinTab = explode('-', $val);

		$mapLigneG = $gobelinTab[2];
		$mapColonneG = $gobelinTab[1];
		$lvlG = $gobelinTab[3];
		$nbG = $gobelinTab[4];

		$map->addGobelin($mapLigneG, $mapColonneG, $lvlG, $nbG);
	} elseif ($val[0] == 'o') {
		$val = str_replace(' ', '', $val);
		$val = str_replace(PHP_EOL, '', $val);
		$orcTab = explode('-', $val);

		$mapLigneO = $orcTab[2];
		$mapColonneO = $orcTab[1];
		$lvlO = $orcTab[3];
		$nbO = $orcTab[4];

		$map->addOrc($mapLigneO, $mapColonneO, $lvlO, $nbO);
	} elseif ($val[0] == 'a') {
		$val = str_replace(' ', '', $val);
		$val = str_replace(PHP_EOL, '', $val);
		$aventurierTab = explode('-', $val);


		$aventurierName = $aventurierTab[1];
		$aventurierLigne = $aventurierTab[3];
		$aventurierColonne = $aventurierTab[2];
		$aventurierOrientation = $aventurierTab[4];
		$aventurierMouve = $aventurierTab[5];
				
		$longeurSeq = strlen($aventurierMouve);
		if ($longeurSeq >= $seq) {
			$seq = $longeurSeq;
		}

		$map->addAventurier($aventurierName, $aventurierLigne, $aventurierColonne, $aventurierOrientation, $aventurierMouve);

	}
}


	//$map->mouv($tabAdventure, $sequenceLaPlusLongue);	
$map->afficherMap();

$map->mouvementsAventurier($seq);
echo '<br>';
$map->afficherMap();


?>