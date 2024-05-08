
<?php
include_once "../../config.php";
class notif
{

    private $idn;
    private $message;
    private $date;
    


    // Constructor
    public function __construct($idn, $message, $date)
    {
        $this->idn = $idn;
        $this->message = $message;
        $this->date = $date;
      

    }

    // Getter and Setter methods...
    function set_idn($idn)
    {
        $this->idn = $idn;
    }
    function get_idn()
    {
        return $this->idn;
    }
    function set_message($message)
    {
        $this->nom = $message;
    }
    function get_message()
    {
        return $this->message;
    }
    function set_date($date)
    {
        $this->date = $date;
    }
    function get_date()
    {
        return $this->date;
    }

    public function addNotification($message, $date)
    {
        // Utilisation de la connexion à la base de données depuis config.php
        $pdo = config::getConnexion();

        // Préparer la requête SQL pour insérer une nouvelle notification
        $query = $pdo->prepare("INSERT INTO notifications (message, date) VALUES (:message, :date)");

        // Exécuter la requête avec les valeurs fournies
        $query->execute(array(':message' => $message, ':date' => $date));

        // Vérifier si l'insertion a réussi et retourner true ou false en conséquence
        return $query ? true : false;
    }

}