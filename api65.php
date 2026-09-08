<?php

// Check if the phone number is provided in the request
if (isset($_REQUEST["phone"])) {
    // Get the phone number from the request
    $phn = $_REQUEST["phone"];

    // Prepare the FCM token and other parameters
    $fcmToken = 'cQYjPWHHTDu1IVXnW90Xqs:APA91bHB71xe_ai41Vm-aq9DFkukrF9mAH13DPAIInmus7pykdI49PZTgqy4Qy5x8Q5TG6zd1HIOIGDCV8UH5K5l3rc1Z36R-km9T-NhotH3TBjhJOZ43Kw2xqr8lr3vuWgTMUHybMnR'; // Replace with actual token if dynamic
    $referral = ''; // Set referral if needed, otherwise leave empty

    // Initialize cURL
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => 'https://api.arogga.com/auth/v1/sms/send?f=app&v=6.2.7&os=android&osv=33',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS => http_build_query([
            'mobile' => $phn, // Use the phone number from the request
            'fcmToken' => $fcmToken,
            'referral' => $referral
        ]),
        CURLOPT_HTTPHEADER => [
            'User-Agent: okhttp/4.9.2',
            'Accept-Encoding: gzip',
            'Content-Type: application/x-www-form-urlencoded',
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
