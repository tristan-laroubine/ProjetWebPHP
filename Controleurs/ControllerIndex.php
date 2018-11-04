<?php
require_once('Views/View.php');
class ControllerIndex
{
	private $_recetteModel;
	private $_view;

	public function __construct($url = null)
	{
	//1 car un seul parametre dans l'URL, dans l'accueil, seulement pour charger le controller
		if(isset($url) && count($url) > 1)
			throw new Exception('Page introuvable');
		else
            $arrayDate=GestionRecette::getRecetteByOrderDate();
        $p=0;
        foreach ($arrayDate as $row)
        {
            $arrayRecette[]=GestionRecette::getRecetteById($row['id']);
            ++$p;
            if($p==10)  { break;}
        }
        $resultFirst=GestionRecette::getRecetteById($arrayDate[0]['id']);
        $connecter = false;
        if (isset($_SESSION['id']))
        {
            $connecter = true;
        }
        $data = GestionRecherche::getRecetteWithDataInEtape("",$connecter);
        $pagination = GestionDataWeb::getValueDataWeb1();
        $arrRelou=[$arrayDate,$arrayRecette,$resultFirst,$data,$pagination];
		$this->_view = new View('Index');
        $this->_view->generate($arrRelou);
	}
}
