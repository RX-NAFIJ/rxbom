<?php

$phn = $_REQUEST["phone"]; // Getting phone number from request

$curl = curl_init();

// Prepare the URL dynamically using the phone number
curl_setopt_array($curl, [
  CURLOPT_URL => 'https://meenabazardev.com/api/mobile/front/send/otp?CellPhone=' . urlencode($phn) . '&type=login',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_POST => true, // Use CURLOPT_POST for POST requests
  CURLOPT_HTTPHEADER => [
    'User-Agent: Dart/3.2 (dart:io)',
    'Accept-Encoding: gzip',
    'content-type: application/json',
    // Omit the Authorization header if not needed
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo 'cURL Error #:' . $err;
} else {
  echo $response;
}
