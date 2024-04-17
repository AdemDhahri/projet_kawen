<?php
// Inclusion de la configuration et de la classe Offre
include_once "../../config.php";

class Condida
{
    public function createC(Condidature $jobDetails)
    {
        // Insert into the database
        $sql = "INSERT INTO condidatures (CIN, nom, prenom,email,phone,cv) 
                VALUES (:CIN, :nom, :prenom,:email,:phone,:cv)";

        try {

            $stmt = config::getConnexion()->prepare($sql);

            return $stmt->execute([
                ':CIN' => $jobDetails->get_CIN(),
                ':nom' => $jobDetails->get_nom(),
                ':prenom' => $jobDetails->get_prenom(),
                ':email' => $jobDetails->get_email(),
                ':phone' => $jobDetails->get_phone(),
                ':cv' => $jobDetails->get_cv(),
                
            ]);

        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function getAllOffres()
    {
        $db = config::getConnexion();

        $query = $db->prepare('SELECT * FROM condidatures');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteOffre($id)
    {
        $db = config::getConnexion();

        $sql = "DELETE FROM offres WHERE CIN= :id";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute(['id' => $id]);
            return true;
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
            return false;
        }
    }
    public function getOffreById(string $id)
    {
        $db = config::getConnexion();
        $query = $db->prepare("SELECT * FROM offres WHERE CIN= :id");
        $query->execute([":id" => $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function updateOffre(string $id, Condidature $jobDetails)
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
            ]);
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo 'Erreur: ' . $e->getMessage();
            return false;
        }
    }
}
