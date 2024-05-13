<?php

class commentaires
{

    private $id_cc;
    private $commentaire;
    private $id_c;

    // Constructor
    public function __construct($id_cc,$commentaire,$id_c)
    {
        $this->id_cc = $id_cc;
        $this->commentaire = $commentaire;
        $this->id_c = $id_c;

    }

    // Getter and Setter methods...
    function set_id_cc($id_cc)
    {
        $this->id_cc = $id_cc;
    }
    function get_id_cc()
    {
        return $this->id_cc;
    }
    
    function set_commentaire($commentaire)
    {
        $this->commentaire = $commentaire;
    }
    function get_commentaire()
    {
        return $this->commentaire;
    }
    function set_id_c($id_c)
    {
        $this->id_c = $id_c;
    }
    function get_id_c()
    {
        return $this->id_c;
    }
    
}