<?php 
include_once "../../config.php";
// Include the definition of the Offre class if not already included
// include_once "Path_to_Offre_class.php";

function updateAbonnement(string $id, abonnement $AbonnementDetails) {
    // SQL query to update the job offer in the database
    $sql = "UPDATE abonnements
            SET    DateDeb = :DateDeb, DateFin= :DateFin ,
            StatutPaiement = :StatutPaiement, MethodeDePaiement = :MethodeDePaiement, Prix = :Prix ,SommePayee = :SommePayee ,
            SommeRestante = :SommeRestante ,IdCours = :IdCours
            WHERE IdAbonnement = :id";

    try {
        // Prepare the SQL query
        $stmt = config::getConnexion()->prepare($sql);

        // Execute the query with parameter values
        return $stmt->execute([
            ':IdCours' => $AbonnementDetails->getIdCours(),
            ':DateDeb' => $AbonnementDetails->getDateDeb(),
            ':DateFin' => $AbonnementDetails->getDateFin(),
            ':StatutPaiement' => $AbonnementDetails->getStatutPaiement(),
            ':MethodeDePaiement' => $AbonnementDetails->getMethodeDePaiement(),
            ':Prix' => $AbonnementDetails->getPrix(),
            ':SommePayee' => $AbonnementDetails->getSommePayee(),
            ':SommeRestante' => $AbonnementDetails->getSommeRestante()
                ]);
    } catch (PDOException $e) {
        // Handle database errors
        echo 'Error: ' . $e->getMessage();
        return false;
    }
}

// Check if the ID parameter is set in the URL
if (isset($_GET['id'])) {
    $offer_id = $_GET['id'];

    // Assuming you have the necessary data from your form or database, update the job
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Validate and sanitize form inputs
        // Assuming you have retrieved form data and sanitized it, create an instance of Chercheurs
        $AbonnementDetails = new abonnement(
            null,
          
            $_POST['DateDeb'],
            $_POST['DateFin'],
            $_POST['StatutPaiement'],
            $_POST['MethodeDePaiement'],
            $_POST['Prix'],
            $_POST['SommePayee'],
            $_POST['SommeRestante'],
            $_POST['IdCours']
        );

        // Debug: Print out values assigned to properties
       
        // Update the job
        if (updateAbonnement($offer_id, $AbonnementDetails)) {
            // Redirect to job list after successful update
            header('Location: gerercours.php');
            exit; // Terminate the script after redirection
        } else {
            $error = "An error occurred while updating the subscription offer.";
        }
    }
} else {
    // Handle the case when the ID parameter is not set
    echo "ID parameter is missing.";
}
?>