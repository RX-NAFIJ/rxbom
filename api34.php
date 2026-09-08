<?php

$phn = $_REQUEST["phone"];             // User input phone number: 0199xxxxxxx
$msisdn = "88" . $phn;                 // API requires format: 8801XXXXXXXX

$url = "https://api.kabbik.com/v1/auth/otpnew";

$currentTimeLong = round(microtime(true) * 1000); // auto timestamp ms

$data = json_encode([
    "msisdn" => $msisdn,
    "currentTimeLong" => $currentTimeLong,
    "passKey" => "qOQNBtVmoTTPVmfn"
]);

$headers = [
    "Accept: */*",
    "Accept-Language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Origin: https://kabbik.com",
    "Pragma: no-cache",
    "Referer: https://kabbik.com/",
    "Sec-Fetch-Dest: empty",
    "Sec-Fetch-Mode: cors",
    "Sec-Fetch-Site: same-site",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36",
    "authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyX2lkIjoiMjgyMCIsInJvbGUiOjEsImlhdCI6MTY2NTc0NjIyNX0.dSY47sipaGTI_OtsysFWw_kaKZKWHWRtp4vklstVgVc",
    "content-type: application/json",
    'sec-ch-ua: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"',
    "sec-ch-ua-mobile: ?0",
    'sec-ch-ua-platform: "Windows"'
];

// Cookies
$cookies = "_ga=GA1.1.1801400605.1765549007; FCCDCF=%5Bnull%2Cnull%2Cnull%2Cnull%2Cnull%2Cnull%2C%5B%5B32%2C%22%5B%5C%22b1af6b8f-4ebc-446b-920b-4d0b542f020c%5C%22%2C%5B1765549007%2C472000000%5D%5D%22%5D%5D%5D; FCNEC=%5B%5B%22AKsRol9pDDgJGJzEAIzPAVuiXs2vPTdaP0wfcqlQ4mX89J2dm2wvG9wfS7LKu0fJhcwaQFVmv9U7VrRk8YnpNqps7QHw4vuMRh7Ntn8-7fGc4SINpmKCLTjtC5UmlryvvfQkhymKk9Ja29mpxJcFP9FarJ1wq5A7AA%3D%3D%22%5D%5D; _ga_3BNTLPWYXL=GS2.1.s1765549006\$o1\$g0\$t1765549013\$j53\$l0\$h0";

$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_COOKIE, $cookies);

// SSL Disable (optional)
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL ERROR: " . curl_error($ch);
}

curl_close($ch);

echo $response;

?>
