<?php

class MainModel extends Model
{
    public function __construct(){
        parent::__construct();
    }

    public function listAreas()
    {
        try {
            $items = [];
            $query = $this->db->connect()->prepare("SELECT id_area, name_area FROM areas");
            $query->execute();

            while ($row = $query->fetch()) {
                $item = [];
                $item['id_area'] = $row['id_area'];
                $item['name_area'] = $row['name_area'];

                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listPrograms($idAreas)
    {

        try {
            $items = [];
            $query = $this->db->connect()->prepare("SELECT id_program, name_program FROM programs WHERE id_area = :idArea");
            $query->execute(['idArea' => $idAreas]);

            while ($row = $query->fetch()) {
                $item = [];
                $item['id_program'] = $row['id_program'];
                $item['name_program'] = $row['name_program'];
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return false;
        }

    }

    public function listCountries()
    {
        try {
            $items = [];
            $query = $this->db->connect()->prepare("SELECT id, name FROM countries");
            $query->execute();

            while ($row = $query->fetch()) {
                $item = [];
                $item['id_country'] = $row['id'];
                $item['name_country'] = $row['name'];
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listStates($idCountry)
    {
        try {
            $items = [];
            $query = $this->db->connect()->prepare("SELECT id, name FROM states WHERE country_id = :id_country");
            $query->execute(['id_country' => $idCountry]);

            while ($row = $query->fetch()) {
                $item = [];
                $item['id_state'] = $row['id'];
                $item['name_state'] = $row['name'];
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function listCities($idStates)
    {
        try {
            $items = [];
            $query = $this->db->connect()->prepare("SELECT id, name FROM cities WHERE state_id = :id_states");
            $query->execute(['id_states' => $idStates]);

            while ($row = $query->fetch()) {
                $item = [];
                $item['id_city'] = $row['id'];
                $item['name_city'] = $row['name'];
                array_push($items, $item);
            }

            return $items;
        } catch (PDOException $e) {
            return false;
        }
    }

    public function save(MainD $mainD)
    {
        $username = $mainD->getUsername();
        $lastname = $mainD->getLastname();
        $email = $mainD->getEmail();
        $phone = $mainD->getPhone();
        $term = $mainD->getTerms();
        $comment = $mainD->getComments();
        $idArea = $mainD->getIdArea();
        $idPrograms = $mainD->getIdPrograms();
        $idCountry = $mainD->getIdCountry();
        $idStates = $mainD->getIdState();
        $idCity = $mainD->getIdCity();

        try {
            $query = $this->db->connect()->prepare("CALL form_request.register_user_form(
                :username, :lastname, :email, :phone, :term, :comment, :id_area, 
                :id_program, :id_country, :id_state, :id_city)");
            $query->bindParam(':username', $username, PDO::PARAM_STR);
            $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':phone', $phone, PDO::PARAM_STR);
            $query->bindParam(':term', $term, PDO::PARAM_STR);
            $query->bindParam(':comment', $comment, PDO::PARAM_STR);
            $query->bindParam(':id_area', $idArea, PDO::PARAM_INT);
            $query->bindParam(':id_program', $idPrograms, PDO::PARAM_INT);
            $query->bindParam(':id_country', $idCountry, PDO::PARAM_INT);
            $query->bindParam(':id_state', $idStates, PDO::PARAM_INT);
            $query->bindParam(':id_city', $idCity, PDO::PARAM_INT);

            if($query->execute()){
                return true;
            }else {
                return false;
            }
        } catch (PDOException $e) {
            return false;
        }
    }
}

?>