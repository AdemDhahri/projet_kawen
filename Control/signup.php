<?php
// Inclusion de la configuration et de la classe Offre
include "C:/xampp/htdocs/projet_kawen/config.php";

class CUser
{ 

    public function createChercheur($user)
{   
    $sql = "INSERT INTO user (nom_comp, adresse_mail, mdp, roles) VALUES (:nom_comp, :adresse_mail, :mdp, :roles)";

    $db = Config::getConnexion();
    try {
        // Générer une chaîne de points de la même longueur que le mot de passe
       // $passwordLength = strlen($user->get_mdp());
       // $maskedPassword = str_repeat('*', $passwordLength);
        
        $query = $db->prepare($sql);
   
        $query->execute([
            'nom_comp' => $user->get_nom_comp(),
            'adresse_mail' => $user->get_adresse_mail(),
            'mdp' => $user->get_mdp(), // Enregistrer le mot de passe sous forme de points
            'roles' => $user->get_roles()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

    public function supprimerClient($id_user){
        $sql="DELETE FROM user where id_user=:id_user";
        $db=config::getConnexion();
        try{
        $req=$db->prepare($sql);
        $req->bindValue(':id_user',$id_user);
        $req->execute();
        }
        catch(Exception $e){
            die('Erreur:' .$e->getMessage());
        }
        
    }
    
    public function afficherClients()
    {
    $sql="SELECT * From user";
    $db=config::getConnexion();
    try{
    $liste=$db->query($sql);
    return $liste;
    }
    catch(Exception $e){
        die('Erreur:' .$e->getMessage());
    }
}

 public function recupererClient($id_user){
    $sql="SELECT * from user where id_user=:id_user";
    $db = config::getConnexion();
    try{
        $req=$db->prepare($sql);
    $req->bindValue(':id_user',$id_user);
    $req->execute();
    $res=$req->fetchAll();
    return $res;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}          
function recupereremail($adresse_mail){
    $sql="SELECT * from user where adresse_mail=:adresse_mail";
    $db = config::getConnexion();
    try{
        $req=$db->prepare($sql);
    $req->bindValue(':adresse_mail',$adresse_mail);
    $req->execute();
    $res=$req->fetchAll();
    return $res;
    }
    catch (Exception $e){
        die('Erreur: '.$e->getMessage());
    }
}     

public function updateUser($id_user, $nom_comp, $adresse_mail) {

    try {
        // Préparation de la requête SQL
        $sql = "UPDATE user SET nom_comp=:nom_comp, adresse_mail=:adresse_mail WHERE id_user=:id_user";
        $db = config::getConnexion();
        $stmt = $db->prepare($sql);

        // Liaison des paramètres
        $stmt->bindParam(':nom_comp', $nom_comp);
        $stmt->bindParam(':adresse_mail', $adresse_mail);
        $stmt->bindParam(':id_user', $id_user);

        // Exécution de la requête
        $stmt->execute();

        // Retourner true si l'opération a réussi
        return true;
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message d'erreur et retourner false
        echo "Erreur lors de la mise à jour de l'utilisateur: " . $e->getMessage();
        return false;
    }
}
public function reset($adresse_mail, $password)
{
    $sql = "UPDATE user SET mdp = :mdp WHERE adresse_mail = :adresse_mail";
    $db = config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindValue(":mdp", $password);
    $stmt->bindValue(":adresse_mail", $adresse_mail);
    $stmt->execute();
}

}
