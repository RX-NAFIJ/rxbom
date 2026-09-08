<?php

$phone = $_REQUEST['phone']; // Get phone number from input

// Format the phone number to include the country code if necessary
$formatted_phone = '+880' . ltrim($phone, '0'); // Adds '+880' and removes any leading zero

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => 'https://api.eat-z.com/auth/customer/app-connect',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => json_encode(['username' => $formatted_phone]), // Set dynamic phone number in JSON payload
    CURLOPT_HTTPHEADER => [
        'User-Agent: okhttp/4.12.0',
        'Accept: application/json',
        'Accept-Encoding: gzip',
        'x-eatz-apiclient: ANDROID',
        'content-type: application/json; charset=UTF-8',
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo 'cURL Error #:' . $err;
} else {
    echo $response; // Output the response
}
?>
