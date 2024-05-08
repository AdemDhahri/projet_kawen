<?php
session_start();

require_once '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Assurez-vous de ne charger le fichier autoload.php qu'une seule fois
require '../vendor/autoload.php';

// Récupérer les valeurs des champs du formulaire HTML
$email = $_POST["email"];
$message = $_POST["message"];
$origin = $_POST["origin"];

$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'houbaiheb23@gmail.com';
    $mail->Password   = 'bcneklvxvjbwuzie';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port       = 465;

    $mail->setFrom('houbaiheb23@gmail.com', 'Mailer');
    $mail->addAddress($email); // Utiliser l'adresse e-mail saisie dans le formulaire

    // Personnaliser le sujet et le corps du courrier en fonction de l'origine
    if ($origin === "front") {
        $subject = 'Mot de passe oublié';
        $body = 'Bonjour, voici votre lien pour modifier votre mot de passe : <a href=\'http://localhost/projet_kawen/view/front/resete.html\'>Cliquez ici</a>';
    } elseif ($origin === "back") {
        $subject = 'Informations sur votre compte';
        $body = 'Bonjour, voici les informations sur votre compte : ' . $message;
    } else {
        // Gérer d'autres cas si nécessaire
        $subject = 'Demande de mot de passe ou de compte';
        $body = 'Bonjour, nous avons reçu votre demande, veuillez nous contacter pour plus d\'informations.';
    }

    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body    = $body;
    $mail->AltBody = 'Vous avez eu de problème pour charger le formulaire.';

    $mail->send();
    echo 'Le message a été envoyé.';
} catch (Exception $e) {
    echo "Le message n'a pas pu être envoyé. Erreur du système d'envoi de courrier: {$mail->ErrorInfo}";
}

// Rediriger vers la page de login
header("Location: http://localhost/projet_kawen/view/front/login.php");
?>
