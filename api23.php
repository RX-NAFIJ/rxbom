<?php

$phn = $_REQUEST["phone"];

$api = "https://rflbestbuy.com/api/login/?lang_code=en&currency_code=BDT";

$headers = [
    "Host: rflbestbuy.com",
    "Authorization: Bearer bWlzNTdAcHJhbmdyb3VwLmNvbTpJWE94N1NVUFYwYUE0Rjg4Nmg4bno5V2I2STUzNTNBQQ==",
    "Content-Type: application/json",
    "Accept-Encoding: gzip",
    "User-Agent: okhttp/4.2.2"
];

$data = [
    "company_id" => "26",
    "password2" => "Riyaz@123",
    "currency_code" => "BDT",
    "user_type" => "C",
    "email" => "{$phn}@gmail.com",
    "g_id" => "",
    "lang_code" => "en",
    "operating_system" => "Android",
    "otp_verify" => false,
    "password1" => "Riyaz@123",
    "phone" => $phn,
    "storefront_id" => "3",
];

$options = [
    "http" => [
        "method" => "POST",
        "header" => implode("\r\n", $headers),
        "content" => json_encode($data),
    ],
];

$context = stream_context_create($options);
$response = file_get_contents($api, false, $context);

echo $response;
?>
