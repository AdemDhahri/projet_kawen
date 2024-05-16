<?php
include_once "../../config.php";
include_once "../Model/abonnement.php";

if (isset($_POST['submit'])) {
    $recruter_date_deb = htmlspecialchars($_POST['DateDeb']);
    $recruter_date_fin = htmlspecialchars($_POST['DateFin']);
    $recruter_statut = htmlspecialchars($_POST['StatutPaiement']);
    $recruter_methode = htmlspecialchars($_POST['MethodeDePaiement']);
    $recruter_prix = htmlspecialchars($_POST['Prix']);
    $recruter_somme = htmlspecialchars($_POST['SommePayee']);
    $recruter_reste = htmlspecialchars($_POST['SommeRestante']);
    $professeur_id = htmlspecialchars($_POST['IdCours']);
 
    $new_abonnement = new abonnement($recruter_date_deb, $recruter_date_fin, $recruter_statut, $recruter_methode,
        $recruter_prix, $recruter_somme, $recruter_reste, $professeur_id);
    $insertion_reussie = create_abonnement($new_abonnement);

    if ($insertion_reussie) {
        echo '<div class="custom-alert show slide-in">Abonnement ajouté avec succès.</div>';
    } else {
        echo '<div class="custom-alert show slide-in">Erreur lors de l\'ajout de l\'abonnement.</div>';
    }
}

function create_abonnement(abonnement $m)
{
    $sql = "INSERT INTO abonnements (DateDeb, DateFin, StatutPaiement, MethodeDePaiement, Prix, SommePayee, SommeRestante, IdCours) 
            VALUES (:DateDeb, :DateFin, :StatutPaiement, :MethodeDePaiement, :Prix, :SommePayee, :SommeRestante, :IdCours)";

    try {
        $stmt = config::getConnexion()->prepare($sql);
        if ($stmt) {
            $result = $stmt->execute([
                ':DateDeb' => $m->getDateDeb(),
                ':DateFin' => $m->getDateFin(),
                ':StatutPaiement' => $m->getStatutPaiement(),
                ':MethodeDePaiement' => $m->getMethodeDePaiement(),
                ':Prix' => $m->getPrix(),
                ':SommePayee' => $m->getSommePayee(),
                ':SommeRestante' => $m->getSommeRestante(),
                ':IdCours' => $m->getIdCours()
            ]);
            return $result;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        return false;
    }
}
?>
