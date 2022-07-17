<?php

    $servidor = $_ENV['DB_HOST'];
    $usuario = $_ENV['DB_USERNAME'];
    $contrasena = $_ENV['DB_PASSWORD'];
    $db = $_ENV['DB_DATABASE'];


    $conexion = new mysqli($servidor, $usuario, $password);

    if($conexion->connect_error){
        $sendDB = false;
        die("Conexion Fallida " . $conexion->connect_error);
    }else{
        $sqlCreateDB = "CREATE database IF NOT exists $db";
        $conexion->query($sqlCreateDB);

        $conexion = new mysqli($servidor, $usuario, $password, $db);
        $sqlCreateTable = "CREATE TABLE IF NOT exists `$db`.`register_form` (`id` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(50) NOT NULL , `lastName` VARCHAR(50) NOT NULL , `area` VARCHAR(500) NOT NULL , `program` VARCHAR(500) NOT NULL , `email` VARCHAR(50) NOT NULL , `phone` VARCHAR(50) NOT NULL , `country` VARCHAR(50) NOT NULL , `state` VARCHAR(50) NOT NULL , `city` VARCHAR(50) NOT NULL , `comment` VARCHAR(500) NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";

        $conexion->query($sqlCreateTable);
        

        $sqlInsert = "INSERT INTO `register_form` (`id`, `name`, `LastName`, `area`, `program`, `email`, `phone`, `country`, `state`, `city`, `comment`) VALUES (NULL, '$name', '$lastName', '$area', '$program', '$email', '$phone', '$country', '$state', '$city', '$comment')";



        $conexion ->query($sqlInsert);
        $sendDB = true;
    }
?>