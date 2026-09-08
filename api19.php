<?php

$phn = $_REQUEST["phone"];


// Set the JSON payload
$data = [
    'phone' => $phn,
    'type' => 'student',
    'auth_type' => 'signup',
    'vendor' => 'shikho'
];

// Convert data to JSON format
$data_json = json_encode($data);

// Set cURL options
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.shikho.com/auth/v2/send/sms',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $data_json,
    CURLOPT_HTTPHEADER => array(
        'Host: api.shikho.com',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0) Gecko/20100101 Firefox/109.0',
        'Accept: application/json, text/plain, */*',
        'Accept-Language: en-US,en;q=0.5',
        'Accept-Encoding: gzip, deflate, br',
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_json),
        'Origin: https://app.shikho.com',
        'Connection: keep-alive',
        'Referer: https://app.shikho.com/',
        'Sec-Fetch-Dest: empty',
        'Sec-Fetch-Mode: cors',
        'Sec-Fetch-Site: same-site'
    ),
));

// Execute the request
$response = curl_exec($curl);

// Check for errors
if ($response === false) {
    echo 'cURL error: ' . curl_error($curl);
}

// Close cURL resource
curl_close($curl);

// Output the response
echo $response;
