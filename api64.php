<?php

$phone = $_REQUEST["phone"]; // dynamic phone input

$url = "https://mcprod.aarong.com/graphql";

$headers = [
    "accept: application/json",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "cache-control: no-cache",
    "content-type: application/json",
    "origin: https://www.aarong.com",
    "pragma: no-cache",
    "priority: u=1, i",
    "referer: https://www.aarong.com/",
    "sec-ch-ua: \"Google Chrome\";v=\"143\", \"Chromium\";v=\"143\", \"Not A(Brand\";v=\"24\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-site",
    "store: default",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36"
];

function callAPI($url, $headers, $payload) {
    $ch = curl_init();
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $payload,
        CURLOPT_HTTPHEADER => $headers,
    ]);
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    return $error ? "Error: $error" : $response;
}

//
// 1️⃣ checkCustomerExist
//
$query1 = [
    "query" => "query{
        checkCustomerExist(
            mobile_number:\"$phone\"
            email:\"\"        
        ){
            status
            message
        }
    }"
];
echo callAPI($url, $headers, json_encode($query1));
echo "\n\n";

//
// 2️⃣ generateCustomerToken
//
$query2 = [
    "query" => "
          mutation generateCustomerToken(\$email: String!, \$password: String!, \$type: String!, \$mobile_number: String!) {
            generateCustomerToken(
              email: \$email
              password: \$password
              type: \$type
              mobile_number: \$mobile_number
            ) {
              token
              message
            }
          }
        ",
    "variables" => [
        "email" => "",
        "password" => "",
        "type" => "mobile_number",
        "mobile_number" => $phone
    ]
];
echo callAPI($url, $headers, json_encode($query2));
echo "\n\n";

//
// 3️⃣ resendOtp
//
$query3 = [
    "query" => "
      mutation resendOtp(\$email: String, \$mobile_number: String!, \$type: String!) {
        resendOtp(
          input: {
            email: \$email
            mobile_number: \$mobile_number
            type: \$type
          }
        )
      }
    ",
    "variables" => [
        "email" => "",
        "mobile_number" => $phone,
        "type" => "mobile_number"
    ]
];
echo callAPI($url, $headers, json_encode($query3));
echo "\n\n";
