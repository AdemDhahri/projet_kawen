<?php
include '../../Control/condidaControl.php';
include '../../Control/jobControl.php';

if (isset($_POST['offer_id']) && isset($_POST['condidatCIN'])) {
    $offerId = $_POST['offer_id'];
    $cin = $_POST['condidatCIN'];

    // Crée une instance de JobControl
    $condControl = new CondidaControl();
    $jobControl = new JobControl();

    $cond = $condControl->getCById($cin);

    // Appelle la fonction pour diminuer le nombre de postes disponibles
    $decremented = $jobControl->decrementNumberOfAvailablePosts($offerId);

    // Renvoie une réponse appropriée à la requête AJAX
    if ($decremented) {
        if ($condControl->acceptCondidature($cin)) {
            echo 'success';
        } else {
            echo 'error';
        }

    } else {
        echo 'error';
    }
}