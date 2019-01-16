<?php

class aventurier
{
    private $nom;
    private $prenom;
    private $ligne;
    private $colonne;
    private $nouvelleLigne;
    private $nouvelleColonne;
    private $orientation;
    public $mouvement;


    public function __construct($prenomAventurier, $ligneAventurier, $colonneAventurier, $orientationAventurier, $mouvementAventurier)
    {
        $this->nom = 'A';
        $this->prenom = $prenomAventurier;
        $this->ligne = $ligneAventurier;
        $this->colonne = $colonneAventurier;
        $this->orientation = $orientationAventurier;
        $this->mouvement = $mouvementAventurier;
    }

    public function bougerAventurier()
    {

        if ($this->orientation == 'S') // SI DIRECTION SUD
        {


            if ($this->mouvement[0] == 'D') {
                $this->orientation = 'O';
                $this->mouvement = substr($this->mouvement, 1);
                

            } elseif ($this->mouvement[0] == 'G') {
                $this->orientation = 'E';
                $this->mouvement = substr($this->mouvement, 1);
                
            } elseif ($this->mouvement[0] == 'A') {
                $this->nouvelleLigne = strval($this->ligne + 1);
                $this->nouvelleColonne = $this->colonne;
                $this->mouvement = substr($this->mouvement, 1);
                $retour = array(array($this->nouvelleLigne, $this->nouvelleColonne), array($this->ligne, $this->colonne));
                return $retour;
            }



        } elseif ($this->orientation == 'N')  //SI DIRECTION NORD
        {


            if ($this->mouvement[0] == 'D') {
                $this->orientation = 'E';
                $this->mouvement = substr($this->mouvement, 1);
                
            } elseif ($this->mouvement[0] == 'G') {
                $this->orientation = 'O';
                $this->mouvement = substr($this->mouvement, 1);
                
            } elseif ($this->mouvement[0] == 'A') {
                $this->nouvelleLigne = strval($this->ligne - 1);
                $this->nouvelleColonne = $this->colonne;
                $this->mouvement = substr($this->mouvement, 1);
                $retour = array(array($this->nouvelleLigne, $this->nouvelleColonne), array($this->ligne, $this->colonne));
                return $retour;
            }

        } elseif ($this->orientation == 'E') // SI DIRECTION EST
        {


            if ($this->mouvement[0] == 'D') {
                $this->orientation = 'S';
                $this->mouvement = substr($this->mouvement, 1);
                
            } elseif ($this->mouvement[0] == 'G') {
                $this->orientation = 'N';
                $this->mouvement = substr($this->mouvement, 1);
                
            } elseif ($this->mouvement[0] == 'A') {
                $this->nouvelleLigne = $this->ligne;
                $this->nouvelleColonne = strval($this->colonne + 1);
                $this->mouvement = substr($this->mouvement, 1);
                $retour = array(array($this->nouvelleLigne, $this->nouvelleColonne), array($this->ligne, $this->colonne));
                return $retour;
            }

        } elseif ($this->orientation == 'O') //SI DIRECTION OUEST
        {
            if ($this->mouvement[0] == 'D') {
                $this->orientation = 'N';
                $this->mouvement = substr($this->mouvement, 1);
            } elseif ($this->mouvement[0] == 'G') {
                $this->orientation = 'S';
                $this->mouvement = substr($this->mouvement, 1);
            } elseif ($this->mouvement[0] == 'A') {
                $this->nouvelleLigne = $this->ligne;
                $this->nouvelleColonne = strval($this->colonne - 1);
                $this->mouvement = substr($this->mouvement, 1);
                $retour = array(array($this->nouvelleLigne, $this->nouvelleColonne), array($this->ligne, $this->colonne));
                return $retour;
            }

        }
    }

    public function saveMove()
    {
        $this->ligne = $this->nouvelleLigne;
        $this->colonne = $this->nouvelleColonne;
    }

    public function noSaveMove()
    {
        $this->nouvelleLigne = $this->ligne;
        $this->nouvelleColonne = $this->colonne;
    }

    public function print()
    {
        return $this->nom . "(" . $this->prenom . ")";
    }
}

?>