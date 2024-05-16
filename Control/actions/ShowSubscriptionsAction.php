<?php 
include_once "../../config.php";

$allAbonnments = getAllabonnements();

function getAllabonnements(){
    $db = config::getConnexion();

    $query = $db->prepare('SELECT * FROM abonnements');
    $query->execute();
    $abonnement = $query->fetchAll(PDO::FETCH_ASSOC);
    //print_r($abonnement);
    return $abonnement;
}


