<?php
// Inclusion de la configuration et de la classe Offre
include_once "../../config.php";

class JobControl
{
    public function createOffre(Offre $jobDetails)
    {
        // Insert into the database
        $sql = "INSERT INTO offres (titre, email_r, salaire, localisation, horaire, description, niveau) 
                VALUES (:titre, :email_r, :salaire, :localisation, :horaire, :description, :niveau)";

        try {

            $stmt = config::getConnexion()->prepare($sql);

            return $stmt->execute([
                ':titre' => $jobDetails->get_titre(),
                ':email_r' => $jobDetails->get_email_r(),
                ':salaire' => $jobDetails->get_salaire(),
                ':localisation' => $jobDetails->get_localisation(),
                ':horaire' => $jobDetails->get_horaire(),
                ':description' => $jobDetails->get_description(),
                ':niveau' => $jobDetails->get_niveau()
            ]);

        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
        }
    }

    public function getAllOffres()
    {
        $db = config::getConnexion();

        $query = $db->prepare('SELECT * FROM offres');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteOffre($id)
    {
        $db = config::getConnexion();

        $sql = "DELETE FROM offres WHERE id_o = :id";

        try {
            $stmt = $db->prepare($sql);
            $stmt->execute(['id'=> $id]);
            return true;
        } catch (PDOException $e) {
            echo 'Erreur: ' . $e->getMessage();
            return false;
        }
    }
    public function getOffreById(string $id)
    {
        $db = config::getConnexion();
        $query = $db->prepare("SELECT * FROM offres WHERE id_o = :id");
        $query->execute([":id"=> $id]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }
    public function updateOffre(string $id, Offre $jobDetails)
    {
        // Requête SQL pour mettre à jour l'offre dans la base de données
        $sql = "UPDATE offres 
                SET titre = :titre, email_r = :email_r, salaire = :salaire, 
                    localisation = :localisation, horaire = :horaire, 
                    description = :description, niveau = :niveau 
                WHERE id_o = :id";

        try {
            // Préparation de la requête
            $stmt = config::getConnexion()->prepare($sql);

            // Exécution de la requête avec les valeurs des paramètres
            return $stmt->execute([
                ':id' => $id,
                ':titre' => $jobDetails->get_titre(),
                ':email_r' => $jobDetails->get_email_r(),
                ':salaire' => $jobDetails->get_salaire(),
                ':localisation' => $jobDetails->get_localisation(),
                ':horaire' => $jobDetails->get_horaire(),
                ':description' => $jobDetails->get_description(),
                ':niveau' => $jobDetails->get_niveau()
            ]);
        } catch (PDOException $e) {
            // Gestion des erreurs de base de données
            echo 'Erreur: ' . $e->getMessage();
            return false;
        }
    }
}
