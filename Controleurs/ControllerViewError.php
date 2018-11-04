<?php
require_once('Views/View.php');
class ControllerViewError
{


    public function erreur($param = [])
    {

        $data = [];

        if (isset($param[0])) {
            $data['erreur']  = $param[0];
        }

        $this->_view = new View('Error');
        $this->_view->generate($data);
    }
}
