<?php
$phn = $_REQUEST["phone"];
$url = "https://api.redx.com.bd:443/v1/user/signup";
$data = json_encode(array(
    "name" => $phn,
    "service" => "redx",
    "phoneNumber" => $phn
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
