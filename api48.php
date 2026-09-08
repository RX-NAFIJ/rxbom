<?php

// Get phone number from request
$phn = $_REQUEST["phone"];  // Example: 01997406002

// Random first name generator
$firstNames = ["Arif", "Hasib", "Kamrul", "Sohag", "Raihan", "Farhan", "Zahid", "Imran", "Sajib", "Munna"];
$firstName = $firstNames[array_rand($firstNames)];

// Random email generator
$randomStr = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz0123456789"), 0, 8);
$email = strtolower($firstName) . $randomStr . "@gmail.com";

$url = "https://mybdjobsorchestrator-odcx6humqq-as.a.run.app/api/CreateAccountOrchestrator/CreateAccount";

// JSON Body with dynamic + random data
$post_data = json_encode([
    "firstName" => $firstName,
    "lastName" => "",
    "gender" => "M",
    "email" => $email,
    "userName" => $phn,          // SAME PHONE AS USERNAME ✔
    "password" => "Kamrul12345@",   // You can make this random also
    "confirmPassword" => "Kamrul12345@",
    "status" => 0,
    "mobile" => $phn,            // SAME PHONE ✔
    "workAreaCategory" => 2,
    "createdFrom" => 0,
    "createdAt" => date("c"),    // auto timestamp
    "decodeId" => "",
    "catTypeId" => 1,
    "userNameType" => "mobile",
    "disabilityId" => "",
    "deviceTypeId" => 0,
    "countryCode" => "88",
    "socialMediaId" => "",
    "socialMediaName" => "",
    "socialMediaTimestamp" => date("c"),
    "ttcId" => "",
    "gradeId" => "",
    "knownBy" => "",
    "isTtc" => false,
    "trainingCenterName" => "",
    "trainingDistrict" => "",
    "queryString" => "",
    "campaignId" => 0,
    "campaignSource" => "",
    "campaignReferer" => "",
    "isFromSocialMedia" => false,
    "isActive" => 0,
    "useType" => "",
    "uNtype" => 0
]);

$headers = [
    "accept: application/json, text/plain, */*",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "cache-control: no-cache",
    "content-type: application/json",
    "origin: https://mybdjobs.bdjobs.com",
    "pragma: no-cache",
    "priority: u=1, i",
    "referer: https://mybdjobs.bdjobs.com/",
    "sec-ch-ua: \"Google Chrome\";v=\"143\", \"Chromium\";v=\"143\", \"Not A(Brand\";v=\"24\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: cross-site",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36"
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo "Generated Name: $firstName\n";
echo "Generated Email: $email\n";
echo "BDJobs Response: " . $response;
?>
