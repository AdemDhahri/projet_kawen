<?php
include '../../Model/offre.php';
include '../../Control/jobControl.php';
include '../../Model/condidature.php';
include '../../Control/condidaControl.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'ID de l'offre est présent dans les données postées
    if (isset($_POST['offer_id'])) {
        // Récupérer l'ID de l'offre à partir des données postées
        $cin = $_POST['offer_id'];

        // Créer une instance de la classe JobControl
        $jobController = new JobControl();

        // Récupérer les détails de l'offre en utilisant son ID
        $offer = $jobController->getOffreById($cin);

        // Vérifier si l'offre existe
        if ($offer) {
            // Exporter les données au format CSV
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="offre_data.csv"');

            // Ouvrir le flux de sortie avec "w" pour écrire dans le flux sans effacer le contenu existant
            $output = fopen('php://output', 'w');

            // Écrire les en-têtes du CSV
            fputcsv($output, array('Titre', 'Description', 'Niveau', 'Date de publication', 'Email du recruteur', 'Horaire', 'Salaire', 'Localisation', 'Nombre de places disponibles'));

            // Écrire les données de l'offre dans le CSV
            fputcsv($output, array($offer['titre'], $offer['description'], $offer['niveau'], $offer['date_p'], $offer['email_r'], $offer['horaire'], $offer['salaire'], $offer['localisation'], $offer['nbrP']));

            // Fermer le flux de sortie
            fclose($output);

            exit;
        } else {
            // Si l'offre n'existe pas, vous pouvez afficher un message d'erreur ou rediriger l'utilisateur
            echo "L'offre n'existe pas.";
            exit;
        }
    }
}
?>