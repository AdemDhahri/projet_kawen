<?php
class abonnement{
    private $IdAbonnement;
    //private $IdUser;
    private $IdCours;
    private $DateDeb;
    private $DateFin;
    private $StatutPaiement;
    private $MethodeDePaiement;
    private $Prix;
    private $SommePayee;
    private $SommeRestante;

    public function getIdAbonnement(){
        return $this->IdAbonnement;
    }
    public function setIdAbonnement($a){
        $this->IdAbonnement=$a;
    }
    
    public function getIdCours(){
        return $this->IdCours;
    }
    public function setIdCours($a){
        $this->IdCours=$a;
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
    public function getStatutPaiement(){
        return $this->StatutPaiement;
    }
    public function setStatutPaiement($a){
        $this->StatutPaiement=$a;
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
    public function getSommePayee(){
        return $this->SommePayee;
    }
    public function setSommePayee($a){
        $this->SommePayee=$a;
    }
    public function getSommeRestante(){
        return $this->SommeRestante;
    }
    public function setSommeRestante($a){
        $this->SommeRestante=$a;
    }

    public function __construct($b, $c, $d, $e, $f, $g, $h, $i) {
        $this->DateDeb = $b;
        $this->DateFin = $c;
        $this->StatutPaiement = $d;
        $this->MethodeDePaiement = $e;
        $this->Prix = $f;
        $this->SommePayee = $g;
        $this->SommeRestante = $h;
        $this->IdCours = $i;
    }
}
?>
