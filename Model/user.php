<?php

class user
{

    private $id_user;
    private $nom_comp;
    private $adresse_mail;
    private $mdp;
    private $roles;

   

    // Constructor
    public function __construct($nom_comp, $adresse_mail,$mdp,$roles)
    {
        $this->nom_comp= $nom_comp;
        $this->adresse_mail = $adresse_mail;
        $this->mdp = $mdp;
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
  
  public function setNomComp($nom_comp)
   {
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

} 