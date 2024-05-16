<?php

class cours{
    private $IdCours;
    private $Titre;
    private $Description;
    private $Categorie;
    private $Format;
    private $DatePost;
    private $DateExpir;
    private $Langue;
    private $Prix;
    private $CompetencesAcquises;
    private $Prerequis;
    private $Certification;
    private $IdFormateur;
    private $Support;

    public function getIdCours(){
        return $this->IdCours;
    }
    public function setLIdCours($a){
        $this->IdCours=$a;
    }
    public function getTitre(){
        return $this->Titre;
    }
    public function setTitre($a){
        $this->Titre=$a;
    }
    public function getDescription(){
        return $this->Description;
    }
    public function setDescription($a){
        $this->Description=$a;
    }
    public function getCategorie(){
        return $this->Categorie;
    }
    public function setCategorie($a){
        $this->Categorie=$a;
    }
    public function getFormat(){
        return $this->Format;
    }
    public function setFormat($a){
        $this->Format=$a;
    }
    public function getDatePost(){
        return $this->DatePost;
    }
    public function setDatePost($a){
        $this->DatePost=$a;
    }
    public function getDateExpir(){
        return $this->DateExpir;
    }
    public function setDateExpir($a){
        $this->DateExpir=$a;
    }
    public function getLangue(){
        return $this->Langue;
    }
    public function setLangue($a){
        $this->Langue=$a;
    }
    public function getPrix(){
        return $this->Prix;
    }
    public function setPrix($a){
        $this->Prix=$a;
    }
    public function getCompetencesAcquises(){
        return $this->CompetencesAcquises;
    }
    public function setCompetencesAcquises($a){
        $this->CompetencesAcquises=$a;
    }
    public function getPrerequis(){
        return $this->Prerequis;
    }
    public function setPrerequis($a){
        $this->Prerequis=$a;
    }
    public function getCertification(){
        return $this->Certification;
    }
    public function setCertification($a){
        $this->Certification=$a;
    }
    public function getIdFormateur(){
        return $this->IdFormateur;
    }
    public function setIdFormateur($a){
        $this->IdFormateur=$a;
    }
    public function getSupport(){
        return $this->Support;
    }
    public function setSupport($a){
        $this->Support=$a;
    }
    
    public function __construct ($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n){
        $this->IdCours=$a;
        $this->Titre=$b;
        $this->Description=$c;
        $this->Categorie=$d;
        $this->Format=$e;
        $this->DatePost=$f;
        $this->DateExpir=$g;
        $this->Langue=$h;
        $this->Prix=$i;
        $this->CompetencesAcquises=$j;
        $this->Prerequis=$k;
        $this->Certification=$l;
        $this->IdFormateur=$m;
        $this->Support=$n;
    }

    
}

?>


