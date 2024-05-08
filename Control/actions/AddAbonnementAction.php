<?php 
// Inclure le fichier de configuration et la classe Abonnement
include_once "../../config.php";
include_once "../../Model/abonnement.php";

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Récupérer les données du formulaire
    $DateDeb = htmlspecialchars($_POST['DateDeb']);
    $DateFin = htmlspecialchars($_POST['DateFin']);
    $MethodeDePaiement = htmlspecialchars($_POST['MethodeDePaiement']);
    $Prix = htmlspecialchars($_POST['Prix']);

    // Récupérer l'ID du cours depuis l'URL
    $IdCoursA = isset($_GET['idCours']) ? htmlspecialchars($_GET['idCours']) : null;

    // Créer un nouvel objet abonnement avec les données du formulaire
    $NewAbonnement = new Abonnement($DateDeb, $DateFin, $MethodeDePaiement, $Prix, $IdCoursA);

    // Appeler la fonction pour créer l'abonnement dans la base de données
    createAbonnement($NewAbonnement);

    // Rediriger l'utilisateur vers une autre page après avoir ajouté l'abonnement (facultatif)
    header('Location: gerercours.php');
}

// Fonction pour insérer un nouvel abonnement dans la base de données
function createAbonnement(Abonnement $abonnement)
{
    // Requête SQL pour insérer un nouvel abonnement dans la base de données
    $sql = "INSERT INTO abonnements (DateDeb, DateFin, MethodeDePaiement, Prix, IdCoursA) 
            VALUES (:DateDeb, :DateFin, :MethodeDePaiement, :Prix, :IdCoursA)";

    try {
        // Préparer la requête SQL
        $stmt = config::getConnexion()->prepare($sql);

        // Exécuter la requête en liant les valeurs des paramètres
        return $stmt->execute([
            ':DateDeb' => $abonnement->getDateDeb(),
            ':DateFin' => $abonnement->getDateFin(),
            ':MethodeDePaiement' => $abonnement->getMethodeDePaiement(),
            ':Prix' => $abonnement->getPrix(),
            ':IdCoursA' => $abonnement->getIdCoursA()
        ]);
    } catch (PDOException $e) {
        // Gérer les erreurs éventuelles
        echo 'Erreur: ' . $e->getMessage();
    }
}
