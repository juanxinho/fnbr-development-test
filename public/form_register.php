<?php 
    if(isset($_POST)){

        include("form_data.php");
        include("send_bd.php");
        include("send_email.php");

        $res = [
            "err" => false,
            "message" => $datos,
            "sendDB" => $sendDB,
            "sendMail" => $sendMail,
        ];


        header("Content-type: application/json");
        echo json_encode($res);
    }

?>