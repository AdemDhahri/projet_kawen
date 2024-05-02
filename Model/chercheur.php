<?php

class chercheurs
{

    private $id_c;
    private $nom;
    private $prenom;
    private $mail;
    private $tel;
    private $ville;
    private $cv;
    private $l_d_v;
    private $message;


    // Constructor
    public function __construct($id_c,$nom,$prenom, $mail,$tel,$ville,$cv,$LDM,$message)
    {
        $this->id_c = $id_c;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->mail = $mail;
        $this->tel =$tel;
        $this->ville =$ville;
        $this->cv = $cv;
        $this->l_d_v = $LDM;
        $this->message = $message;


    }

    // Getter and Setter methods...
    function set_id_c($id_c)
    {
        $this->id_c = $id_c;
    }
    function get_id_c()
    {
        return $this->id_c;
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

    function set_mail($mail)
    {
        $this->mail = $mail;
    }

    function get_mail()
    {
        return $this->mail;
    }

    function set_tel($tel)
    {
        $this->tel = $tel;
    }

    function get_ville()
    {
        return $this->ville;
    }
    function set_ville($ville)
    {
        $this->ville = $ville;
    }

    function get_tel()
    {
        return $this->tel;
    }

    function set_cv($cv)
    {
        $this->cv = $cv;
    }

    function get_cv()
    {
        return $this->cv;
    }

    function set_l_d_v($l_d_v)
    {
        $this->l_d_v = $l_d_v;
    }
    function get_l_d_v()
    {
        return $this->l_d_v;
    }
    function set_message($message)
    {
        $this->message = $message;
    }
    function get_message()
    {
        return $this->message;
    }
   
    
}