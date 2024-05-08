<?php 
include_once "../../config.php";

$allCours = getAllcours();

function getAllcours(){
    $db = config::getConnexion();

    $query = $db->prepare('SELECT * FROM cours');
    $query->execute();
    $cours = $query->fetchAll(PDO::FETCH_ASSOC);
    //print_r($cours);
    return $cours;
}


?>