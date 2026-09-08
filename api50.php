<?php

// Capture the phone number from the request
$phn = $_REQUEST['phone'] ?? null;

if ($phn === null) {
    echo "Error: Phone number is required.";
    exit;
}

// Remove leading zero and format the phone number
$formatted_phn = '+88' . ltrim($phn, '0');

// Generate random first and last names
$firstNames = ["John", "Jane", "Alex", "Chris", "Taylor", "Morgan", "Jordan", "Sam"];
$lastNames = ["Smith", "Doe", "Brown", "Wilson", "Anderson", "Taylor", "Clark", "Johnson"];
$randomFirstName = $firstNames[array_rand($firstNames)];
$randomLastName = $lastNames[array_rand($lastNames)] . rand(100, 999);  // Adds random number for uniqueness

// Generate a random email address using phone number for uniqueness
$randomEmail = "{$phn}_" . rand(100, 999) . "@example.com";

// Forgot Password API
$url = "https://foodaholic.com.bd/api/v1/auth/forgot-password";
$payload = json_encode(["phone" => $formatted_phn]);

$headers = [
    'User-Agent: Dart/3.2 (dart:io)',
    'Accept-Encoding: gzip',
    'Content-Type: application/json; charset=UTF-8',
    'authorization: Bearer null',
    'longitude: ""',
    'zoneid: ""',
    'latitude: ""',
    'x-localization: en'
];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => $headers,
]);

$response = curl_exec($curl);
$http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
curl_close($curl);

echo "Forgot Password Response: " . $response . "\n";

if ($http_code == 404) {
    // Sign-up API if forgot-password request returns 404
    $url = "https://foodaholic.com.bd/api/v1/auth/sign-up";
    $payload = json_encode([
        "f_name" => $randomFirstName,
        "l_name" => $randomLastName,  
        "phone" => $formatted_phn,
        "email" => $randomEmail,
        "password" => "Riyaz@123",
        "ref_code" => ""
    ]);

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => $headers,
    ]);

    $response = curl_exec($curl);
    curl_close($curl);

    echo "Sign-up Response: " . $response;
}
?>
