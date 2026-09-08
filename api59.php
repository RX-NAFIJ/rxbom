<?php
$phn = $_REQUEST["phone"]; // Example: 01997406002

// Shwapno API wants +88 prefix
$full_phone = "+88" . $phn;

$url = "https://www.shwapno.com/api/auth";

// JSON POST Body
$post_data = json_encode([
    "phoneNumber" => $full_phone
]);

$headers = [
    "accept: */*",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "cache-control: no-cache",
    "content-type: application/json",
    "origin: https://www.shwapno.com",
    "pragma: no-cache",
    "priority: u=1, i",
    "referer: https://www.shwapno.com/",
    "sec-ch-ua: \"Google Chrome\";v=\"143\", \"Chromium\";v=\"143\", \"Not A(Brand\";v=\"24\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36",
    "cookie: cuid=19ae2bff-3cf9-44d8-81f5-faa6c9c97725; g_state={\"i_l\":0,\"i_ll\":1765537924997,\"i_b\":\"7htzDtmEgp7eok/ai7DljnKRdkBE4IeyU93FB/4alMQ\",\"i_e\":{\"enable_itp_optimization\":0}}; _nc_=true; _ds_=65eb62a4452e887cd78e256b; _gcl_au=1.1.731331550.1765537927; _ga=GA1.2.1779555445.1765537927; _gid=GA1.2.1010658640.1765537928; _gat_gtag_UA_105022596_1=1; _clck=wgijuj%5E2%5Eg1s%5E0%5E2172; _fbp=fb.1.1765537928193.793343402451689345; _clsk=mq3y9a%5E1765537930241%5E1%5E1%5Eb.clarity.ms%2Fcollect; _ga_3R50MQ1P3H=GS2.1.s1765537927$o1$g0$t1765537936$j51$l0$h0"
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo "Shwapno Response: " . $response;
?>
