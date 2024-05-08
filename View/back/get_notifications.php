<?php


// Inclure la classe Notification
include_once "../../notif.php";

// Créer une instance de la classe de configuration de la base de données
$db = config::getConnexion();

// Requête pour récupérer les notifications
$query = $db->query("SELECT * FROM notif ORDER BY date DESC");

// Récupérer les résultats de la requête sous forme de tableau associatif
$notifications = $query->fetchAll(PDO::FETCH_ASSOC);

// Renvoyer les notifications au format JSON
echo json_encode($notifications);
?>
