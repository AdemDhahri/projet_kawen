
<?php
// Inclure les fichiers nécessaires
session_start();

include('../../Model/user.php');
include('../../Control/signup.php');

// Vérifier si le formulaire de connexion est soumis
if (isset($_POST['connecter'])) {
    $id_user = $_POST['id_user'];
    $mdp = $_POST['mdp'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=votre_base_de_donnees", "votre_nom_utilisateur", "votre_mot_de_passe");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erreur de connexion à la base de données: " . $e->getMessage());
    }

    $sql = "SELECT * FROM user WHERE id_user = :id_user AND mdp = :mdp";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id_user', $id_user);
    $stmt->bindParam(':mdp', $mdp);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        $_SESSION['id_user'] = $user['id_user']; // Stocker l'ID de l'utilisateur dans la session
        $_SESSION['nom_comp'] = $user['nom_comp'];
        $_SESSION['adresse_mail'] = $user['adresse_mail'];
        $_SESSION['rep1'] = $user['rep1'];
        $_SESSION['rep2'] = $user['rep2'];
        $_SESSION['rep3'] = $user['rep3'];
        $_SESSION['roles'] = $user['roles'];
        header("Location: chercheur.php");
        exit();
    } else {
        header("Location: login.php?error=Identifiant ou mot de passe incorrect");
        exit();
    }
}

$CUser = new CUser();

// Traitement du formulaire d'inscription
if (isset($_POST['submit'])) {
    // Vérifier si tous les champs sont remplis
    if (!empty($_POST['nom_comp']) && !empty($_POST['adresse_mail']) && !empty($_POST['mdp']) && !empty($_POST['rep1']) && !empty($_POST['rep2']) && !empty($_POST['rep3']) && !empty($_POST['roles'])) {
        // Récupérer les données du formulaire
        $nom_comp = $_POST['nom_comp'];
        $adresse_mail = $_POST['adresse_mail'];
        $mdp = $_POST['mdp'];
        $rep1 = $_POST['rep1'];
        $rep2 = $_POST['rep2'];
        $rep3 = $_POST['rep3'];
        $roles = $_POST['roles'];

        // Créer un nouvel objet User
        $user = new User($nom_comp, $adresse_mail, $mdp, $rep1, $rep2, $rep3, $roles);

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
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../assests/front/css/login.css" />
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
                <form action="cnx.php" method="post" class="login">
                    <div class="field">
                        <input type="text" name="id_user" placeholder="Nom d'utilisateur" required />
                    </div>
                    <div class="field">
                        <input type="password" name="mdp" placeholder="Mot de passe" required />
                    </div>
                    <div class="field">
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="connecter" value="Login" id="connecter" />
                        </div>
                    </div>
                </form>
                <!-- Formulaire d'inscription -->
                <form method="post" class="signup" id="signup-form">
                    <div class="field">
                        <input type="text" name="nom_comp" placeholder="Nom d'utilisateur" required />
                    </div>
                    <div class="field">
                        <input type="email" name="adresse_mail" placeholder="Email" required />
                    </div>
                    <div class="field">
                        <input type="password" name="mdp" placeholder="Mot de passe" required />
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
                        <select name="roles">
                            <option value="">Choisir le rôle</option>
                            <option value="formateur">Formateur</option>
                            <option value="chercheur">Chercheur d'emploi</option>
                            <option value="recruteur">Recruteur</option>
                        </select>
                    </div>
                    <div class="field">
                        <div class="field btn">
                            <div class="btn-layer"></div>
                            <input type="submit" name="submit" value="Signup" id="submit" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../../assests/front/js/login.js"></script>
</body>
</html>
