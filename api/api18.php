<?php

$phoneNumber = $_REQUEST["phone"];
$url = "https://app.kireibd.com/api/v2/send-login-otp";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36",
    "Content-Type: application/json",
    "x-xsrf-token: eyJpdiI6Imh2dU9zVk9rQUR5TjlsQVBvd2F2cVE9PSIsInZhbHVlIjoiQlZUdXlHcmpES2FGUXBja1dZbUZXZG9MVksreEwxa1ZzZGgzYml3MHIxMmlraURSTjVLUnpPY0ZEeEJmSldqNGNaOG5rc0FNYkVDMlJqakJmZGVlckdvNVFobnBzTFpOSnpsbVZENlVvUW5JSHhvMkYxd1VKcG9Zc0tmTUlEdUQiLCJtYWMiOiJiZjIwNmQ0OWNlZTFiYWMyZWQ4YWRmMTEzYjAwNWFkOTNmOTgzMzRiODJlZWMxOWM0MTFhOGNkODhjNzQzZWQxIiwidGFnIjoiIn0=",
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$data = json_encode(array(
    "email" => $phoneNumber
));

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// For debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);

echo($resp);

?>
