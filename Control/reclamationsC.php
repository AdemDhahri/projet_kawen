<?PHP
	
    include_once "../../config.php";



	class reclamationsC {
		
		
    public function getNonTraiteesReclamations()
{
    $db = config::getConnexion();

    $query = $db->prepare('SELECT * FROM reclamations WHERE etat = "non traitée" ');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

public function getTraiteesReclamations()
{
    $db = config::getConnexion();

    $query = $db->prepare('SELECT * FROM reclamations WHERE etat = "traitée"');
    $query->execute();
    return $query->fetchAll(PDO::FETCH_ASSOC);
}
        
public function getAllReclamationWithLimit($offset, $limit) {
    try {
        $db = config::getConnexion();
        // Prepare SQL statement to retrieve reclamations with pagination
        $query = $db->prepare("SELECT * FROM reclamations LIMIT :offset, :limit");
        $query->bindParam(':offset', $offset, PDO::PARAM_INT);
        $query->bindParam(':limit', $limit, PDO::PARAM_INT);
        $query->execute();
        $reclamations = $query->fetchAll(PDO::FETCH_ASSOC);
        return $reclamations;
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
        return array(); // Return an empty array if there's an error
    }
}

public function getTotalReclamations() {
    try {
        $db = config::getConnexion();
        // Prepare SQL statement to count total reclamations
        $query = $db->prepare("SELECT COUNT(*) as total FROM reclamations");
        $query->execute();
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return $result['total'];
    } catch (PDOException $e) {
        // Handle any database errors
        echo "Error: " . $e->getMessage();
        return 0; // Return 0 if there's an error
    }
}

		public function getAllreclamation()
        {
        $db = config::getConnexion();

        $query = $db->prepare('SELECT * FROM reclamations');
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
        }

       public function deletereclamation($id)
        {
            $sql = "DELETE FROM retour WHERE id_retour= :id";
            $conn = new config();
            $db = $conn->getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':id', $id);
            try {
                $req->execute();
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }

            $db = config::getConnexion();

            $sql = "DELETE FROM reclamations WHERE id_r = :id";

            try {
                $stmt = $db->prepare($sql);
                $stmt->execute(['id'=> $id]);
                return true;
            } catch (PDOException $e) {
                echo 'Erreur: ' . $e->getMessage();
                return false;
            }
        } 
        

        public function getreclamationeById(string $id)
        {
            $db = config::getConnexion();
            $query = $db->prepare("SELECT * FROM reclamations WHERE id_r= :id");
            $query->execute([":id"=> $id]);
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        public function updatereclamation(string $id, reclamation $reclamation)
        {
            // Requête SQL pour mettre à jour l'offre dans la base de données
            $sql = "UPDATE reclamations 
                    SET nom = :nom, mail = :mail, tel = :tel, 
                        objet = :objet, message = :message, 
                        retour = :retour, etat = :etat, date = :date,id_retour= :id_retour
                    WHERE id_r=:id";

            try {
                // Préparation de la requête
                $stmt = config::getConnexion()->prepare($sql);

                // Exécution de la requête avec les valeurs des paramètres
                return $stmt->execute([
                    ':id' => $id,
                    ':nom' => $reclamation->get_nom(),
                    ':mail' => $reclamation->get_mail(),
                    ':tel' => $reclamation->get_tel(),
                    ':objet' => $reclamation->get_objet(),
                    ':message' => $reclamation->get_message(),
                    ':retour' => $reclamation->get_retour(),
                    ':etat' => $reclamation->get_etat(),
                    ':date' => $reclamation->get_date(),
                    ':id_retour' => $reclamation->get_date()
                ]);
            } catch (PDOException $e) {
                // Gestion des erreurs de base de données
                echo 'Erreur: ' . $e->getMessage();
                return false;
            }
        }

        public function updatereclamationback(string $id, reclamation $reclamation)
        {
            // Requête SQL pour mettre à jour l'offre dans la base de données
            $sql = "UPDATE reclamations 
                    SET  etat = :etat, date = :date
                    WHERE id_r=:id";

            try {
                // Préparation de la requête
                $stmt = config::getConnexion()->prepare($sql);

                // Exécution de la requête avec les valeurs des paramètres
                return $stmt->execute([
                    ':id' => $id,
                    ':nom' => $reclamation->get_nom(),
                    ':mail' => $reclamation->get_mail(),
                    ':tel' => $reclamation->get_tel(),
                    ':objet' => $reclamation->get_objet(),
                    ':message' => $reclamation->get_message(),
                    ':retour' => $reclamation->get_retour(),
                    ':etat' => $reclamation->get_etat(),
                    ':date' => $reclamation->get_date(),
                    ':id_retour' => $reclamation->get_date()
                ]);
            } catch (PDOException $e) {
                // Gestion des erreurs de base de données
                echo 'Erreur: ' . $e->getMessage();
                return false;
            }
        }
            
	}

?>