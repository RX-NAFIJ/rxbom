<?php

$phn = $_REQUEST["phone"]; // user input phone number

$url = "https://chokrojan.com/api/v1/passenger/login/mobile";

$data = json_encode([
    "mobile_number" => $phn,
    "otp_token" => "826cb796fd3f163c420c8da1238aa9d1c4da36d4f5729d711a9cacaca47df5a7"
]);

$headers = [
    "Accept: application/json, text/plain, */*",
    "Accept-Language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "Access-Control-Allow-Origin: *",
    "Authorization: Bearer null",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Type: application/json;charset=UTF-8",
    "Origin: https://chokrojan.com",
    "Pragma: no-cache",
    "Referer: https://chokrojan.com/login",
    "Sec-Fetch-Dest: empty",
    "Sec-Fetch-Mode: cors",
    "Sec-Fetch-Site: same-origin",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36",
    "company-id: 1",
    "domain-name: chokrojan.com",
    'sec-ch-ua: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"',
    "sec-ch-ua-mobile: ?0",
    'sec-ch-ua-platform: "Windows"',
    "user-platform: 3"
];

// Cookies
$cookies = "_ga=GA1.1.87279155.1765548489; _fbp=fb.1.1765548490969.104231091630094622; _ga_TXX7J24H07=GS2.1.s1765548489\$o1\$g1\$t1765548493\$j56\$l0\$h0";

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_COOKIE, $cookies);

// SSL Disable (optional)
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
}

curl_close($ch);

echo $response;

?>
