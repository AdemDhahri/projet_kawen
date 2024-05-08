<?php
// Inclure le fichier de configuration de la base de données
require_once '../../config.php';

// Vérifier si le paramètre de tri est passé via le formulaire GET
if(isset($_GET['tri'])) {
    // Récupérer la valeur du tri
    $tri = $_GET['tri'];

    // Valider la valeur du tri
    if($tri == 'asc' || $tri == 'desc') {
        // Requête SQL pour sélectionner les cours triés par date de publication
        $sql = "SELECT * FROM cours ORDER BY DatePost $tri";

        // Exécuter la requête
        $stmt = config::getConnexion()->query($sql);

        // Récupérer les résultats de la requête
        $cours = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Inclure la vue pour afficher les cours triés
        include '../../View/back/blank.php';
    } else {
        // Redirection en cas de valeur de tri invalide
        header("Location: ../../View/back/blank.php");
        exit();
    }
} else {
    // Redirection en cas de paramètre de tri manquant
    header("Location: ../../View/back/blank.php");
    exit();
}
