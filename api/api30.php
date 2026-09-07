<?php

$phone = $_REQUEST['phone']; // Get phone dynamically

// -----------------------------
// 1) EXISTS CHECK API
// -----------------------------
$url1 = "https://prod.etestpaper.net/api/exists";

$data1 = json_encode([
    "phone" => $phone
]);

$ch1 = curl_init();

curl_setopt($ch1, CURLOPT_URL, $url1);
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $data1);

$headers = [
    "accept: application/json, text/plain, */*",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "cache-control: no-cache",
    "content-type: application/json",
    "origin: https://www.etestpaper.net",
    "pragma: no-cache",
    "priority: u=1, i",
    "referer: https://www.etestpaper.net/",
    'sec-ch-ua: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"',
    "sec-ch-ua-mobile: ?0",
    'sec-ch-ua-platform: "Windows"',
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-site",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36"
];

curl_setopt($ch1, CURLOPT_HTTPHEADER, $headers);

$response1 = curl_exec($ch1);

if (curl_errno($ch1)) {
    echo "EXISTS API Error: " . curl_error($ch1);
} else {
    echo "<b>EXISTS Response:</b> " . $response1 . "<br><br>";
}

curl_close($ch1);


// -----------------------------
// 2) SEND OTP API
// -----------------------------
$url2 = "https://prod.etestpaper.net/api/v4/auth/otp";

$data2 = json_encode([
    "phone" => $phone,
    "recaptcha" => "668be73dcad2999a957ff440"
]);

$ch2 = curl_init();

curl_setopt($ch2, CURLOPT_URL, $url2);
curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $data2);

curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);

$response2 = curl_exec($ch2);

if (curl_errno($ch2)) {
    echo "OTP API Error: " . curl_error($ch2);
} else {
    echo "<b>OTP Response:</b> " . $response2;
}

curl_close($ch2);

?>
