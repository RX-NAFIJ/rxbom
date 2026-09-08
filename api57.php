<?php

$phn = $_REQUEST["phone"]; // User phone input
$mobile = $phn;

$url = "https://api.kormi24.com/graphql";

$additional = json_encode([
    "user_agent" => "web",
    "mobile" => $mobile
]);

$data = [
    "operationName" => "sendOTP",
    "variables" => [
        "type" => 1,
        "mobile" => $mobile,
        "additional" => $additional,
        "hash" => "c3275518789fb74ac6cc30ce030afbf0bdff578579e2fb64571e63f5b2680180"
    ],
    "query" => "mutation sendOTP(\$mobile: String!, \$type: Int!, \$additional: String, \$hash: String!) {
      sendOTP(mobile: \$mobile, type: \$type, additional: \$additional, hash: \$hash) {
        status
        message
        __typename
      }
    }"
];

$jsonData = json_encode($data);

$headers = [
    "accept: */*",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "authorization: tok",
    "cache-control: no-cache",
    "content-type: application/json",
    "origin: https://www.kormi24.com",
    "pragma: no-cache",
    "priority: u=1, i",
    "referer: https://www.kormi24.com/",
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
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Avoid SSL issues
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
}

curl_close($ch);

echo $response;

?>
