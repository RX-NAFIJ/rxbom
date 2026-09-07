<?php

$number = isset($_GET['phone']) ? $_GET['phone'] : "";
$csrf   = "9d9d08e6e5";
$url    = "https://www.khaasfood.com/wp-admin/admin-ajax.php";

/* ---------------- STEP 1 ---------------- */

$data1 = http_build_query([
    "mobileNo" => $number,
    "countrycode" => "+880",
    "csrf" => $csrf,
    "login" => "1",
    "json" => "1",
    "action" => "digits_check_mob"
]);

$headers1 = [
    "accept: application/json, text/javascript, */*; q=0.01",
    "content-type: application/x-www-form-urlencoded; charset=UTF-8",
    "origin: https://www.khaasfood.com",
    "referer: https://www.khaasfood.com/",
    "x-requested-with: XMLHttpRequest",
    "user-agent: Mozilla/5.0"
];

$ch = curl_init();
curl_setopt_array($ch, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $data1,
    CURLOPT_HTTPHEADER => $headers1
]);

$response1 = curl_exec($ch);
$status1 = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);


/* ---------------- STEP 2 ---------------- */

$postData2 = [
    "mobileNo" => $number,
    "digits_reg_mail" => $number,
    "dig_nounce" => $csrf,
    "action" => "digits_check_mob",
    "login" => "2",
    "countrycode" => "+880",
    "digregcode" => "+880",
    "digregcode2" => "+880",
    "digits" => "1",
    "dtype" => "2",
    "json" => "1",
    "csrf" => $csrf
];

$headers2 = [
    "accept: */*",
    "origin: https://www.khaasfood.com",
    "referer: https://www.khaasfood.com/",
    "x-requested-with: XMLHttpRequest",
    "user-agent: Mozilla/5.0"
];

$ch2 = curl_init();
curl_setopt_array($ch2, [
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $postData2,
    CURLOPT_HTTPHEADER => $headers2
]);

$response2 = curl_exec($ch2);
$status2 = curl_getinfo($ch2, CURLINFO_HTTP_CODE);
curl_close($ch2);


/* ---------------- RESULT ---------------- */

echo "NUMBER: ".$number."\n\n";

echo "STEP 1 STATUS: ".$status1."\n";
echo $response1;

echo "\n\n----------------------\n\n";

echo "STEP 2 STATUS: ".$status2."\n";
echo $response2;

?>