<?php

// Ensure you are receiving the phone number correctly
$phn = $_REQUEST['phone']; 

// Check if the phone number is null or empty
if (empty($phn)) {
    echo "Request phone Number";
    exit; // Stop execution if phone number is not provided
}

// Initialize cURL
$curl = curl_init();

// Set cURL options
curl_setopt_array($curl, [
    CURLOPT_URL => 'https://backend-api.shomvob.co/api/v2/otp/phone?is_retry=0',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode(['phone' => '88' . $phn]), // Correct JSON formatting
    CURLOPT_HTTPHEADER => [
        'User-Agent: Dalvik/2.1.0 (Linux; U; Android 13; GM1917 Build/SP1A.210812.016)',
        'Connection: Keep-Alive',
        'Accept-Encoding: gzip',
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VybmFtZSI6IlNob212b2JUZWNoQVBJVXNlciIsImlhdCI6MTY2MzMzMDkzMn0.4Wa_u0ZL_6I37dYpwVfiJUkjM97V3_INKVzGYlZds1s',
        'Content-Type: application/json; charset=utf-8',
    ],
]);

// Execute the request and handle errors
$response = curl_exec($curl);
$err = curl_error($curl);

// Close the cURL session
curl_close($curl);

// Check for errors and display response
if ($err) {
    echo 'cURL Error #:' . $err;
} else {
    echo $response; // Output the response from the API
}
?>
