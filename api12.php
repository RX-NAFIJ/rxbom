<?php

// Get phone number from the request
$phn = isset($_REQUEST["phone"]) ? $_REQUEST["phone"] : '';

// URL endpoint
$url = "https://www.bdstall.com/userRegistration/save_otp_info/";

// Form data
$fields = array(
    'UserTypeID' => '2',
    'RequestType' => '1',
    'Name' => 'Md',
    'Mobile' => $phn
);

// Build the POST request
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($fields));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the request
$response = curl_exec($ch);

// Check for errors
if(curl_errno($ch)){
    echo 'Curl error: ' . curl_error($ch);
}

// Close cURL session
curl_close($ch);

// Output the response
echo $response;

?>
