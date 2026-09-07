<?php
$phn = $_REQUEST["phone"];
$url = "https://reseller.circle.com.bd/api/v2/auth/signup";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
   "User-Agent: Mozilla/5.0 (compatible; MSIE 8.0; Windows NT 6.0; Trident/4.0)",
   "Content-Type: application/json",
);
curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);


$ps = array(
"name"=>"+88".$phn,"email_or_phone"=>"+88".$phn,"password"=>"123456","password_confirmation"=>"123456","register_by"=>"phone"
);

$data = json_encode($ps);

curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
echo($resp);

?>

