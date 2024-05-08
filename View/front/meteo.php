<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Current Weather</title>
</head>
<body>
    <h1>Current Weather</h1>
    <div id="weather"></div>

    <?php
    // Replace 'YOUR_API_KEY' with your actual API key
    $apiKey = '402cc9695f30e4e1c53af396f42c2518';
    $cityName = 'TUNIS';

    // Fetch the current weather data
    $weatherData = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q={$cityName}&units=metric&appid={$apiKey}");
    $data = json_decode($weatherData);

    // Display the weather information
    if (isset($data->name)) {
    ?>
        <p>City: <?php echo $data->name; ?></p>
        <p>Temperature: <?php echo $data->main->temp; ?>°C</p>
        <p>Feels Like: <?php echo $data->main->feels_like; ?>°C</p>
        <p>Humidity: <?php echo $data->main->humidity; ?>%</p>
        <p>Weather: <?php echo $data->weather[0]->description; ?></p>
    <?php
    }
    ?>
</body>
</html>