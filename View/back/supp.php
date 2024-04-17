<?php
// Inclure le fichier de connexion et d'accès aux données
include('../../Control/signup.php');
include('../../Model/user.php');

$CUser = new CUser();

// Traitement de la soumission du formulaire de suppression
if (isset($_POST["id_user"])) {
    $CUser->supprimerClient($_POST["id_user"]);
    header('Location: afficheru.php');
}

// Traitement de la soumission du formulaire d'ajout
if (isset($_POST['x'])) {
    // Vérification si tous les champs du formulaire sont remplis
    if (!empty($_POST['nom_comp']) && !empty($_POST['adresse_mail']) && !empty($_POST['mdp']) && !empty($_POST['rep1']) && !empty($_POST['rep2']) && !empty($_POST['rep3']) && !empty($_POST['job'])) {
        // Récupération des données du formulaire
        $nom_comp = $_POST['nom_comp'];
        $adresse_mail = $_POST['adresse_mail'];
        $mdp = $_POST['mdp'];
        $rep1 = $_POST['rep1'];
        $rep2 = $_POST['rep2'];
        $rep3 = $_POST['rep3'];
        $roles = $_POST['job']; // Utiliser 'job' comme nom du champ pour le rôle

        // Création d'un nouvel objet User
        $user = new User($nom_comp, $adresse_mail, $mdp, $rep1, $rep2, $rep3, $roles);

        // Appel de la méthode pour créer le chercheur
        $CUser->createChercheur($user);

        // Redirection vers la page d'affichage des utilisateurs après l'ajout
        header('Location: afficheru.php');
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppression et Ajout</title>
    <link rel="stylesheet" href="../../assests/front/css/login.css" />
</head>
<body>
<div class="wrapper">
    <div class="title-text">
        <div class="title login">Formulaire de Suppression</div>
        <div class="title signup">Formulaire d'Ajout</div>
    </div>
    <div class="form-container">
        <div class="slide-controls">
            <input type="radio" name="slide" id="login" checked />
            <input type="radio" name="slide" id="signup" />
            <label for="login" class="slide login">Suppression</label>
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
                    <input type="text" name="nom_comp" placeholder="Nom de l'utilisateur à ajouter" required />
                </div>
                <div class="field">
                    <input type="email" name="adresse_mail" placeholder="Email de l'utilisateur" required />
                </div>
                <div class="field">
                    <input type="password" name="mdp" placeholder="Mot de passe de l'utilisateur" required />
                </div>
                <div class="field">
                    <input type="password" name="rep1" placeholder="Réponse 1" required />
                </div>
                <div class="field">
                    <input type="password" name="rep2" placeholder="Réponse 2" required />
                </div>
                <div class="field">
                    <input type="password" name="rep3" placeholder="Réponse 3" required />
                </div>
                <div class="field">
                    <select name="job">
                        <option value="">Choisir le rôle de l'utilisateur</option>
                        <option value="formateur">Formateur</option>
                        <option value="chercheur">Chercheur d'emploi</option>
                        <option value="recruteur">Recruteur</option>
                    </select>
                </div>
                <div class="field">
                    <div class="field btn">
                        <div class="btn-layer"></div>
                        <input type="submit" name="x" value="Ajouter" id="x" />
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="../../assests/front/js/login.js"></script>
</body>
</html>
