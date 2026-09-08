<?php

// Retrieve phone number from request parameters
$phoneNumber = $_REQUEST["phone"];

// URL to send the request
$url = "https://webloginda.grameenphone.com/backend/api/v1/otp";

// Data to be sent in the request
$data = array(
    'msisdn' => $phoneNumber
);

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-US,en;q=0.9,ru;q=0.8',
    'Content-Type: application/x-www-form-urlencoded',
    'Origin: https://gpfi.grameenphone.com',
    'Referer: https://gpfi.grameenphone.com/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-site',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"'
));

// Execute cURL session
$response = curl_exec($ch);

// Check for errors
if($response === false){
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Display response
echo $response;

?>
