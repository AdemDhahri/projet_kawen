<?php
// Inclure le fichier de configuration
require_once('../../config.php');

// Fonction pour récupérer les abonnements pour une page donnée
function getAbonnementsPage($page, $abonnementsParPage) {
    // Connexion à la base de données
    $pdo = config::getConnexion();

    // Calculer l'offset
    $offset = ($page - 1) * $abonnementsParPage;

    // Requête SQL pour récupérer les abonnements pour la page actuelle
    $sql = "SELECT * FROM abonnements LIMIT :offset, :limit";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
    $stmt->bindParam(':limit', $abonnementsParPage, PDO::PARAM_INT);
    $stmt->execute();
    
    // Retourner les abonnements récupérés
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour obtenir le nombre total de pages
function getNombreDePages($abonnementsParPage) {
    // Connexion à la base de données
    $pdo = config::getConnexion();

    // Requête SQL pour compter le nombre total d'abonnements
    $sql = "SELECT COUNT(*) AS total FROM abonnements";
    $stmt = $pdo->query($sql);
    $totalAbonnements = $stmt->fetchColumn();

    // Calculer le nombre total de pages
    $nombreDePages = ceil($totalAbonnements / $abonnementsParPage);

    return $nombreDePages;
}
?>
