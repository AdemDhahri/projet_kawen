
<?php
require '..\..\assests\back\vendor\autoload.php';
//include_once "../../Control/PHPMailer";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




$email= $_GET['mail'];
$mail = new PHPMailer(true);

try {
    // Configuration du serveur SMTP
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'aminabj398@gmail.com';
    $mail->Password   = 'Anouchka123';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    // Paramètres du mail
    $mail->setFrom('aminabj398@gmail.com', 'KAWEN');
    $mail->addAddress($email, 'Joe User');

    // Contenu du mail
    $mail->isHTML(true);
    $mail->Subject = 'Réclamation reçue et en cours de traitement ';
    $mail->Body    = 'Bonjour, nous sommes les membres de KAWEN. Nous vous informons que nous avons bien reçu votre réclamation et que nous la prendrons en considération lors de la mise à jour de notre système.';

    // Envoi du mail
    $mail->send();
    echo 'Le message a été envoyé avec succès';
} catch (Exception $e) {
    echo 'Erreur lors de l"envoi du message : ' . $mail->ErrorInfo;
}

// Redirection vers une autre page
//header('Location: liste_r.php');


?>