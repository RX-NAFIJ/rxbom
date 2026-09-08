<?php

$phn = $_REQUEST["phone"];  // phone parameter চাইলে ব্যবহার করবে

$url = "https://api.doctime.com.bd/api/authenticate";

$data = json_encode(array(
    "contact_no" => $phn,        // তোমার নাম্বার যাবে
    "country_calling_code" => "88"
));

$headers = array(
    'User-Agent: okhttp/4.12.0',
    'Accept: application/json',
    'Accept-Encoding: gzip',
    'Content-Type: application/json',
    'authorization: ',
    'app-version: 0.29.11',
    'device-brand: Genymobile',
    'platform: Android',
    'ads-id: 25cc7660-8d1d-4a7b-bdee-ce6b8f9d4934',
    'device-model: Galaxy S4',
    'device-token: e7G4_g3QSlKaRPSu5PsC7c:APA91bHLc8RaCWLp6lYXeZuWOnAKNcuH0Ak9KVUgLWbYFWeeB2r76ucOcPNoUkm8VdiCtSDzHvBdxN6ezZNLwQ2MTfmgrDOiKB0tDHaUk9I31W_JpP74QQ8',
    'os-version: 11',
    'device-id: c70f19801544723c',
    'locale: bn',
    'content-type: application/json; charset=UTF-8'
);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Enable HTTP/2
curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_2_0);

// Disable SSL verify (optional)
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if ($response === false) {
    echo "CURL Error: " . curl_error($ch);
} else {
    echo "Response: " . $response;
}

curl_close($ch);

?>
