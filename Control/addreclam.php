<?php
include_once "../../config.php";


if (isset($_POST['submit'])) {
    $nom = htmlspecialchars($_POST['nom']);
    $mail = htmlspecialchars($_POST['mail']);
    $phone = htmlspecialchars($_POST['phone']);
    $retour = htmlspecialchars($_POST['retour']);
    $objet = htmlspecialchars($_POST['objet']);
    $message = htmlspecialchars($_POST['description']);

    // Vérifier si tous les champs requis sont renseignés
    if (!empty($nom) && !empty($mail) && !empty($phone) && !empty($retour) && !empty($objet) && !empty($message)) {
        $Newreclamation = new reclamation($nom, $mail, $phone, $objet, $message, $retour, date('Y-m-d'));
        if (ajouterreclamation($Newreclamation)) {
            
            //$Newreclamation->set_id_retour($Newreclamation->get_id());
            
            echo "La réclamation a été ajoutée avec succès.";
            header('location:liste_r.php');
        } else {
            echo "Une erreur s'est produite lors de l'ajout de la réclamation.";
        }
    } else {
        // Gérer le cas où un ou plusieurs champs requis sont vides
        echo "Veuillez remplir tous les champs requis.";
    }
}

function ajouterreclamation($reclamation)
{
    $sql = "INSERT INTO reclamations (nom, mail, tel, objet, message, retour, etat, date, id_retour) 
            VALUES (:nom, :mail, :tel, :objet, :message, :retour, :etat, :date,:id_retour)";
    
    try {
        $stmt = config::getConnexion()->prepare($sql);
        if ($stmt->execute([
            'nom' => $reclamation->get_nom(),
            'mail' => $reclamation->get_mail(),
            'tel' => $reclamation->get_tel(),
            'objet' => $reclamation->get_objet(),
            'message' => $reclamation->get_message(),
            'retour' => $reclamation->get_retour(),
            'etat' => $reclamation->get_etat(),
            'date' => $reclamation->get_date(),
            'id_retour' => $reclamation->get_id()
        ])) {
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
        return false;
    }

}


?>
