<?php
$phn=$_GET["phone"];
$url = "https://bkshopthc.grameenphone.com/api/v1/fwa/request-for-otp";

$data = array(
    "phone" => $phn,
    "email" => "",
    "language" => "en"
);

$data_string = json_encode($data);

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'User-Agent: Mozilla/5.0 (Linux; Android 8.0.0; SM-G960F Build/R16NW) AppleWebKit/537.36'
));

$result = curl_exec($ch);

curl_close($ch);

// $result now contains the response from the server
echo $result;

?>
