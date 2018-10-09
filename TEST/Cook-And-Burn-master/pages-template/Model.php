<?php

abstract class Model
{
	private static $_bdd;
	private $servername = "mysql-cookandburn-gxaj.alwaysdata.net";
	private $username = "167602";
	private $password = "barbecue2018";
	private $dbname = "cookandburn-gxaj_g2";
	//INSTANCIATION DE LA CONNEXION A LA BDD
	private static function setBdd()
	{
		self::$_bdd = new PDO('mysql:host=$servername;dbname=$dbname;charset=utf8', $username, $password);
		self::$_bdd->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}
	
	//RECUPERATION DE LA CONNEXION A LA BDD;
	protected function getBdd()
	{
		if(self::$_bdd == null)
			self::setBdd();
		return self::$_bdd;
	}
	
	protected function getAll($table, $obj)
	{
	  $var = [];
	  $req = $this->getBdd()->prepare('SELECT * FROM'.$table. 'ORDER BY id desc');
	  $req->execute();
	  while($data = $req->fetch(PDO::FETCH_ASSOC))
	  {
		$var[] = new $obj($data);
	  }
	  return $var;
	  $req->closeCursor();
	}
	
}


?>

