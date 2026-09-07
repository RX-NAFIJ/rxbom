<?php

// Custom phone number parameter
$phoneNumber = $_REQUEST["phone"]; // You should validate and sanitize this input before using it

$url = 'https://api.mygp.cinematic.mobi/api/v1/send-common-otp/wap/' . $phoneNumber;
$headers = array(
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-US,en;q=0.9,ru;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/json;charset=UTF-8',
    'Origin: https://cinematic.mobi',
    'Referer: https://cinematic.mobi/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"'
);
$data = array(
    'headers' => array(
        'Content-Type' => 'application/json',
        'Access-Control-Allow-Origin' => '*',
        'Authorization' => 'Bearer 1pake4mh5ln64h5t26kpvm3iri'
    )
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
$response = curl_exec($ch);
curl_close($ch);

echo $response;

?>
