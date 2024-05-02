<?php
include_once "../../config.php";
include_once "../../Model/commentaire.php"; // Adjust the path if necessary

if (isset($_POST['submit'])) {
    $chercheur_id = $_GET['id'];
    $commentaires = htmlspecialchars($_POST['commentaire']);
    $NewComment = new commentaires(null, $commentaires, $chercheur_id);
    create_commentaire($NewComment);
    //header('Location: les_chercheurs.php');
}

function create_commentaire(commentaires $comment)
{
    // Insert into the database
    $sql = "INSERT INTO commentaires (texte,id_c) 
            VALUES (:commentaire,:id_chercheur)";

    try {
        $stmt = config::getConnexion()->prepare($sql);
        $stmt->execute([
            ':commentaire' => $comment->get_commentaire(),
            ':id_chercheur' => $comment->get_id_c()

        ]);
        header('Location:../../View/front/les_chercheurs.php');
        
    } catch (PDOException $e) {
        echo 'Erreur: ' . $e->getMessage();
    }
}
?>
