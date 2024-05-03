<?php

class Condidature
{

    private $CIN;
    private $nom;
    private $prenom;
    private $email;
    private $phone;
    private $cv;

    private $competence;

    private $etat_C;
   

    // Constructor
    public function __construct($CIN, $nom, $prenom,$email,$phone,$cv,$competence,$etat_C)
    {
        $this->CIN = $CIN;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->email = $email;
        $this->phone = $phone;
        $this->cv = $cv;
        $this->competence = $competence;
        $this->etat_C =$etat_C;
     
    }

    // Getter and Setter methods...
    function set_CIN($CIN)
    {
        $this->CIN = $CIN;
    }
    function get_CIN()
    {
        return $this->CIN;
    }
    function set_nom($nom)
    {
        $this->nom = $nom;
    }
    function get_nom()
    {
        return $this->nom;
    }
    function set_prenom($prenom)
    {
        $this->prenom = $prenom;
    }
    function get_prenom()
    {
        return $this->prenom;
    }

    function set_email($email)
    {
        $this->email = $email;
    }

    function get_email()
    {
        return $this->email;
    }

    function set_phonen($phone)
    {
        $this->phone = $phone;
    }

    function get_phone()
    {
        return $this->phone;
    }

    function set_cv($cv)
    {
        $this->cv = $cv;
    }

    function get_cv()
    {
        return $this->cv;
    }

    function set_competence($competence)
    {
        $this->competence = $competence;
    }

    function get_competence()
    {
        return $this->competence;
    }

    function set_etat_C($etat_C)
    {
        $this->etat_C = $etat_C;
    }

    function get_etat_C()
    {
        return $this->etat_C;
    }

    
}
