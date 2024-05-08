<?php 
include_once "../../config.php";
// Include the definition of the Offre class if not already included
// include_once "Path_to_Offre_class.php";

function updateAbonnement(string $id, abonnement $jobD)
{
    // SQL query to update only selected columns of the job offer in the database
    $sql = "UPDATE abonnements
            SET DateDeb = :DateDeb, DateFin = :DateFin, MethodeDePaiement = :MethodeDePaiement, 
            Prix = :Prix
            WHERE IdAbonnement = :id";

    try {
        // Prepare the SQL query
        $stmt = config::getConnexion()->prepare($sql);

        // Execute the query with parameter values
        return $stmt->execute([
            ':DateDeb' => $jobD->getDateDeb(),
            ':DateFin' => $jobD->getDateFin(),
            ':MethodeDePaiement' => $jobD->getMethodeDePaiement(),
            ':Prix' => $jobD->getPrix(),
            ':id' => $id
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
        $jobD = new abonnement(
            null,
            $_POST['DateDeb'],
            $_POST['DateFin'],
            $_POST['MethodeDePaiement'],
            $_POST['Prix']
        );

        // Update the job
        if (updateAbonnement($offer_id, $jobD)) {
            // Redirect to job list after successful update
            header('Location: gerercours.php');
            exit; // Terminate the script after redirection
        } else {
            $error = "An error occurred while updating the job offer.";
        }
    }
} else {
    // Handle the case when the ID parameter is not set
    echo "ID parameter is missing.";
}
?>
