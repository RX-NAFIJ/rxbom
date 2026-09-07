<?php

$phone = $_REQUEST["phone"]; // Dynamic phone number input
$phoneFormatted = "+88" . $phone; // BDTickets requires +880 format

$url = "https://api.bdtickets.com:20100/v1/auth";

$headers = [
    "accept: application/json, text/plain, */*",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "cache-control: no-cache",
    "content-type: application/json",
    "origin: https://bdtickets.com",
    "pragma: no-cache",
    "priority: u=1, i",
    "referer: https://bdtickets.com/",
    "sec-ch-ua: \"Google Chrome\";v=\"143\", \"Chromium\";v=\"143\", \"Not A(Brand\";v=\"24\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-site",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36"
];

// JSON Body
$data = [
    "createUserCheck" => true,
    "phoneNumber" => $phoneFormatted,
    "applicationChannel" => "WEB_APP"
];

$payload = json_encode($data);

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => $headers,
]);

$response = curl_exec($ch);
$error = curl_error($ch);
curl_close($ch);

if ($error) {
    echo "cURL Error: " . $error;
} else {
    echo $response;
}
