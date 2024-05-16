

<?php 
include_once "../../config.php";
// Include the definition of the Offre class if not already included
// include_once "Path_to_Offre_class.php";

function updateCours(string $id, cours $jobDetails)
{
    // SQL query to update the job offer in the database
    $sql = "UPDATE cours
            SET Titre = :Titre, Description = :Description, Categorie = :Categorie, 
            Format = :Format, DatePost = :DatePost, DateExpir = :DateExpir, Langue = :Langue,
            Prix = :Prix, CompetencesAcquises = :CompetencesAcquises, Prerequis = :Prerequis, Certification = :Certification,
            IdFormateur = :IdFormateur, Support = :Support
            WHERE IdCours = :id";

    try {
        // Prepare the SQL query
        $stmt = config::getConnexion()->prepare($sql);

        // Execute the query with parameter values
        return $stmt->execute([
            ':Titre' => $jobDetails->getTitre(),
            ':Description' => $jobDetails->getDescription(),
            ':Categorie' => $jobDetails->getCategorie(),
            ':Format' => $jobDetails->getFormat(),
            ':DatePost' => $jobDetails->getDatePost(),
            ':DateExpir' => $jobDetails->getDateExpir(),
            ':Langue' => $jobDetails->getLangue(),
            ':Prix' => $jobDetails->getPrix(),
            ':CompetencesAcquises' => $jobDetails->getCompetencesAcquises(),
            ':Prerequis' => $jobDetails->getPrerequis(),
            ':Certification' => $jobDetails->getCertification(),
            ':IdFormateur' => $jobDetails->getIdFormateur(),
            ':Support' => $jobDetails->getSupport(),
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
        $jobDetails = new cours(
            null,
            $_POST['Titre'],
            $_POST['Description'],
            $_POST['Categorie'],
            $_POST['Format'],
            $_POST['DatePost'],
            $_POST['DateExpir'],
            $_POST['Langue'],
            $_POST['Prix'],
            $_POST['CompetencesAcquises'],
            $_POST['Prerequis'],
            $_POST['Certification'],
            $_POST['IdFormateur'],
            $_POST['Support']
        );

        // Debug: Print out values assigned to properties
       
        // Update the job
        if (updateCours($offer_id, $jobDetails)) {
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



