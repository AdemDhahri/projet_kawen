<?php
class abonnement{
    private $IdAbonnement;
    //private $IdUser;
    private $DateDeb;
    private $DateFin;
    private $MethodeDePaiement;
    private $Prix;
    private $IdCoursA;


    public function getIdAbonnement(){
        return $this->IdAbonnement;
    }
    public function setIdAbonnement($a){
        $this->IdAbonnement=$a;
    }
    
    public function getIdCoursA(){
        return $this->IdCoursA;
    }
    public function setIdCoursA($a){
        $this->IdCoursA=$a;
    }
    public function getDateDeb(){
        return $this->DateDeb;
    }
    public function setDateDeb($a){
        $this->DateDeb=$a;
    }
    public function getDateFin(){
        return $this->DateFin;
    }
    public function setDateFin($a){
        $this->DateFin=$a;
    }
   
    public function getMethodeDePaiement(){
        return $this->MethodeDePaiement;
    }
    public function setMethodeDePaiement($a){
        $this->MethodeDePaiement=$a;
    }
    public function getPrix(){
        return $this->Prix;
    }
    public function setPrix($a){
        $this->Prix=$a;
    }
    
    public function __construct($b, $c, $d, $e, $f) {
        // Ne pas initialiser $IdAbonnement ici, pour permettre à la base de données de le générer automatiquement
        $this->DateDeb = $b;
        $this->DateFin = $c;
        $this->MethodeDePaiement = $d;
        $this->Prix = $e;
        $this->IdCoursA = $f;
    }
    
}
?>
