<?php
$phn = $_REQUEST["phone"];
$url = "http://apibeta.iqra-live.com/api/v1/sent-otp/{$phn}";
$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

// For debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($curl);

if ($response === false) {
    echo "Error: " . curl_error($curl);
} else {
    echo "Response:\n" . $response;
}

curl_close($curl);
?>
