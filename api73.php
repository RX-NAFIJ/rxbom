<?php

$phn = $_REQUEST["phone"];     // user number: 019xxxxx
$mobile = ltrim($phn, "0");    // API requires: 199xxxxxxx → NO leading zero

$url = "https://bdia.btcl.com.bd/client/client/registrationMobVerification-2.jsp?moduleID=1";

$postFields = http_build_query([
    "actionType" => "otpSend",
    "mobileNo" => $mobile
]);

$headers = [
    "accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "origin: https://bdia.btcl.com.bd",
    "pragma: no-cache",
    "priority: u=0, i",
    "referer: https://bdia.btcl.com.bd/client/client/registrationMobVerification-1.jsp?moduleID=1",
    'sec-ch-ua: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"',
    "sec-ch-ua-mobile: ?0",
    'sec-ch-ua-platform: "Windows"',
    "sec-fetch-dest: document",
    "sec-fetch-mode: navigate",
    "sec-fetch-site: same-origin",
    "sec-fetch-user: ?1",
    "upgrade-insecure-requests: 1",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36"
];

// Cookies from request
$cookies = "JSESSIONID=A0A3A69EB76E7313AE7641F9C08F08F7; perf_dv6Tr4n=1";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postFields);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_COOKIE, $cookies);

// SSL (optional)
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL ERROR: " . curl_error($ch);
}

curl_close($ch);

echo $response;

?>
