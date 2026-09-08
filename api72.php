<?php

// Function to generate a random device ID
function generate_device_id() {
    return uniqid('', true); // Generates a unique device ID
}

// Input phone number
$phn = $_REQUEST["phone"];

// Generate a random device ID
$device_id = generate_device_id();

// First request to get the token
$url = "https://user.kotha.im/mobile/api/deviceAuthWithRecipientStatus";

$payload = json_encode([
    "deviceId" => $device_id,  // Use the randomly generated device ID
    "recipient" => "+88" . $phn
]);

$headers = [
    'User-Agent: okhttp/4.12.0',
    'Accept-Encoding: gzip',
    'Content-Type: application/json; charset=UTF-8'
];

// Initialize cURL session
$curl = curl_init($url);
curl_setopt_array($curl, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => $payload,
    CURLOPT_HTTPHEADER => $headers,
]);

// Execute first request
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);

// Print the entire response for debugging purposes
echo "First response: " . $response . "\n";

// Extract the token if present in the response JSON
$token = null;
if (!$err) {
    $data = json_decode($response, true);  // Parse the response JSON
    $token = $data['token'] ?? null; // Extract the token value if it exists
    if ($token) {
        echo "Token: " . $token . "\n";
    } else {
        echo "Error: Token not found in the response.\n";
    }
} else {
    echo 'cURL Error: ' . $err . "\n";
}

// Second request if token is available
if ($token) {
    $url = "https://user.kotha.im/mobile/api/sendOTPV2";

    $payload = json_encode([
        "deviceId" => $device_id,  // Use the same device ID for the second request
        "recipient" => "+88" . $phn,
        "retryAttempt" => 0
    ]);

    $headers = [
        'User-Agent: kotha-android-version_0.1.20241002-code_285-os-sdk-level_33-manufacturer_OnePlus-model_GM1917-os-sdk-level_33',
        'Accept-Encoding: gzip',
        'Authorization: ' . $token,
        'Content-Type: application/json; charset=UTF-8'
    ];

    // Initialize cURL session for second request
    $curl = curl_init($url);
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => $headers,
    ]);

    // Execute second request
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    // Print the response from the second API call
    echo "Second response: " . $response . "\n";
} else {
    echo "Skipping second request as token is unavailable.\n";
}
?>