<?php

$phn = $_REQUEST['phone'];
// Remove leading zero, if it exists
$phn = ltrim($phn, '0');

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => 'https://dressup.com.bd/wp-json/api/flutter_user/digits/send_otp',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode([
    "country_code" => "+880",
    "mobile" => $phn,
    "type" => "login",
    "whatsapp" => false
  ]),
  CURLOPT_HTTPHEADER => [
    'User-Agent: Dart/3.5 (dart:io)',
    'Accept-Encoding: gzip',
    'content-type: application/json; charset=utf-8',
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
