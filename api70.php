<?php

$phn = $_REQUEST["phone"]; // User input phone number
$mobile = $phn;            // API expects full number 01XXXXXXXXX format

$url = "https://api.garibookadmin.com/api/v3/user/login";

$data = json_encode([
    "mobile" => $mobile,
    "recaptcha_token" => "garibookcaptcha",
    "channel" => "web"
]);

$headers = [
    "Accept-Language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Origin: https://garibook.com",
    "Pragma: no-cache",
    "Referer: https://garibook.com/",
    "Sec-Fetch-Dest: empty",
    "Sec-Fetch-Mode: cors",
    "Sec-Fetch-Site: cross-site",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36",
    "accept: application/json",
    "content-type: application/json",
    'sec-ch-ua: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"',
    "sec-ch-ua-mobile: ?0",
    'sec-ch-ua-platform: "Windows"'
];

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// SSL Fix (optional)
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
}

curl_close($ch);

echo $response;

?>
