<?php

$phone = $_REQUEST["phone"]; // User phone number input

// Generate random name
$random_name = generateRandomName();
// Generate random email
$random_string = generateRandomString();
$random_number = generateRandomNumber();
$email = $random_string . $random_number . "@gmail.com";

// Validate email format
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Invalid email format";
    exit;
}

//
// --------------------- REGISTER API ---------------------
//
$register_url = "https://app.eonbazar.com/api/auth/register";

$register_headers = array(
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36",
    "Content-Type: application/json",
    "carttoken: 5d7bcfdb-27ae-453f-a4b9-6cf94da73032",
    "ordersource: web",
    "origin: https://eonbazar.com",
    "referer: https://eonbazar.com/",
    "sec-ch-ua: \"Chromium\";v=\"122\", \"Not(A:Brand\";v=\"24\", \"Google Chrome\";v=\"122\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-site",
    "x-requested-with: XMLHttpRequest"
);

$register_data = json_encode([
    "mobile" => $phone,
    "name" => $random_name,
    "password" => "Soji12345",
    "email" => $email
]);

$ch = curl_init($register_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $register_headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $register_data);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$register_response = curl_exec($ch);
curl_close($ch);

echo "REGISTER RESPONSE: " . $register_response . "\n\n";


//
// --------------------- LOGIN OTP SEND API ---------------------
//
$login_url = "https://app.eonbazar.com/api/auth/login";

$login_headers = array(
    "accept: */*",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "cache-control: no-cache",
    "carttoken: 6c2f5732-65f7-461d-be7e-5dc887af6d37",
    "content-type: application/json",
    "origin: https://eonbazar.com",
    "pragma: no-cache",
    "priority: u=1, i",
    "referer: https://eonbazar.com/",
    'sec-ch-ua: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"',
    "sec-ch-ua-mobile: ?0",
    'sec-ch-ua-platform: "Windows"',
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-site",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36"
);

// Login OTP requires mobile WITHOUT starting 0
$trim_mobile = ltrim($phone, "0");

$login_data = json_encode([
    "method" => "otp",
    "mobile" => $trim_mobile
]);

$ch = curl_init($login_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $login_headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, $login_data);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$login_response = curl_exec($ch);
curl_close($ch);

echo "LOGIN OTP RESPONSE: " . $login_response;


//
// --------------------- RANDOM GENERATOR FUNCTIONS ---------------------
//

// Random Name Generator
function generateRandomName($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyz';
    $name = '';
    for ($i = 0; $i < $length; $i++) {
        $name .= $characters[rand(0, strlen($characters) - 1)];
    }
    return ucfirst($name); // First letter capital
}

// Random Email String
function generateRandomString($length = 10) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $randomString;
}

// Random Number for Email
function generateRandomNumber($length = 4) {
    $numbers = '0123456789';
    $randomNumber = '';
    for ($i = 0; $i < $length; $i++) {
        $randomNumber .= $numbers[rand(0, strlen($numbers) - 1)];
    }
    return $randomNumber;
}

?>
