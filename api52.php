<?php

// Extracting phone number from request parameters
$phoneNumber = $_REQUEST["phone"];

// Generate a random string for email
$randomString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 8);
$email = "monirk2ib+" . $randomString . "@gmail.com"; // Random email

$url = "https://api.kfcbd.com/register";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "User-Agent: Dart/3.1 (dart:io)",
    "Accept-Encoding: gzip",
    "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$ps = array(
    "id" => null,
    "name" => "Sojib khane",
    "email" => $email, // Using the generated random email address
    "mobile" => $phoneNumber, // Using the extracted phone number
    "address" => null,
    "device_token" => "dLvYmVLqT02A_ZAFsFa8gJ:APA91bHC8CtSoO-TaN-NFm4obg10-Blc1vji2lbq82KbIyEGsXobCa8hZs-XbWjyTYnLE7KgYDRWKdteBgU6zvixuYG-vV4aGCEvkItCk6DiXYKVvd_ecWxqraqX6vyYJMfWDWDeF1EG",
    "token" => null,
    "dob" => "",
    "otp" => null
);

$data = json_encode($ps);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// For debugging only! You should remove these lines in production.
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);

// Check for errors
if(curl_errno($curl)) {
    echo 'Curl error: ' . curl_error($curl);
}

curl_close($curl);

echo $resp;

?>
