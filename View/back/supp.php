<?php
// Inclure le fichier de connexion et d'accès aux données
include('../../Control/signup.php');
include('../../Model/user.php');

$CUser = new CUser();

// Traitement de la soumission du formulaire de suppression


// Traitement de la soumission du formulaire d'ajout
if (isset($_POST['submit'])) {
    // Vérification si tous les champs du formulaire sont remplis
    if (!empty($_POST['nom_comp']) && !empty($_POST['adresse_mail']) && !empty($_POST['mdp']) && !empty($_POST['roles'])) {
        // Récupération des données du formulaire
        $nom_comp = $_POST['nom_comp'];
        $adresse_mail = $_POST['adresse_mail'];
        $mdp = $_POST['mdp'];
        $roles = $_POST['roles'];

        // Création d'un nouvel objet User
        $user = new User($nom_comp, $adresse_mail, $mdp, $roles);

        // Appel de la méthode pour créer le chercheur
        $CUser->createChercheur($user);

        // Redirection vers la page d'affichage des utilisateurs après l'ajout
        header('Location: afficheru.php');
        exit();
    }}
?>

<!DOCTYPE html>
<html lang="en">
<style>
        .error-message {
            display: block;
            color: red;
            font-size: 0.8em;
            margin-top: 5px;
        }
    </style>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression et Ajout</title>
    <link rel="stylesheet" href="../../assests/front/css/login.css" />
</head>
<body>
<div class="wrapper">
    <div class="title-text">
        
        <div class="title signup">Formulaire d'Ajout</div>
    </div>
    <div class="form-container">
        <div class="slide-controls">
          
            <input type="radio" name="slide" id="signup" />
            
            <label for="signup" class="slide signup">Ajout</label>
            <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
            <form action="#" method="post" class="login">
                <div class="field">
                    <input type="text" name="id_user" placeholder="id user " required />
                </div>
                <div class="field btn">
                    <div class="btn-layer"></div>
                    <input type="submit" value="Supprimer" />
                </div>
            </form>
            <form method="post" class="signup" id="signup-form">
    <div class="field">
        <input type="text" name="nom_comp" id="nom_comp" placeholder="Nom d'utilisateur" required />
        <span id="nom_comp_error" class="error-message"></span>
    </div>
    <div class="field">
        <input type="email" name="adresse_mail" id="adresse_mail" placeholder="Email" required />
        <span id="adresse_mail_error" class="error-message"></span>
    </div>
    <div class="field">
        <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" required />
        <span id="mdp_error" class="error-message"></span>
    </div>
    <div class="field">
        <select name="roles" id="roles">
            <option value="">Choisir le rôle</option>
            <option value="formateur">Formateur</option>
            <option value="chercheur">Chercheur d'emploi</option>
            <option value="recruteur">Recruteur</option>
            <option value="admin">admin</option>
        </select>
    </div>
    <div class="field">
        <div class="field btn">
            <div class="btn-layer"></div>
            <input type="submit" name="submit" value="Signup" id="submit" />
        </div>
    </div>
</form>

<script>
document.getElementById("signup-form").addEventListener("submit", function(event) {
    var nom_comp = document.getElementById("nom_comp").value;
    var adresse_mail = document.getElementById("adresse_mail").value;
    var mdp = document.getElementById("mdp").value;
    var roles = document.getElementById("roles").value;

    var nom_comp_error = document.getElementById("nom_comp_error");
    var adresse_mail_error = document.getElementById("adresse_mail_error");
    var mdp_error = document.getElementById("mdp_error");

    nom_comp_error.innerHTML = "";
    adresse_mail_error.innerHTML = "";
    mdp_error.innerHTML = "";

    if (nom_comp.trim().length < 5) {
        nom_comp_error.innerHTML = "Le nom d'utilisateur doit comporter au moins 5 caractères.";
        event.preventDefault(); // Empêche l'envoi du formulaire
    }

    if (mdp.trim().length < 8) {
        mdp_error.innerHTML = "Le mot de passe doit comporter au moins 8 caractères.";
        event.preventDefault(); // Empêche l'envoi du formulaire
    }

    if (adresse_mail.trim() === "") {
        adresse_mail_error.innerHTML = "Veuillez entrer une adresse email.";
        event.preventDefault(); // Empêche l'envoi du formulaire
    }

    if (roles.trim() === "") {
        alert("Veuillez choisir un rôle.");
        event.preventDefault(); // Empêche l'envoi du formulaire
    }
});
</script>
        </div>
    </div>
</div>

<script src="../../assests/front/js/login.js"></script>
</body>
</html>
