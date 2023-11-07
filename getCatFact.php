<?php 
function getCatFact()
{
    $parameterValue = $_GET['param']; 

    if ($parameterValue !== '42') {
        return 'Wrong input bitch!';
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://catfact.ninja/fact');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo 'cURL error: ' . curl_error($ch);
    }

    curl_close($ch);

    $data = json_decode($response);

    if ($data && isset($data->fact)) {
        echo $data->fact;
    } else {
        echo 'No cat fact yet';
    }
}
getCatFact();
?>
