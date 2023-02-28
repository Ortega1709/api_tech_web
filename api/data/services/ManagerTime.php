<?php


class ManagerTime
{

	public $now = null;
	public $dateA = null;
	public $heure = null;

	public function __construct()
	{

		// heure du cameroun
		date_default_timezone_set("Africa/Douala");
		$this->now = new DateTime();
	}

	public function getJourDate()
	{

		// $this->now->format('Y-m-d');
		$this->dateA =  $this->now->format('d-m-y');
		return $this->dateA;
	}

	public function getHeure()
	{

		// $this->now->format('Y-m-d');
		$this->heure =  $this->now->format('H:i');
		return $this->heure;
	}
}
 
 
/*  $times = new ManagerTime();
  
  echo "Date Aujourd'hui: ".$times->getJourDate();
  echo "<br>Heure : ".$times->getHeure();
*/
