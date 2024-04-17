<?php 
include_once "../../config.php";

$Recruiters = getAllchercheur();

function getAllchercheur(){
    $db = config::getConnexion();

    $query = $db->prepare('SELECT * FROM chercheurs');
    $query->execute();
    $chercheurs = $query->fetchAll(PDO::FETCH_ASSOC);
    //print_r($chercheurs);
    return $chercheurs;
}
