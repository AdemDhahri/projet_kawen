
<?php
// Inclure les fichiers nécessaires
session_start();

include('../../Model/user.php');
include('../../Control/signup.php');
//include_once('../config.php');
// Vérifier si le formulaire de connexion est soumis
if (isset($_POST['connecter'])) {
    $id_user = $_POST['id_user'];
    $adresse_mail=$_POST['adresse_mail'];
    $mdp = $_POST['mdp'];

    /*try {
        $pdo = new PDO("mysql:host=localhost;dbname=projet", "", "");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }*/

    $sql = "SELECT * FROM user WHERE id_user = :id_user AND mdp = :mdp AND adresse_mail = :adresse_mail";
    $db = Config::getConnexion();
    $stmt = $db->prepare($sql);
    $stmt->bindParam(':id_user', $id_user);
    $stmt->bindParam(':adresse_mail', $adresse_mail);
    $stmt->bindParam(':mdp', $mdp);

    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['id_user'] = $user['id_user']; // Stocker l'ID de l'utilisateur dans la session
        $_SESSION['nom_comp'] = $user['nom_comp'];
        $_SESSION['adresse_mail'] = $user['adresse_mail'];
       
        $_SESSION['roles'] = $user['roles'];
        //header("Location: chercheur.php");
        if (is_array($user)) {
            $_SESSION['id_user']=$user['id_user'];
            
            if($user['roles']=='formateur'){
          $url = "formateur.php";
          echo "<script>window.location.replace('$url');</script>";
        }
        else if($user['roles']=='chercheur'){
          $url = "chercheur.php";
          echo "<script>window.location.replace('$url');</script>";
        }
        else if($user['roles']=='recruteur' ){
          $url = " recruteur.php ";
          echo "<script>window.location.replace('$url');</script>";
        }
        else if($user['roles']=='admin' ){
            $url = "../../view/back/index.html";
            echo "<script>window.location.replace('$url');</script>";
          }
      } 
    } else {
        header("Location: login.php?error=Identifiant ou mot de passe incorrect");
        exit();
    }
   
}

$CUser = new CUser();

// Traitement du formulaire d'inscription
if (isset($_POST['submit'])) {
    // Vérifier si tous les champs sont remplis
    if (!empty($_POST['nom_comp']) && !empty($_POST['adresse_mail']) && !empty($_POST['mdp']) &&  !empty($_POST['roles'])) {
        // Récupérer les données du formulaire
        $nom_comp = $_POST['nom_comp'];
        $adresse_mail = $_POST['adresse_mail'];
        $mdp = $_POST['mdp'];
       
        $roles = $_POST['roles'];
        

        // Créer un nouvel objet User
        $user = new User($nom_comp, $adresse_mail, $mdp, $roles);

        // Appeler la méthode pour créer le chercheur
        $CUser->createChercheur($user);

        // Redirection après inscription en fonction du rôle sélectionné
        switch ($roles) {
            case "formateur":
                header('Location: formateur.html');
                exit();
            case "chercheur":
                header('Location: chercheur.php');
                exit();
            case "recruteur":
                header('Location: recruteur.php');
                exit();
            default:
                echo "Veuillez choisir un rôle pour continuer.";
                break;
        }
    } else {
        // Si des champs sont vides, afficher un message d'erreur
        echo "Tous les champs doivent être remplis.";
    }
}
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
    <title>Login</title>
    <link rel="stylesheet" href="../../assests/front/css/login.css" />
    
    <script>
        var captchaVerified = false;

        function successCallBack(token) {
            captchaVerified = true;
            document.getElementById('captchaError').innerHTML = '';
        }
        function onLoadCallBack() {
            grecaptcha.render('divRecaptcha', {
                sitekey: '6Lc7XjEpAAAAALvcF8JdM3x2L8_i3ZlZNOvVn5xn',
                callback: successCallBack,
            })
        }
    </script>
    
    <script src="https://www.google.com/recaptcha/api.js?onload=onLoadCallBack&render=explicit" async defer></script>
</head>

<body>
    <div class="wrapper">
        <div class="title-text">
            <div class="title login">Login Form</div>
            <div class="title signup">Signup Form</div>
        </div>
        <div class="form-container">
            <div class="slide-controls">
                <input type="radio" name="slide" id="login" checked />
                <input type="radio" name="slide" id="signup" />
                <label for="login" class="slide login">Login</label>
                <label for="signup" class="slide signup">Signup</label>
                <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
                <!-- Formulaire de connexion -->
                <form action="" method="post" class="login">
                    <div class="field">
                        <input type="text" name="id_user" placeholder="Nom d'utilisateur" required />
                    </div>
                    <div class="field">
                        <input type="text" name="adresse_mail" placeholder="adresse d'utilisateur" required />
                    </div>
                    <div class="field">
                        <input type="password" name="mdp" placeholder="Mot de passe" required />
                    </div>

                    <div id="divRecaptcha" class="g-recaptcha"></div>
                <span class="error-message" id="captchaError"></span>

                    <a class="pull-right" href="RecupererMdp.php">Mot de passe perdu?</a>
                    <a class="pull-right" href="meteo.php">Mot de passe perdu?</a>
                    
                    <div class="field">
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="connecter" value="Login" id="connecter" />
                        </div>
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
    if (!captchaVerified) {
                document.getElementById('captchaError').textContent = 'Please verify the reCAPTCHA before submitting the form.';
                hasErrors = true;
            }
});
</script>


    <script src="../../assests/front/js/login.js"></script>
</body>
</html>
