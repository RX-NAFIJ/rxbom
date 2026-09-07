<?php

$phn = $_REQUEST['phone'];

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => 'https://bcsexamaid.com/api/generateotp',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode([
    "mobile" => $phn,
    "softtoken" => "Rifat.Admin.2022"
  ]),
  CURLOPT_HTTPHEADER => [
    'User-Agent: Dart/3.1 (dart:io)',
    'Accept: application/json',
    'Accept-Encoding: gzip',
    'Content-Type: application/json; charset=utf-8',
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
