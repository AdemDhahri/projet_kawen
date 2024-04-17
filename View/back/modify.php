<?php
// Inclure le fichier de connexion et d'accès aux données
include('../../Control/signup.php');
include('../../Model/user.php');

// Vérifier si l'ID de l'utilisateur est passé en paramètre
if(isset($_GET['id'])) {
    // Récupérer l'ID de l'utilisateur depuis l'URL
    $userId = $_GET['id'];

    // Récupérer les données de l'utilisateur à partir de la base de données
    $CUser = new CUser();
    $user = $CUser->recupererClient($userId);

    // Vérifier si l'utilisateur existe
    if(isset($user)) {
        // Vérifier si le formulaire a été soumis
        if(isset($_POST['update'])) {
            // Récupérer les données du formulaire
            $nom_comp = $_POST['nom_comp'];
            $adresse_mail = $_POST['adresse_mail'];
            $mdp = $_POST['mdp'];
            $rep1 = $_POST['rep1'];
            $rep2 = $_POST['rep2'];
            $rep3 = $_POST['rep3'];
            $roles = $_POST['roles'];

            // Mettre à jour l'utilisateur dans la base de données
            $CUser->updateUser($userId, $nom_comp, $adresse_mail, $mdp, $rep1, $rep2, $rep3, $roles);

            // Rediriger vers la page de liste des utilisateurs après la mise à jour
            header("Location: afficheru.php");
            exit();
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
</head>
<body>
    <h1>Update User</h1>
    <form method="POST">
        <label for="nom">Nom complet:</label>
        <input type="text" id="nom" name="nom_comp" value="<?php echo isset($user['nom_comp']) ? $user['nom_comp'] : ''; ?>"><br>
        <label for="email">Adresse email:</label>
        <input type="email" id="email" name="adresse_mail" value="<?php echo isset($user['adresse_mail']) ? $user['adresse_mail'] : ''; ?>"><br>
        <label for="mdp">Mot de passe:</label>
        <input type="password" id="mdp" name="mdp" value="<?php echo isset($user['mdp']) ? $user['mdp'] : ''; ?>"><br>
        <label for="rep1">Réponse 1:</label>
        <input type="text" id="rep1" name="rep1" value="<?php echo isset($user['rep1']) ? $user['rep1'] : ''; ?>"><br>
        <label for="rep2">Réponse 2:</label>
        <input type="text" id="rep2" name="rep2" value="<?php echo isset($user['rep2']) ? $user['rep2'] : ''; ?>"><br>
        <label for="rep3">Réponse 3:</label>
        <input type="text" id="rep3" name="rep3" value="<?php echo isset($user['rep3']) ? $user['rep3'] : ''; ?>"><br>
        <label for="role">Role:</label>
        <select id="role" name="roles">
            <option value="admin" <?php echo (isset($user['roles']) && $user['roles'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
            <option value="user" <?php echo (isset($user['roles']) && $user['roles'] == 'user') ? 'selected' : ''; ?>>User</option>
        </select><br>
        <button type="submit" name="update">Update</button>
    </form>
</body>
</html>

<?php
    } else {
        echo "Utilisateur non trouvé.";
    }
} else {
    // Rediriger vers la page de liste des utilisateurs si aucun ID n'est passé en paramètre
    header("Location: list_users.php");
    exit();
}
?>
