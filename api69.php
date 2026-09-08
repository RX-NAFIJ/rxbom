<?php
$phn = $_REQUEST["phone"];

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.ghoorilearning.com/api/auth/signup/otp?_app_platform=web');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{"mobile_no":"' . $phn . '"}');
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
  'Host: api.ghoorilearning.com',
  'content-length: 27',
  'sec-ch-ua: "Android WebView";v="119", "Chromium";v="119", "Not?A_Brand";v="24"',
  'accept: application/json, text/plain, */*',
  'content-type: application/json',
  'sec-ch-ua-mobile: ?1',
  'user-agent: Mozilla/5.0 (Linux; Android 13; RMX3286 Build/SP1A.210812.016) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/119.0.6045.164 Mobile Safari/537.36',
  'sec-ch-ua-platform: "Android"',
  'origin: https://ghoorilearning.com',
  'x-requested-with: mark.via.gp',
  'sec-fetch-site: same-site',
  'sec-fetch-mode: cors',
  'sec-fetch-dest: empty',
  'referer: https://ghoorilearning.com/',
  'accept-encoding: gzip, deflate, br',
  'accept-language: en-US,en;q=0.9'
));

$response = curl_exec($ch);
curl_close($ch);

echo $response;
?>
