<?php

class plaine
{
	private $nom;
	 

	public function __construct()
	{
		$this->nom = '.';
		 
	}

	public function print()
	{
		return $this->nom;
	}
}

?>


