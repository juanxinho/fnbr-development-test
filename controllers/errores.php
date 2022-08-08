<?php

class Errores extends Controller{

    function __construct(){
        parent::__construct();
        $this->view->mensaje="Hubo un problema al cargar la pagina o no existe";
        $this->view->render("errores/index");
    }
}

?>