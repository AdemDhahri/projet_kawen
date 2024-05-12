<?php


// Inclure la classe Notification
include_once "../../Model/notif.php";


class NotificationAdmin
{
    public function __construct()
    {
    }


    public function getNotifications()
    {
        $db = config::getConnexion();
        // Requête pour récupérer les notifications
        $query = $db->query("SELECT * FROM notif ORDER BY date DESC");

        // Récupérer les résultats de la requête sous forme de tableau associatif
        $notifications = $query->fetchAll(PDO::FETCH_ASSOC);

        return $notifications;
    }

    public function addNotification(Notif $data)
    {
        $sql = "INSERT INTO notif (message) VALUES (:msg)";
        $stmt = config::getConnexion()->prepare($sql);
        return $stmt->execute([
            ":msg" => $data->get_message()
        ]);
    }

    public function deleteNotification($idn)
    {
        $sql = "DELETE FROM notif WHERE idn = :idn";
        $stmt = config::getConnexion()->prepare($sql);
        return $stmt->execute([
            ":idn" => $idn
        ]);
    }
}