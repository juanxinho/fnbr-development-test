<?php
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $areas = $_POST['areas'];
    $programs = $_POST['programs'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $comments = $_POST['comments'];
    $policy_acceptance_check = (($_POST['policy_acceptance_check']=='on') ? 1 : 0);

    if(isset($name) && isset($last_name) && isset($email) && $name!='' && $last_name!='' && $email!=''){
        include 'connection.php';
        $query = "INSERT INTO formulario(name,last_name,email,phone,area_id,program_id,country,state,city,comments,policy_acceptance_check) values('$name','$last_name','$email','$phone','$areas','$programs','$country','$state','$city','$comments',$policy_acceptance_check)";
        echo $query;
        $result = mysqli_query($connect, $query);
        if(!$result){
            die('Query failed.');
        }
        echo 'Form added Successfully.';
        mail($email,'Formulario recibido',"Hola $name, su formulario ha sido recibido.");
    }
    else{
        echo "Revisar, campos imcompletos.";
    }
?>