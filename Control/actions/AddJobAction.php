<?php 
include_once "../../config.php";

if (isset($_POST['submit'])) {
    
    $recruter_Surname = htmlspecialchars($_POST['nom']);
    $recruter_name = htmlspecialchars($_POST['prenom']);
    $recruter_mail = htmlspecialchars($_POST['email']);
    $recruter_tel = htmlspecialchars($_POST['telephone']);
    // $recruter_city = htmlspecialchars($_POST['ville']);
    $cv = htmlspecialchars($_POST['cv']);
    $ldm = htmlspecialchars($_POST['lettre_motivation']);
    $message = htmlspecialchars($_POST['message']);
    $NewRecruiter = new chercheurs(null,$recruter_Surname,$recruter_name,$recruter_mail,$recruter_tel,$cv,$ldm,$message);
    createchercheur($NewRecruiter);
    header('Location: gererchercheur.php');
}
function createchercheur(chercheurs $jobD)
{
    // Insert into the database
    $sql = "INSERT INTO chercheurs (nom ,prenom ,mail ,tel ,cv ,l_d_v ,message) 
                VALUES (:nom, :prenom, :mail, :tel, :cv, :l_d_v, :message)";

    try {

        $stmt = config::getConnexion()->prepare($sql);

        return $stmt->execute([
            ':nom' => $jobD->get_nom(),
            ':prenom' => $jobD->get_prenom(),
            ':mail' => $jobD->get_mail(),
            ':tel' => $jobD->get_tel(),
            ':cv' => $jobD->get_cv(),
            ':l_d_v' => $jobD->get_l_d_v(),
            ':message' => $jobD->get_message()
        ]);
    } catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
    
}