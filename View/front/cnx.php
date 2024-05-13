<?php 
session_start(); 
include "../../config.php";

if (isset($_SESSION['id_user']) && isset($_SESSION['mdp'])) {
    $id_user = $_SESSION['id_user'];
    $mdp = $_SESSION['mdp'];

    try {
        $pdo = new PDO("mysql:host=localhost;dbname=projet", "votre_nom_utilisateur", "votre_mot_de_passe");
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
        $_SESSION['nom_comp'] = $user['nom_comp'];
        $_SESSION['adresse_mail'] = $user['adresse_mail'];
      
        $_SESSION['roles'] = $user['roles'];
        header("Location: chercheur.php");
        exit();
    } else {
        header("Location: login.php?error=Incorrect User name or password");
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Mettez ici les balises meta, les liens CSS et autres éléments d'en-tête nécessaires -->
</head>
<body>
    <!-- Mettez ici le contenu de la page -->
    <h1>Bienvenue, <?php echo $_SESSION['nom_comp']; ?>!</h1>
    <p>Votre adresse e-mail est : <?php echo $_SESSION['adresse_mail']; ?></p>
    <!-- Ajoutez d'autres éléments HTML selon vos besoins -->
</body>
</html>
