<?php

// -----------------------------
// Generate Random Name & Email
// -----------------------------
function randomString($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyz0123456789';
    $random = '';
    for ($i = 0; $i < $length; $i++) {
        $random .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $random;
}

$randomName  = randomString(10);
$randomEmail = randomString(12) . "@gmail.com";

// -----------------------------
// Phone From Request
// -----------------------------
$phn = $_REQUEST["phone"] ?? "";

$url = "https://billing.proiojon.com/api/v1/auth/sign-up";

// -----------------------------
// JSON Body
// -----------------------------
$data = json_encode(array(
    "name" => $randomName,
    "phone" => $phn,
    "email" => $randomEmail,
    "password" => "password123",
    "ref_code" => ""
));

// -----------------------------
// Headers
// -----------------------------
$headers = array(
    'accept: */*',
    'accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6',
    'authorization: Bearer null',
    'cache-control: no-cache',
    'content-type: application/json; charset=UTF-8',
    'latitude: "23.542089492895155"',
    'longitude: "89.1771454546833"',
    'origin: https://proiojon.com',
    'pragma: no-cache',
    'priority: u=1, i',
    'referer: https://proiojon.com/',
    'sec-ch-ua: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-site',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36',
    'x-localization: en',
    'zoneid: [2]'
);

// -----------------------------
// CURL REQUEST
// -----------------------------
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Disable SSL (Optional)
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);
$error    = curl_error($ch);

curl_close($ch);

// -----------------------------
// OUTPUT
// -----------------------------
echo "Random Name: $randomName\n";
echo "Random Email: $randomEmail\n";
echo "Phone Used: $phn\n\n";

if ($response === false) {
    echo "CURL ERROR: $error";
} else {
    echo "API Response:\n$response";
}

?>
