<?php
$phn = $_GET["phone"];

// Function to make an HTTP request
function makeHttpRequest($url, $data = null) {
    $ch = curl_init($url);

    // Set CURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    if ($data) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
    }

    // Execute the request
    $response = curl_exec($ch);

    // Close CURL session
    curl_close($ch);

    return $response;
}

// First request to generate token
$generateTokenUrl = 'https://accounts.sheba.xyz/api/v1/accountkit/generate/token?app_id=8329815A6D1AE6DD';
$tokenResponse = makeHttpRequest($generateTokenUrl);

// Decode the JSON response to get the token
$tokenData = json_decode($tokenResponse, true);
$apiToken = $tokenData['token'];

// Second request to shoot OTP using the generated token
$shootOtpUrl = 'https://accountkit.sheba.xyz/api/shoot-otp';
$mobileNumber = '+88' . $phn;

$data = [
    "mobile" => $mobileNumber,
    "app_id" => "8329815A6D1AE6DD",
    "api_token" => $apiToken
];

$shootOtpResponse = makeHttpRequest($shootOtpUrl, $data);

// Output responses
echo "Shoot OTP Response: " . $shootOtpResponse . "\n";

?>
