<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDP oublié</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .user-details {
            margin-bottom: 20px;
        }

        .input-box {
            margin-bottom: 20px;
        }

        .input-box .details {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-box input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .button button[type="submit"] {
            width: 100%;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .button button[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="title login">Récupérer mot de passe </div>
    </header>
    <div class="container">
        <center>
            <div class="title">Mot de passe oublié</div>
        </center>
        <form method="post" action="../../Control/sendmail.php">
            <!-- Champ caché pour stocker l'origine de la demande -->
            <input type="hidden" name="origin" value="front">

            <div class="user-details">
                <div class="input-box">
                    <span class="details">Email</span>
                    <input type="email" name="email" placeholder="Entrez votre email" required>
                </div>
            </div>
            <div class="button">
                <button type="submit">Modifier le MDP</button>
            </div>
        </form>
    </div>
</body>
</html>
