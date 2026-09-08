<?php
$phn = $_REQUEST["phone"];
$countryCode = "880"; // Replace with the desired country code
$deviceUuid = "998283c0-622a-11ee-84c0-190466a47baa"; // Replace with the desired device UUID

$url = "https://api.waltonplaza.com.bd/graphql";
$data = json_encode(array(
    "operationName" => "createCustomerOtp",
    "variables" => array(
        "auth" => array(
            "countryCode" => $countryCode,
            "deviceUuid" => $deviceUuid,
            "phone" => $phn
        ),
        "device" => null
    ),
    "query" => "mutation createCustomerOtp(\$auth: CustomerAuthInput!, \$device: DeviceInput) {
      createCustomerOtp(auth: \$auth, device: \$device) {
        message
        result {
          id
          __typename
        }
        statusCode
        __typename
      }
    }"
));

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));

$response = curl_exec($ch);

if ($response === false) {
    echo "Error: " . curl_error($ch);
} else {
    echo "Response:\n" . $response;
}

curl_close($ch);
?>
