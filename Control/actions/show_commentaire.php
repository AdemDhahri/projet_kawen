<?php 
include_once "../../config.php";

$comment = getAllcomment();

function getAllcomment(){
    $db = config::getConnexion();

    $query = $db->prepare('SELECT * FROM commentaires where id_c = ?');
    $query->execute(array($_GET['id']));
    $commentaires = $query->fetchAll(PDO::FETCH_ASSOC);
    return $commentaires;
}
