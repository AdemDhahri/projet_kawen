<?PHP
	
    include_once "../../config.php";



	class retourC 
    {

       

        public function supprimer_retour($idd)
        {
            $sql = "DELETE FROM retour WHERE id_retour= :id";
            $conn = new config();
            $db = $conn->getConnexion();
            $req = $db->prepare($sql);
            $req->bindValue(':id', $idd);
            try {
                $req->execute();
            } catch (Exception $e) {
                die('Erreur: ' . $e->getMessage());
            }
        }

    }

?>