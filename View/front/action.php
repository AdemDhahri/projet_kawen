<?php 
include('../../Control/signup.php');
include('../../Model/user.php');
if (isset($_POST['submit'])) {
    $recruter_Surname = htmlspecialchars($_POST['nom_comp']);
    $recruter_name = htmlspecialchars($_POST['adresse_mail']);
    $recruter_mail = htmlspecialchars($_POST['mdp']);
    $recruter_tel = htmlspecialchars($_POST['rep1']);
    // $recruter_city = htmlspecialchars($_POST['ville']);
    $message = htmlspecialchars($_POST['rep2']);
    $ldm = htmlspecialchars($_POST['rep2']);
    
    $NewRecruiter = new cuser (null,$recruter_Surname,$recruter_name,$recruter_mail,$recruter_tel,$message,$cv,$ldm);
    createchercheur($NewRecruiter);
}