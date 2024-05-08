<?php
require_once('../../Twilio/TwilioHelper.php');
require_once('../../vendor/autoload.php');
use Twilio\Rest\Client;


class NotificationService {
    public static function envoyerNotificationSMS($numeroDestinataire, $message) {
        // Logique pour envoyer la notification SMS en utilisant Twilio
        // Remplacez les valeurs par vos propres identifiants Twilio
        $accountSid = 'AC222654a0d6df83bbc6aebf0b34708b95';
        $authToken = '73af507e99c26851478215429f9c9383';
        $numeroTwilio = '+14053582205';

        // Initialiser le client Twilio
        $client = new Client($accountSid, $authToken);

        // Envoyer le SMS
        try {
            $message = $client->messages->create(
                $numeroDestinataire, // Numéro du destinataire
                [
                    'from' => $numeroTwilio, // Votre numéro Twilio
                    'body' => $message // Contenu du SMS
                ]
            );
            echo 'Notification SMS envoyée avec succès. SID: ' . $message->sid;
        } catch (Exception $e) {
            echo 'Erreur lors de l\'envoi de la notification SMS: ' . $e->getMessage();
        }
    }
}
?>
