<?php

class gobelin
{
    private $nom;
    private $lvl;
    private $nbD;

    public function __construct($lvl, $nbD)
    {
        $this->nom = 'G';
        $this->lvl = $lvl;
        $this->nbD = $nbD;

    }

    public function print()
    {
        return $this->nom;
    }




}

?>