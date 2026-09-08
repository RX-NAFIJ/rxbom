<?php

$phone = $_REQUEST['phone']; // Retrieve phone number from input

$url = "https://admin.beautybooth.com.bd/api/v2/auth/signup";

// Set up the payload dynamically
$payload = json_encode([
    "phone" => $phone
]);

$headers = [
    'User-Agent: Dart/2.19 (dart:io)',
    'Accept: application/json',
    'Accept-Encoding: gzip',
    'Content-Type: application/json; charset=utf-8'
];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => $headers,
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}
?>
