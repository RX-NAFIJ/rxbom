<?php
$phn = $_REQUEST["phone"]; // Example: 01997406002

// API URL
$url = "https://apialpha.pbs.com.bd/api/OTP/generateOTP";

// JSON Body (same as your curl request)
$post_data = json_encode([
    "userPhone" => $phn,
    "otp"       => ""
]);

// Headers converted from your cURL
$headers = array(
    "accept: */*",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "cache-control: no-cache",
    "content-type: application/json",
    "origin: https://pbs.com.bd",
    "pragma: no-cache",
    "priority: u=1, i",
    "referer: https://pbs.com.bd/",
    "sec-ch-ua: \"Google Chrome\";v=\"143\", \"Chromium\";v=\"143\", \"Not A(Brand\";v=\"24\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-site",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

// Show API Response
echo "PBS OTP Response: " . $response;
?>
