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
}