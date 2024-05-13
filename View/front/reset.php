<?php
session_start();
//  require_once   "../signup.php";
include_once "C:/xampp/htdocs/projet_kawen/Control/signup.php";
$reset = new CUser();

$reset->reset($_SESSION["adresse_mail"],$_POST["password"]);

header("Location: login.php");
?>