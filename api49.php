<?php
$phn = $_REQUEST["phone"];

// ----------------------
// 1st Request: Register
// ----------------------
$url1 = "https://ultimateasiteapi.com/api/register-customer";

$data1 = json_encode(array(
    "customer_name" => "hu",
    "customer_password" => "12345678",
    "customer_password_confirmation" => "12345678",
    "customer_email" => $phn . "hu@gmail.com",
    "customer_contact" => $phn,
    "customer_dob" => "2000-01-02",
    "customer_gender" => "male"
));

$ch1 = curl_init($url1);
curl_setopt($ch1, CURLOPT_POST, true);
curl_setopt($ch1, CURLOPT_POSTFIELDS, $data1);
curl_setopt($ch1, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch1, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));

curl_setopt($ch1, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch1, CURLOPT_SSL_VERIFYPEER, false);

$response1 = curl_exec($ch1);
curl_close($ch1);

echo "Register Response:\n$response1\n\n";


// -----------------------------
// 2nd Request: Forget Password
// -----------------------------
$url2 = "https://ultimateasiteapi.com/api/forget-customer-password";

$data2 = json_encode(array(
    "user_input" => $phn
));

$headers2 = array(
    'accept: application/json',
    'accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6',
    'cache-control: no-cache',
    'content-type: application/json',
    'origin: https://ultimateorganiclife.com',
    'pragma: no-cache',
    'priority: u=1, i',
    'referer: https://ultimateorganiclife.com/',
    'retry-after: 3600',
    'sec-ch-ua: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: cross-site',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36'
);

$ch2 = curl_init($url2);
curl_setopt($ch2, CURLOPT_POST, true);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $data2);
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers2);

curl_setopt($ch2, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, false);

$response2 = curl_exec($ch2);
curl_close($ch2);

echo "Forget Password Response:\n$response2\n";
?>
