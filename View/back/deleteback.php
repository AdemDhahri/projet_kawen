<?php
include_once "../../config.php";

// Vérifier si le formulaire de suppression a été soumis


// Votre code existant...

if (isset($_GET['id'])) {
    // Récupérer l'ID de l'annonce à supprimer depuis $_GET
    $id_a_supprimer = $_GET['id'];

    // Appeler la fonction deletechercheur pour supprimer l'annonce
    deletechercheur($id_a_supprimer);

    // Exécuter un script JavaScript pour recharger la page
    header('Location: blank.php');

}

// Votre code existant...



// Fonction de suppression de l'annonce (vous devez implémenter cette fonction)
function deletechercheur($id) {
   // Assurez-vous de remplacer "config" par le nom de votre classe de connexion à la base de données
   $db = config::getConnexion();

   // Utilisez $_GET['id'] pour récupérer l'ID à partir de l'URL
   // Assurez-vous de filtrer et valider cette valeur pour éviter les attaques par injection SQL
   // Dans cet exemple, je vais supposer que vous avez déjà obtenu et validé l'ID avant d'appeler cette fonction
   // Si ce n'est pas le cas, assurez-vous de le faire pour des raisons de sécurité
   // $id = $_GET['id'];

   // Utilisez un paramètre nommé dans la requête préparée
   $sql = "DELETE FROM chercheurs WHERE id_c = :id";

   try {
       $stmt = $db->prepare($sql);
       // Liez la valeur de l'ID au paramètre de la requête préparée
       $stmt->bindParam(':id', $id);
       // Exécutez la requête
       $stmt->execute();
       // Retournez true si la suppression a réussi
       return true;
   } catch (PDOException $e) {
       // Attrapez les exceptions PDO pour afficher les erreurs éventuelles
       echo 'Erreur: ' . $e->getMessage();
       // Retournez false en cas d'erreur
       return false;
   }
}
?>
