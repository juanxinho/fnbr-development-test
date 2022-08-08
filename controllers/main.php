<?php

class Main extends Controller{

    public function __construct(){
        parent::__construct();
        $this->view->areas = [];
        $this->view->coutries = [];
        $this->view->msg = '';
    }

    public function render($msg = 'a'){
        $areas = $this->model->listAreas();
        $countries = $this->model->listCountries();
        $this->view->areas = $areas;
        $this->view->countries = $countries;
        $this->view->msg = $this->view->showMessage($msg);
        $this->view->render('main/index');
    }

    public function loadPrograms(){
        $data = [];
        if (isset($_POST['idArea'])) 
        {
            $idArea = $_POST['idArea'];
            $data = $this->model->listPrograms($idArea);
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function loadStates(){
        $data = [];
        if (isset($_POST['idCountry'])) 
        {
            $idCountry = $_POST['idCountry'];
            $data = $this->model->listStates($idCountry);
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function loadCities(){
        $data = [];
        if (isset($_POST['idCities'])) 
        {
            $idCities = $_POST['idCities'];
            $data = $this->model->listCities($idCities);
        }

        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    public function save()
    {
        //require 'domain/mainD.php'; 
        if (!empty($_POST['area'] && $_POST['programs'] && $_POST['name'] 
        && $_POST['lastname'] && $_POST['email'] && $_POST['phone'] 
        && $_POST['country'] && $_POST['state'] && $_POST['city'] && $_POST['terms'])) {
            
            $mainD = new MainD();

            $mainD->setIdArea($_POST['area']);
            $mainD->setIdPrograms($_POST['programs']);
            $mainD->setUsername($_POST['name']);
            $mainD->setLastname($_POST['lastname']);
            $mainD->setEmail($_POST['email']);
            $mainD->setPhone($_POST['phone']);
            $mainD->setComments($_POST['comments']);
            $mainD->setIdCountry($_POST['country']);
            $mainD->setIdState($_POST['state']);
            $mainD->setIdCity($_POST['city']);
            $mainD->setTerms($_POST['terms']);

            if ($this->model->save($mainD)) {
                $a = "success";
            }else{
                $a = "error";
            }
            
            $this->render($a);
        }

    }
}

?>