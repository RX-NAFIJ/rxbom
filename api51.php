<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$phn = $_REQUEST["phone"];

// Construct the URL with the phone number
$url = "https://web-api.binge.buzz/api/v3/otp/send/" . urlencode($phn);

// Set up cURL session for OPTIONS request
$options_ch = curl_init($url);
$options_headers = array(
    'Host: web-api.binge.buzz',
    'Connection: keep-alive',
    'Accept: */*',
    'Access-Control-Request-Method: GET',
    'Access-Control-Request-Headers: authorization,device-type',
    'Origin: https://binge.buzz',
    'User-Agent: Mozilla/5.0 (Linux; Android 13; RMX3286 Build/SP1A.210812.016) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.43 Mobile Safari/537.36',
    'Sec-Fetch-Mode: cors',
    'X-Requested-With: mark.via.gp',
    'Sec-Fetch-Site: same-site',
    'Sec-Fetch-Dest: empty',
    'Referer: https://binge.buzz/',
    'Accept-Encoding: gzip, deflate, br',
    'Accept-Language: en-US,en;q=0.9'
);
curl_setopt($options_ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($options_ch, CURLOPT_HTTPHEADER, $options_headers);
$options_response = curl_exec($options_ch);
$options_status_code = curl_getinfo($options_ch, CURLINFO_HTTP_CODE);
curl_close($options_ch);

echo "OPTIONS Response: $options_status_code\n";
echo "Response Content:\n$options_response\n";

// Set up cURL session for GET request
$get_ch = curl_init($url);
$get_headers = array(
    'Host: web-api.binge.buzz',
    'Connection: keep-alive',
    'sec-ch-ua: "Not_A Brand";v="8", "Chromium";v="120", "Android WebView";v="120"',
    'Accept: application/json, text/plain, */*',
    'Device-Type: web',
    'sec-ch-ua-mobile: ?1',
    'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJzdGF0dXMiOiJGcmVlIiwiY3JlYXRlZEF0IjoiY3JlYXRlIGRhdGUiLCJ1cGRhdGVkQXQiOiJ1cGRhdGUgZGF0ZSIsInR5cGUiOiJ0b2tlbiIsImRldlR5cGUiOiJ3ZWIiLCJleHRyYSI6IjMxNDE1OTI2IiwiaWF0IjoxNzAzODUwMjYxLCJleHAiOjE3MDQwMjMwNjF9.nCgP-U4r6CYuTO_i4Nz97YiaI2jsi45d2n-9ZQN3qt0',
    'User-Agent: Mozilla/5.0 (Linux; Android 13; RMX3286 Build/SP1A.210812.016) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.43 Mobile Safari/537.36',
    'sec-ch-ua-platform: "Android"',
    'Origin: https://binge.buzz',
    'X-Requested-With: mark.via.gp',
    'Sec-Fetch-Site: same-site',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Dest: empty',
    'Referer: https://binge.buzz/',
    'Accept-Encoding: gzip, deflate, br',
    'Accept-Language: en-US,en;q=0.9'
);
curl_setopt($get_ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($get_ch, CURLOPT_HTTPHEADER, $get_headers);
$get_response = curl_exec($get_ch);
$get_status_code = curl_getinfo($get_ch, CURLINFO_HTTP_CODE);
curl_close($get_ch);

echo "GET Response: $get_status_code\n";
echo "Response Content:\n$get_response\n";

?>
