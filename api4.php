<?php

$phoneNumber = $_REQUEST["phone"]; // Custom phone number from request

$url = 'https://bikroy.com/data/phone_number_login/verifications/phone_login?phone=' . urlencode($phoneNumber);
$headers = array(
    'accept: application/json, text/plain, */*',
    'accept-language: en',
    'application-name: web',
    'cookie: _gcl_au=1.1.558893198.1713351434; _fbp=fb.1.1713351434502.667827785; locale=en; ab-test.pwa-only=reactapp; _sp_ses.c10b=*; _ga=GA1.2.1936000234.1713351434; _gid=GA1.2.886237652.1715507924; _dc_gtm_UA-33150711-4=1; _dc_gtm_UA-32287732-10=1; __gads=ID=01441cfb2260236f:T=1713812228:RT=1715508001:S=ALNI_Ma73d8yydsNVRzHsy4bzp87fPN2_g; __gpi=UID=00000df6182217ab:T=1713812228:RT=1715508001:S=ALNI_MZx1RypsjFJOqcm0gkMZdTDproh9Q; __eoi=ID=068c2c606fbed755:T=1713812228:RT=1715508001:S=AA-AfjZz7tYE_5lM99OfpjQk05st; FCNEC=[["AKsRol8cmy97NhkamWuj3Fa-UoC-kj0iFuJHyfgYY6ns9NGpGOmMJlPwFOIiu1GFVQhOyj5knWTBgx3yEHFkJi0Rk5odprMIooS0In-_6pbk4aSxjHmy27dV70rNgj1BoGUMus5ylPqCXe4gSnHbroqqvT116cKzXg=="]]; _ga_LK6CFX94RC=GS1.2.1715507924.7.1.1715507939.45.0.0; _sp_id.c10b=119acd62983c32e0.1709924485.8.1715507940.1714164260.2bcad174-00f9-4870-918f-465c4f80b973; _ga_LV7HJQBLZX=GS1.1.1715507923.4.1.1715507939.44.0.0',
    'priority: u=1, i',
    'referer: https://bikroy.com/en?login-modal=true&redirect-url=/en',
    'sec-ch-ua: "Chromium";v="124", "Google Chrome";v="124", "Not-A.Brand";v="99"',
    'sec-ch-ua-mobile: ?0',
    'sec-ch-ua-platform: "Windows"',
    'sec-fetch-dest: empty',
    'sec-fetch-mode: cors',
    'sec-fetch-site: same-origin',
    'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/124.0.0.0 Safari/537.36'
);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);
curl_close($ch);

echo $response;

?>
