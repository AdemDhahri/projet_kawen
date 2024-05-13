<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Converter</title>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        #currencyForm {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            font-weight: bold;
        }

        input[type="number"],
        input[type="text"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        #resultLabel {
            display: block;
            margin-top: 10px;
            text-align: center;
            font-weight: bold;
        }
    </style>
<body>
    <h1>Currency Converter</h1>
    <form id="currencyForm">
        <label for="amount">Amount:</label>
        <input type="number" id="amount" name="amount" step="0.01" required><br><br>
        <label for="currency">Target Currency:</label>
        <input type="text" id="currency" name="currency" required><br><br>
        <button type="submit">Convert</button>
    </form>
    <label id="resultLabel"></label> <!-- Utilisation d'une balise label pour afficher le résultat -->

    <script>
        document.getElementById("currencyForm").addEventListener("submit", function(event) {
            event.preventDefault();
            const amount = parseFloat(document.getElementById("amount").value);
            const currency = document.getElementById("currency").value.toUpperCase();
            fetch(`?amount=${amount}&target_currency=${currency}`)
                .then(response => response.text())
                .then(result => {
                    document.getElementById("resultLabel").innerHTML = result; // Utilisation de innerHTML pour insérer du contenu HTML
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById("resultLabel").innerHTML = "Conversion failed";
                });
        });
    </script>

    <?php
    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["amount"]) && isset($_GET["target_currency"])) {
        $amount = $_GET["amount"];
        $targetCurrency = $_GET["target_currency"];
        $baseCurrency = "TND"; // Default base currency

        $url = "https://api.exchangerate-api.com/v4/latest/" . $baseCurrency;

        try {
            $response = file_get_contents($url);
            $data = json_decode($response, true);

            if ($data && isset($data['rates'])) {
                if (array_key_exists($targetCurrency, $data['rates'])) {
                    $rate = $data['rates'][$targetCurrency];
                    $convertedAmount = round($amount * $rate, 2);
                    echo $convertedAmount;
                } else {
                    echo 'Error: Target currency "' . $targetCurrency . '" not found in exchange rates.';
                }
            } else {
                echo 'Error: Unable to retrieve exchange rates from API.';
            }
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    ?>
</body>
</html>
