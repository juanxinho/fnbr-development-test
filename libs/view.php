<?php

class View{

    function __construct(){
        //echo "<p>Vista base</p>";
    }

    function render($nombre){
        require 'views/' . $nombre . '.php';
    }

    public function showMessage(String $a)
    {
        if ($a == 'success') {
            $alert = '<div class="form__message-success form__message-success-active" id="form__message-success">
                        <strong>Form enviado correctamente</strong>
                    </div>';
        }elseif ($a == 'error'){
            $alert = '<div class="form__message form__message-active">
                        <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
                    </div>';
        }else {
            $alert = '';
        }

        return $alert;
    }
}

?>