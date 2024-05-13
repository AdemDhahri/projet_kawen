<?php 
include_once "../../config.php";
// Include the definition of the Offre class if not already included
// include_once "Path_to_Offre_class.php";

function updateOffre(string $id, Chercheurs $jobDetails)
{
    // SQL query to update the job offer in the database
    $sql = "UPDATE chercheurs
            SET nom = :nom, prenom = :prenom, mail = :mail, 
            tel = :tel, ville = :ville, cv = :cv, l_d_v = :l_d_v, message = :message
            WHERE id_c = :id";

    try {
        // Prepare the SQL query
        $stmt = config::getConnexion()->prepare($sql);

        // Execute the query with parameter values
        return $stmt->execute([
            ':nom' => $jobDetails->get_Nom(),
            ':prenom' => $jobDetails->get_Prenom(),
            ':mail' => $jobDetails->get_Mail(),
            ':tel' => $jobDetails->get_Tel(),
            ':ville' => $jobDetails->get_ville(),

            ':cv' => $jobDetails->get_Cv(),
            ':l_d_v' => $jobDetails->get_L_D_V(), // Corrected method name
            ':message' => $jobDetails->get_Message(),
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
        $jobDetails = new Chercheurs(
            null,
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['email'],
            $_POST['telephone'],
            $_POST['ville'],

            $_POST['cv'],
            $_POST['lettre_motivation'],
            $_POST['message']
        );

        // Debug: Print out values assigned to properties
        echo "CV: ".$_POST['cv']."<br>";
        echo "LDV: ".$_POST['lettre_motivation']."<br>";
        echo "Message: ".$_POST['message']."<br>";

        // Update the job
        if (updateOffre($offer_id, $jobDetails)) {
            // Redirect to job list after successful update
            header('Location: gererchercheur.php');
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
