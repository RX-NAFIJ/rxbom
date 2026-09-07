<?php

$phn = $_REQUEST["phone"] ?? null;

if (!$phn) {
    echo "Error: phone parameter missing.";
    exit;
}

// Sindabad API requires +88 format
$full_phone = "+88" . $phn;

$url = "https://offers.sindabad.com/api/mobile-otp";

$post_data = json_encode([
    "key" => "c94e67fb2a59af3b6fa21f24463b2061",
    "mobile" => $full_phone
]);

$headers = [
    "Accept: application/json, text/plain, */*",
    "Accept-Language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "Authorization: Bearer ODdweWQ2OTJwbDNiYjR6azMyazJpenBrdHQ2MjYybnZhc2luZGFiYWRjb21tb3ppbGxhNTAgd2luZG93cyBudCAxMDAgd2luNjQgeDY0IGFwcGxld2Via2l0NTM3MzYga2h0bWwgbGlrZSBnZWNrbyBjaHJvbWUxNDMwMDAgc2FmYXJpNTM3MzZiYW5kb3JjOTRlNjdmYjJhNTlhZjNiNmZhMjFmMjQ0NjNiMjA2MQ==",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Type: application/json",
    "Origin: https://sindabad.com",
    "Pragma: no-cache",
    "Referer: https://sindabad.com/",
    "Sec-Fetch-Dest: empty",
    "Sec-Fetch-Mode: cors",
    "Sec-Fetch-Site: same-site",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36",
    "sec-ch-ua: \"Google Chrome\";v=\"143\", \"Chromium\";v=\"143\", \"Not A(Brand\";v=\"24\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\""
];

$ch = curl_init();

curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_HTTPHEADER => $headers,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $post_data,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_TIMEOUT => 15
]);

$response = curl_exec($ch);
$error = curl_error($ch);

curl_close($ch);

if ($error) {
    echo "cURL Error: $error";
} else {
    echo $response;
}

?>
