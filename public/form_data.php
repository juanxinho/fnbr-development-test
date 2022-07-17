<?php

require '../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable('../');
$dotenv->load();

$name = $_POST['name'];
$lastName = $_POST['lastName'];
$area = $_POST['selArea'];
$program = $_POST['selProgram'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$country = $_POST['selCountry'];
$state = $_POST['selState'];
$city = $_POST['selCity'];
$comment = $_POST['comment'];
$program = str_replace("'", '\\\'', $program );

$datos = [
    "name" => $name,
    "lastName" => $name,
    "area" => $area,
    "program" => $program,
    "email" => $email,
    "phone" => $phone,
    "country" => $country,
    "state" => $state,
    "city" => $city,
    "comment" => $comment,
];
?>