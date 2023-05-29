<?php

header('Content-Type: application/json');

$api_key = "7698a79420d14b23acd6db65fd389b11";
$search_query = urlencode($_GET["q"]);
$max_results = 3; // Imposta il limite massimo di giochi da visualizzare

$url = "https://api.rawg.io/api/games?key={$api_key}&search={$search_query}&category=games";

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($curl);

if ($response !== false) {
    
    curl_close($curl);
    echo $response;
    
} else {
    echo "Errore durante la richiesta API.";
}



?>