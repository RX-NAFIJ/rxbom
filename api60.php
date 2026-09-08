<?php
$phn = $_REQUEST["phone"];
$countryCode = "+880"; // Replace with the desired country code

$url = "https://developer.quizgiri.xyz:443/api/v2.0/send-otp";
$data = json_encode(array(
    "phone" => $phn,
    "country_code" => $countryCode
));

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));

// For debug only!
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if ($response === false) {
    echo "Error: " . curl_error($ch);
} else {
    echo "Response:\n" . $response;
}

curl_close($ch);
?>
