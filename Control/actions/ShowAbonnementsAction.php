<?php 
include_once "../../config.php";

$allAbonnements = getAllabonnements();

function getAllabonnements(){
    $db = config::getConnexion();

    $query = $db->prepare('SELECT * FROM abonnements');
    $query->execute();
    $abonnements = $query->fetchAll(PDO::FETCH_ASSOC);
    //print_r($cours);
    return $abonnements;
}


?>