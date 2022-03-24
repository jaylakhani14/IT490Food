<?php

$url = 'https://api.spoonacular.com/recipes/random?apiKey=be7f9060c2ad4dae9e094291a14d27bf&number=100';

$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_HEADER, false);

$data = curl_exec($curl);
echo "<pre>";
print_r($data);
echo "</pre>";

curl_close($curl);

?>
