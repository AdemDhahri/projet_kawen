<?php
// Inclure le fichier de configuration de la base de données
require_once '../../config.php';

// Obtenir la connexion PDO en appelant la méthode statique getConnexion() de la classe config
$pdo = config::getConnexion();

// Vérifier si l'ID du cours est soumis via le formulaire
if(isset($_POST['idCours'])) {
    // Récupérer l'ID du cours depuis le formulaire
    $idCours = $_POST['idCours'];

    // Requête SQL pour sélectionner les abonnements pour ce cours
    $sql = "SELECT * FROM abonnements WHERE IdCoursA = :idCours";

    // Préparer la requête
    $stmt = $pdo->prepare($sql);

    // Liaison des paramètres
    $stmt->bindParam(':idCours', $idCours, PDO::PARAM_INT);

    // Exécuter la requête
    $stmt->execute();

    // Récupérer les résultats de la requête
    $abonnements = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Transmettre les résultats à la vue
    include '../../View/back/abonnements.php';
}
