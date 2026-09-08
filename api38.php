<?php
$phn = $_REQUEST["phone"]; // Get the phone number from user input
$phn_with_code = "88" . $phn; // Prepend '88' to the phone number
$url = "https://bajistar.com:1443/public/api/v1/getOtp?recipient=" . $phn_with_code;

$headers = [
    "Accept: */*",
    "Connection: keep-alive",
    "Origin: https://www.playbajistar.com",
    "Referer: https://www.playbajistar.com/",
    "Sec-Fetch-Dest: empty",
    "Sec-Fetch-Mode: cors",
    "Sec-Fetch-Site: cross-site",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/128.0.0.0 Safari/537.36",
    "accept-language: en",
    'sec-ch-ua: "Chromium";v="128", "Not;A=Brand";v="24", "Google Chrome";v="128"',
    "sec-ch-ua-mobile: ?0",
    'sec-ch-ua-platform: "Windows"'
];

// Initialize cURL session
$ch = curl_init($url);

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

// Execute the cURL request
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)) {
    echo 'Error:' . curl_error($ch);
} else {
    echo $response;
}

// Close the cURL session
curl_close($ch);
?>
