<?php

// Check if the phone number is provided in the request
if (isset($_REQUEST['phone'])) {
    // Retrieve and format the phone number for the API
    $phn = $_REQUEST['phone'];
    $phn = ltrim($phn, '0'); // Remove leading zero if present

    // Set up cURL
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://doctorlivebd.com/api/patient/auth/otpsend',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query([
            'country_code' => '880', // Bangladesh country code
            'mobile' => $phn
        ]),
        CURLOPT_HTTPHEADER => [
            'User-Agent: okhttp/4.10.0',
            'Connection: Keep-Alive',
            'Accept-Encoding: gzip',
            'Content-Type: application/x-www-form-urlencoded',
        ],
    ]);

    // Execute cURL request and handle response
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
        echo 'cURL Error #:' . $err;
    } else {
        echo $response; // Print the response from the API
    }
} else {
    echo 'Error: Phone number is required.'; // Error message for missing phone number
}
?>
