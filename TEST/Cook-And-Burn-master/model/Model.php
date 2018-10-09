<?php
// CLASSE ABSTRAITE
// METHODE QUE L'ON UTILISERA SOUVENT
// ETEND D'AUTRE CLASSE
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
		self::$_bdd = new PDO('mysql:host=mysql-cookandburn-gxaj.alwaysdata.net;dbname=cookandburn-gxaj_g2;charset=utf8','167602', 'barbecue2018');
		//self::$_bdd->setAtribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
	}

	//RECUPERATION DE LA CONNEXION A LA BDD;
	protected function getBdd()
	{
		if(self::$_bdd == null)
			self::setBdd();
		return self::$_bdd;
	}

	// RECUP TOUS LES ELEMENTS DE LA TABLE POUR L'OBJET
	protected function getAll($table, $obj)
	{
	  $var = [];
	  $req = $this->getBdd()->prepare('SELECT * FROM '.$table. ' ORDER BY id asc');
	  $req->execute();
	  while($data = $req->fetch(PDO::FETCH_ASSOC))
	  {
		$var[] = new $obj($data);
	  }
	  return $var;
	  $req->closeCursor();
	}

}
