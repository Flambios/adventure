<?php

class tresor
{
    private $nom ;
    private $nombre;

    public function __construct($nb)
    {
        $this->nom = 'T';
        $this->nombre =$nb ;
    }

    public function print()
    {
        return $this->nom;
        //return $this->nom . "(" . $this->nombre . ")"; 
    } 

    


}

?>