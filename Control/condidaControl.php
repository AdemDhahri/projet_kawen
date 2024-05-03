<?php
// Inclusion de la configuration et de la classe Offre
include_once "../../config.php";

class CondidaControl
{

    public function createC(Condidature $condidature, $offer_id)
    {
        // Insert into the database
        $sql = "INSERT INTO condidatures
                VALUES (:CIN, :nom, :prenom,:email,:phone,:cv,:competence, :id_o, :id_u, :etat_C)";

        try {

            $stmt = config::getConnexion()->prepare($sql);

            return $stmt->execute([
                ':CIN' => $condidature->get_CIN(),
                ':nom' => $condidature->get_nom(),
                ':prenom' => $condidature->get_prenom(),
                ':email' => $condidature->get_email(),
                ':phone' => $condidature->get_phone(),
                ':cv' => $condidature->get_cv(),
                ':competence' => $condidature->get_competence(),
                ':id_o' => $offer_id,
                ':etat_C' => $condidature->get_cv(),
                ':id_u' => "1"
            ]);
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function getAllC()
    {
        $db = config::getConnexion();

        $query = $db->prepare('SELECT * FROM condidatures c JOIN offres o WHERE o.id_o = c.id_o');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllCByOffer($idOffer)
    {
        $db = config::getConnexion();
        $query = $db->prepare('SELECT * FROM condidatures c JOIN offres o WHERE o.id_o = :id AND o.id_o = c.id_o');
        $query->execute([":id" => $idOffer]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteC($CIN)
    {
        $db = config::getConnexion();

        $sql = "DELETE FROM condidatures WHERE cin = :CIN";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute(['CIN' => $CIN]);
            return true;
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
            return false;
        }
    }
    public function getCById(string $id)
    {
        $db = config::getConnexion();
        $query = $db->prepare("SELECT * FROM condidatures WHERE CIN= :CIN");
        $query->execute([":CIN" => $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function updateC(string $id, Condidature $jobDetails)
    {
        // Requête SQL pour mettre à jour l'offre dans la base de données
        $sql = "UPDATE condidatures
                SET CIN = :CIN, nom = :nom, prenom = :prenom,
                    email = :email, phone = :phone,
                    cv = :cv
                WHERE CIN = :id";

        try {
            // Préparation de la requête
            $stmt = config::getConnexion()->prepare($sql);

            // Exécution de la requête avec les valeurs des paramètres
            return $stmt->execute([
                ':CIN' => $jobDetails->get_CIN(),
                ':nom' => $jobDetails->get_nom(),
                ':prenom' => $jobDetails->get_prenom(),
                ':email' => $jobDetails->get_email(),
                ':phone' => $jobDetails->get_phone(),
                ':cv' => $jobDetails->get_cv(),
                ':competence' => $jobDetails->get_competence(),
            ]);
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo 'Erreur: ' . $e->getMessage();
            return false;
        }
    }



    public function acceptCondidature(string $cin) {
        $sql = "UPDATE condidatures SET etat_C = 'A' WHERE cin = :cin";
        try {
            $stmt = config::getConnexion()->prepare($sql);
            return $stmt->execute([":cin" => $cin]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return false;
        }
    }
}
