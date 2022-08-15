<?php
    include 'connection.php';
    $caso = $_POST['caso'];
    if($caso == 'areas'){
        $query = "SELECT * FROM areas WHERE estado = 'A'";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die('Query failed.');
        }
        $json = array();
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' => $row['id'],
                'description' => $row['description']
            );
        }
        $jsonstring = json_encode($json);    
        echo $jsonstring;
    }
    else
    {
        $area_id = $_POST['area_id'];
        $query = "SELECT * FROM programas WHERE area_id = $area_id AND estado = 'A'";
        $result = mysqli_query($connect, $query);
        if(!$result){
            die('Query failed.');
        }
        $json = array();
        while ($row = mysqli_fetch_array($result)) {
            $json[] = array(
                'id' => $row['id'],
                'description' => $row['description']
            );
        }
        $jsonstring = json_encode($json);    
        echo $jsonstring;
    }
?>