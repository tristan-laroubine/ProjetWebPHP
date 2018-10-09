<?php
require_once('view/View.php');
class ControllerIndex
{
	private $_recetteModel;
	private $_view;

	public function __construct($url)
	{
	//1 car un seul parametre dans l'URL, dans l'accueil, seulement pour charger le controller
		if(isset($url) && count($url) > 1)
			throw new Exception('Page introuvable');
		else
			$this->recette();
	}

	private function recette()
	{
		$this->_recetteModel = new TopRecetteModel();
		$recette = $this->_recetteModel->getRecettes();

		$this->_view = new View('Index');
		$this->_view->generate(array('recette' => $recette));
	}
}
