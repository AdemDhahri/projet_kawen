<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envoyer un mail à l'utilisateur</title>
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

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            height: 200px;
        }

        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>

</head>
<body>
    <div class="container">
        <h1>Envoyer un mail à l'utilisateur</h1>
        <form id="mailForm" method="post" action="../../Control/sendmail.php">
            <!-- Champ caché pour stocker l'origine de la demande -->
            <input type="hidden" name="origin" value="back">

            <label for="email">Adresse email de l'utilisateur:</label>
            <input type="text" id="email" name="email" placeholder="Entrez l'adresse email" required>

            <label for="message">Message:</label>
            <textarea id="message" name="message" placeholder="Entrez votre message" required></textarea>

            <button type="submit">Envoyer</button>
        </form>
    </div>
</body>
</html>

</html>
