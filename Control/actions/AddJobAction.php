<?php 
include_once "../../config.php";

if (isset($_POST['submit'])) {
    
    $Titre = htmlspecialchars($_POST['Titre']);
    $Description = htmlspecialchars($_POST['Description']);
    $Categorie = htmlspecialchars($_POST['Categorie']);
    $Format = htmlspecialchars($_POST['Format']);
    $DatePost = htmlspecialchars($_POST['DatePost']);
    $DateExpir = htmlspecialchars($_POST['DateExpir']);
    $Langue = htmlspecialchars($_POST['Langue']);
    $Prix = htmlspecialchars($_POST['Prix']);
    $CompetencesAcquises = htmlspecialchars($_POST['CompetencesAcquises']);
    $Prerequis = htmlspecialchars($_POST['Prerequis']);
    $Certification = htmlspecialchars($_POST['Certification']);
    $IdFormateur = htmlspecialchars($_POST['IdFormateur']);
    $Support = htmlspecialchars($_POST['Support']);
    $NewCours = new cours(null,$Titre,$Description,$Categorie,$Format,$DatePost,$DateExpir,$Langue,$Prix,$CompetencesAcquises,$Prerequis,$Certification,$IdFormateur,$Support);
    createcours($NewCours);
    header('Location: gerercours.php');
}
function createcours(cours $jobD)
{
    // Insert into the database
    $sql = "INSERT INTO cours (Titre ,Description ,Categorie ,Format ,DatePost ,DateExpir, Langue, Prix, CompetencesAcquises, Prerequis, Certification, IdFormateur,Support) 
                VALUES (:Titre ,:Description ,:Categorie ,:Format ,:DatePost ,:DateExpir, :Langue, :Prix, :CompetencesAcquises, :Prerequis, :Certification, :IdFormateur, :Support)";

    try {

        $stmt = config::getConnexion()->prepare($sql);

        return $stmt->execute([
            ':Titre' => $jobD->getTitre(),
            ':Description' => $jobD->getDescription(),
            ':Categorie' => $jobD->getCategorie(),
            ':Format' => $jobD->getFormat(),
            ':DatePost' => $jobD->getDatePost(),
            ':DateExpir' => $jobD->getDateExpir(),
            ':Langue' => $jobD->getLangue(),
            ':Prix' => $jobD->getPrix(),
            ':CompetencesAcquises' => $jobD->getCompetencesAcquises(),
            ':Prerequis' => $jobD->getPrerequis(),
            ':Certification' => $jobD->getCertification(),
            ':IdFormateur' => $jobD->getIdFormateur(),
            ':Support' => $jobD->getSupport()

        ]);
    } catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
    
}





