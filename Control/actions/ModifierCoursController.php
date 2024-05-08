<?php
require_once('../../Service/NotificationService.php');
// Logique de modification de l'entité "Cours"
require_once '../../config.php';

// Vérifier si l'attribut pour lequel la modification doit être notifiée est modifié
if(isset($_POST['attribut_modifie'])) {
    // Récupérer la valeur de l'attribut modifié
    $attributModifie = $_POST['attribut_modifie'];

    // Logique de traitement des notifications
    // Par exemple, envoyer une notification par e-mail aux abonnés concernés
    // Vous pouvez ajouter votre propre logique de notification ici

    // Définir la notification
    $notification = "L'attribut $attributModifie du cours a été modifié.";

    // Stocker la notification dans la session pour l'afficher dans la vue
    session_start();
    $_SESSION['notification'] = $notification;

    // Redirection vers la page de gestion des cours
    header("Location: ../../View/front/gerercours.php");
    exit();
}

// Si une modification est détectée, envoyer une notification SMS
$numeroDestinataire = '+21655740899'; // Votre numéro de téléphone
$message = 'Un attribut de l\'entité Cours a été modifié !'; // Contenu de la notification SMS
NotificationService::envoyerNotificationSMS($numeroDestinataire, $message);

?>
