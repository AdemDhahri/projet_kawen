<?php


// Inclure la classe Notification
include_once "../../Model/notif.php";


class NotificationController
{
    public function __construct()
    {
    }

    public function addNotification(Notif $data)
    {
        $sql = "INSERT INTO notif (message) VALUES (:msg)";
        $stmt = config::getConnexion()->prepare($sql);
        return $stmt->execute([
            ":msg" => $data->get_message()
        ]);
    }
}