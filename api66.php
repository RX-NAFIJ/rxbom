<?php
$phn=$_GET["phone"];

$url = "https://api-gateway.sundarbancourierltd.com/graphql";

$data = array(
    "operationName" => "CreateAccessToken",
    "variables" => array(
        "accessTokenFilter" => array(
            "userName" => $phn
        )
    ),
    "query" => "mutation CreateAccessToken(\$accessTokenFilter: AccessTokenInput!) {
  createAccessToken(accessTokenFilter: \$accessTokenFilter) {
    message
    statusCode
    result {
      phone
      otpCounter
      __typename
    }
    __typename
  }
}"
);

$options = array(
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => json_encode($data),
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Host: api-gateway.sundarbancourierltd.com',
        'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:109.0)',
        'Accept-Language: en-US,en;q=0.5',
        'Referer: https://customer.sundarbancourierltd.com/',
        'Origin: https://customer.sundarbancourierltd.com',
        'Content-Length: ' . strlen(json_encode($data))
    ),
    CURLOPT_RETURNTRANSFER => true,
);

$curl = curl_init();
curl_setopt_array($curl, $options);

$response = curl_exec($curl);
echo $response;
?>