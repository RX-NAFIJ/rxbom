<?php

$phoneNumber = $_REQUEST["phone"]; // Assuming "phone" is the parameter name

$url = "https://api.apex4u.com/api/auth/login";

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// Set a shorter timeout for faster requests
curl_setopt($curl, CURLOPT_TIMEOUT_MS, 5000); // Timeout after 5 seconds

// Set headers
$headers = array(
    "accept: application/json, text/plain, */*",
    "accept-language: en-US,en;q=0.9,ru;q=0.8",
    "content-type: application/json",
    "origin: https://apex4u.com",
    "referer: https://apex4u.com/",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36"
);

curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

// Prepare the data
$data = json_encode(array(
    "phoneNumber" => $phoneNumber
));

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

// Execute cURL request
$resp = curl_exec($curl);

// Check for errors
if ($resp === false) {
    echo 'Curl error: ' . curl_error($curl);
} else {
    echo $resp;
}

// Close cURL
curl_close($curl);

?>
