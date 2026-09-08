<?php

// Check if the phone number is passed via HTTP request
if (isset($_REQUEST["phone"])) {
    $phn = $_REQUEST["phone"]; // Get the phone number from the request
} else {
    die("Phone number not provided.");
}

// Function to generate a random name
function random_name() {
    $first_names = ["John", "Riyaz", "Sarah", "Michael", "Emma"];
    $last_names = ["Smith", "Ahmed", "Khan", "Doe", "Patel"];
    
    $first_name = $first_names[array_rand($first_names)];
    $last_name = $last_names[array_rand($last_names)];
    
    return $first_name . ' ' . $last_name;
}

// Signup URL
$url_signup = "https://fabrilife.com/api/wp-json/wc/v2/user/register";

// Payload with random name, email, phone number, and password
$payload_signup = json_encode([
    "name" => random_name(),
    "email" => $phn . "@gmail.com", // Placeholder email using phone number
    "phone" => $phn,
    "password" => "Riyaz@123" // Static password, you can change this
]);

// Headers for the signup request
$headers_signup = [
    'User-Agent: okhttp/3.12.12',
    'Accept-Encoding: gzip',
    'Content-Type: application/json'
];

// Initialize cURL session for signup
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url_signup);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload_signup);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_signup);

// Execute the signup request
$response_signup = curl_exec($ch);
$signup_error = curl_error($ch);

// Close the cURL session
curl_close($ch);

// Output the signup response
if ($signup_error) {
    echo "cURL Error for Signup: " . $signup_error . "\n";
} else {
    echo "Signup Response: " . $response_signup . "\n";
}

// OTP Request
$url_otp = "https://fabrilife.com/api/wp-json/wc/v2/user/phone-login/" . $phn;

// Headers for OTP request
$headers_otp = [
    'User-Agent: okhttp/3.12.12',
    'Accept-Encoding: gzip',
    'otpkey: uzmgAMHfQrukDqV1ecZ2xJGwqjiVPnE0byuqw2MW'  // Replace with a valid OTP key if required
];

// Initialize cURL session for OTP
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url_otp);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers_otp);

// Execute the OTP request
$response_otp = curl_exec($ch);
$otp_error = curl_error($ch);

// Close the cURL session
curl_close($ch);

// Output the OTP response
if ($otp_error) {
    echo "cURL Error for OTP: " . $otp_error . "\n";
} else {
    echo "OTP Response: " . $response_otp . "\n";
}

?>
