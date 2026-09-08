<?php

$phn = $_REQUEST["phone"];
$url = "https://m-backend.wafilife.com/wp-json/wc/v2/send-otp?p=$phn&consumer_key=ck_e8c5b4a69729dd913dce8be03d7878531f6511ff&consumer_secret=cs_f866e5c6543065daa272504c2eea71044579cff3";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);

$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

curl_close($ch);

echo "Response Code: " . $httpCode . "\n";
echo "Response Content: " . $response . "\n";

?>
