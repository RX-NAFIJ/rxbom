<?php

$phn = $_REQUEST["phone"];
$url = "https://app.priyoshikkhaloy.com/api/user/register-login.php";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
    "User-Agent: okhttp/4.11.0",
    "Accept-Encoding: gzip",
    "Content-Type: application/x-www-form-urlencoded",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

$fields = http_build_query(array(
    'mobile' => $phn
));

curl_setopt($curl, CURLOPT_POSTFIELDS, $fields);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>
