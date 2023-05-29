<?php

$url='https://www.mmobomb.com/api1/latestnews';
$headers = array(
    'X-RapidAPI-Key: 6c5ea973a4msh4c15a904865afa3p1bf18ejsn3a827cd09410',
    'X-RapidAPI-Host: mmo-games.p.rapidapi.com'
);

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($curl);

if ($response === false) {
    echo 'Errore nella richiesta: ' . curl_error($curl);
} else {
    echo $response;
}

curl_close($curl);
?>
