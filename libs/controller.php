<?php

class Controller{

    function __construct(){
        //echo "<p>Controlador base</p>";
        $this->view = new View();
    }

    public function loadDomain($domain)
    {
        $url = 'domain/' . $domain . 'D.php';

        if (file_exists($url)) 
        {
            require_once $url;
        }
    }

    function loadModel($model){
        $url = 'modells/'.$model.'model.php';

        $this->loadDomain($model);

        if(file_exists($url)){
            require $url;

            $modelName = $model.'Model';
            $this->model = new $modelName();
        }
    }
}

?>