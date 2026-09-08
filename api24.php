<?php

// Check if the phone number is provided in the request
if (isset($_REQUEST["phone"])) {
    // Get the phone number from the request
    $phn = $_REQUEST["phone"];

    // Initialize cURL
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://api-dynamic.chorki.com/v1/auth/login?country=BD&platform=mobile',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => json_encode(["number" => $phn]), // Use the phone number from the request
        CURLOPT_HTTPHEADER => [
            'User-Agent: Chorki/2.0.33 (Android 13; GM1917; GM1917; arm64-v8a)',
            'Accept: application/json',
            'Content-Type: application/json',
        ],
    ]);

    // Execute the cURL request
    $response = curl_exec($curl);
    $err = curl_error($curl);

    // Close the cURL session
    curl_close($curl);

    // Check for errors and output the response
    if ($err) {
        echo 'cURL Error #: ' . $err;
    } else {
        echo $response;
    }
} else {
    echo 'Phone number is required.';
}
?>
