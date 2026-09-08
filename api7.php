<?php

// Capture the phone number from the request
$phn = $_REQUEST['phone'] ?? null; // Defaults to null if not provided

if ($phn === null) {
    echo "Error: Phone number is required.";
    exit;
}

// Format the phone number with country code (remove leading zero if present and add country code)
$formatted_phn = '880' . ltrim($phn, '0');

// Initialize cURL session
$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => 'https://developer.medha.info/api/send-otp',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode(["phone" => $formatted_phn, "is_register" => "1"]),
    CURLOPT_HTTPHEADER => [
        'User-Agent: Dart/3.2 (dart:io)',
        'Accept-Encoding: gzip',
        'content-type: application/json; charset=utf-8',
        'authorization: Bearer',
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo 'cURL Error #:' . $err;
} else {
    echo $response;
}
?>
