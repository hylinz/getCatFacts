<?php
function getCatFact()
{
    $parameterValue = $_GET['param'];

    if ($parameterValue !== '42') {
        // Set a 403 Forbidden response code
        http_response_code(403);
        $data = 'Wrong input, access denied.';
        echo $data;
        return false;
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://catfact.ninja/fact');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        // Set a 404 Not Found response code for cURL errors
        http_response_code(404);
        echo 'cURL error: ' . curl_error($ch);
    } else {
        // Set a 200 OK response code for a successful response
        http_response_code(200);

        curl_close($ch);

        $data = json_decode($response);

        if ($data && isset($data->fact)) {
            echo $data->fact;
        } else {
            echo 'No cat fact yet';
        }
    }
}

getCatFact();
?>
