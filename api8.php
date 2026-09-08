<?php

$phn = $_REQUEST["phone"];       // User input: 0199xxxxxxx
$number = "+88" . $phn;          // API requires +880XXXXXXXXXX

$url = "https://api.deeptoplay.com/v2/auth/login?country=BD&platform=web&language=en";

$data = json_encode([
    "number" => $number
]);

$headers = [
    "accept: application/json",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "authorization:",
    "cache-control: no-cache",
    "content-type: application/json",
    "origin: https://www.deeptoplay.com",
    "pragma: no-cache",
    "priority: u=1, i",
    "referer: https://www.deeptoplay.com/",
    'sec-ch-ua: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"',
    "sec-ch-ua-mobile: ?0",
    'sec-ch-ua-platform: "Windows"',
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-site",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36"
];

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// SSL disable (optional, avoids certificate issues)
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL ERROR: " . curl_error($ch);
}

curl_close($ch);

echo $response;

?>
