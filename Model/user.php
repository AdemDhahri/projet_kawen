<?php

class user
{

    private $id_user;
    private $nom_comp;
    private $adresse_mail;
    private $mdp;
    private $rep1;
    private $rep2;
    private $rep3;
    private $roles;

   

    // Constructor
    public function __construct($nom_comp, $adresse_mail,$mdp, $rep1, $rep2, $rep3,$roles)
    {
        $this->nom_comp= $nom_comp;
        $this->adresse_mail = $adresse_mail;
        $this->mdp = $mdp;
        $this->rep1= $rep1;
        $this->rep2 = $rep2;
        $this->rep3 = $rep3;
        $this->roles =$roles;
    }

    // Getter and Setter methods...
   function set_id_user($id_user)
    {
       $this->id_user = $id_user;
   }
   function get_id_user()
   {
       return $this->id_user;
    }
  
  public function set_roles($roles)
  {
      $this->roles= $roles;
  }
  function get_roles()
  {
      return $this->roles;
  }
  
  public function setNomComp($nom_comp) {
    $this->nom_comp = $nom_comp;
}

    function get_nom_comp()
{
    return $this->nom_comp;
}

    function set_adresse_mail($adresse_mail)
    {
        $this->adresse_mail= $adresse_mail;
    }

    function get_adresse_mail()
    {
        return $this->adresse_mail;
    }

    function set_mdp($mdp)
    {
        $this->mdp = $mdp;
    }

    function get_mdp()
    {
        return $this->mdp;
    }

    function get_rep1()
    {
        return $this->rep1;
    }

    function set_rep1($rep1)
    {
        $this->rep1 = $rep1;
    }
    function get_rep2()
    {
        return $this->rep2;
    }

    function set_rep2($rep2)
    {
        $this->rep2 = $rep2;
    }
    function get_rep3()
    {
        return $this->rep3;
    }

    function set_rep3($rep3)
    {
        $this->rep3 = $rep3;
    }

    
}
