<?php

$phone = $_REQUEST['phone']; // Get phone from request

$url = "https://mujib.chorcha.net/auth/check?phone=" . urlencode($phone);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Add headers
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "accept: */*",
    "x-chorcha-mode: prod",
    "x-chorcha-platform: web"
]);

// Browser-like user-agent
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64)");

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
} else {
    echo $response;
}

curl_close($ch);
?>
