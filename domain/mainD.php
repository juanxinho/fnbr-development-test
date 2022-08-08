<?php

class MainD
{
    private $idUser;
    private $username;
    private $lastname;
    private $email;
    private $phone;
    private $comments;
    private $idArea;
    private $idPrograms;
    private $idCountry;
    private $idState;
    private $idCity;
    private $terms;

    public function __construct() 
    {
        $this->idUser         = 0;
        $this->username       = '';
        $this->lastname       = '';
        $this->email          = '';
        $this->phone          = '';
        $this->comments       = '';
        $this->idArea         = 0;
        $this->idPrograms     = 0;
        $this->idCountry      = 0;
        $this->idState        = 0;
        $this->idCity         = 0;
        $this->terms          = '';
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     */ 
    public function setUsername($username)
    {
        $this->username = $username;
    }

    /**
     * Get the value of lastname
     */ 
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set the value of lastname
     */ 
    public function setLastname($lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     */ 
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * Get the value of phone
     */ 
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set the value of phone
     */ 
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * Set the value of commments
     */ 
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    /**
     * Get the value of commments
     */ 
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Get the value of idArea
     */ 
    public function getIdArea()
    {
        return $this->idArea;
    }

    /**
     * Set the value of idArea
     */ 
    public function setIdArea($idArea)
    {
        $this->idArea = $idArea;
    }

    /**
     * Get the value of idPrograms
     */ 
    public function getIdPrograms()
    {
        return $this->idPrograms;
    }

    /**
     * Set the value of idPrograms
     */ 
    public function setIdPrograms($idPrograms)
    {
        $this->idPrograms = $idPrograms;
    }

    /**
     * Get the value of idCountry
     */ 
    public function getIdCountry()
    {
        return $this->idCountry;
    }

    /**
     * Set the value of idCountry
     */ 
    public function setIdCountry($idCountry)
    {
        $this->idCountry = $idCountry;
    }

    /**
     * Get the value of idState
     */ 
    public function getIdState()
    {
        return $this->idState;
    }

    /**
     * Set the value of idState
     */ 
    public function setIdState($idState)
    {
        $this->idState = $idState;
    }

    /**
     * Get the value of idCity
     */ 
    public function getIdCity()
    {
        return $this->idCity;
    }

    /**
     * Set the value of idCity
     */ 
    public function setIdCity($idCity)
    {
        $this->idCity = $idCity;
    }

    /**
     * Get the value of terms
     */ 
    public function getTerms()
    {
        return $this->terms;
    }

    /**
     * Set the value of terms
     */ 
    public function setTerms($terms)
    {
        $this->terms = $terms;
    }
}

?>