<?php

class Offre
{

    private $id_o;
    private $titre;
    private $email_r;
    private $salaire;
    private $localisation;
    private $horaire;
    private $description;
    private $niveau;
    private $date_p;

    // Constructor
    public function __construct($titre, $email_r, $salaire, $localisation, $horaire, $description, $niveau, $date_p)
    {
        $this->titre = $titre;
        $this->email_r = $email_r;
        $this->salaire = $salaire;
        $this->localisation = $localisation;
        $this->horaire = $horaire;
        $this->description = $description;
        $this->niveau = $niveau;
        $this->date_p = $date_p;
    }

    // Getter and Setter methods...
    function set_id_o($id_o)
    {
        $this->id_o = $id_o;
    }
    function get_id_o()
    {
        return $this->id_o;
    }
    function set_titre($titre)
    {
        $this->titre = $titre;
    }
    function get_titre()
    {
        return $this->titre;
    }
    function set_email_r($email_r)
    {
        $this->email_r = $email_r;
    }

    function get_email_r()
    {
        return $this->email_r;
    }

    function set_salaire($salaire)
    {
        $this->salair = $salaire;
    }

    function get_salaire()
    {
        return $this->salaire;
    }

    function set_localisation($localisation)
    {
        $this->localisation = $localisation;
    }

    function get_localisation()
    {
        return $this->localisation;
    }

    function set_horaire($horaire)
    {
        $this->horaire = $horaire;
    }

    function get_horaire()
    {
        return $this->horaire;
    }

    function set_description($description)
    {
        $this->description = $description;
    }
    function get_description()
    {
        return $this->description;
    }
    function set_niveau($niveau)
    {
        $this->niveau = $niveau;
    }
    function get_niveau()
    {
        return $this->niveau;
    }
    function set_date_p($date_p)
    {
        $this->date_p = $date_p;
    }
    function get_date_p()
    {
        return $this->date_p;
    }
}
