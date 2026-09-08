<?php
$phn=$_GET['phone'];
// API endpoint
$apiEndpoint = 'https://developer.quiztime.gamehubbd.com/api/v2.0/send-otp';

// Your API request data
$data = [
    "country_code" => "+88",
    "phone" => $phn
];

// Convert the data to JSON
$jsonData = json_encode($data);

// Initialize cURL session
$ch = curl_init($apiEndpoint);

// Set cURL options
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'Content-Length: ' . strlen($jsonData)
]);

// Execute cURL session and get the response
$response = curl_exec($ch);

// Check for cURL errors
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Output the API response
echo $response;
?>
