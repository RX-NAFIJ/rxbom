<?php
$phn = $_REQUEST["phone"]; // Example: 01997406002

$url = "https://salextra.com.bd/customer/checkusernameavailabilityonregistration";

// POST form data
$post_data = http_build_query([
    "username" => $phn,
    "loginType" => "MOBILE",
    "__RequestVerificationToken" => "CfDJ8LiTcoRywYZJiSdmMqGF8TUqJw9C6KMdGm1h66OVTdHacNf0PM5Ejsmu_DNPddqz7Sk-XUyXwxIyHALKpZ5bn1jwr9l-9IzOmASY_Z3cKb2mndEZn3KyLqq80U8QyitKCPtmt1zxxiMWd_970_jfTmg"
]);

$headers = [
    "accept: application/json, text/javascript, */*; q=0.01",
    "accept-language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded; charset=UTF-8",
    "origin: https://salextra.com.bd",
    "pragma: no-cache",
    "priority: u=1, i",
    "referer: https://salextra.com.bd/register?returnUrl=%2F",
    "sec-ch-ua: \"Google Chrome\";v=\"143\", \"Chromium\";v=\"143\", \"Not A(Brand\";v=\"24\"",
    "sec-ch-ua-mobile: ?0",
    "sec-ch-ua-platform: \"Windows\"",
    "sec-fetch-dest: empty",
    "sec-fetch-mode: cors",
    "sec-fetch-site: same-origin",
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36",
    "x-requested-with: XMLHttpRequest",
    "cookie: .Nop.Session=CfDJ8LiTcoRywYZJiSdmMqGF8TWIYCfVt4Oecy%2BXM7P6GbmfMPT21OX0r2XZo7XNG7rvaYvO7XoNsqCztSW7wPNMpwIdN6AMnMIJbKzAtLGt6loMmZwrrMHSllW3YBaAtSgi6CEBvJdkf7cFoINcIjfQiN5VY6wG0o3%2B36YVELj48JPW; cf_clearance=h2DqYv4We1oxCyDwIt2dHO1xA5ywCPLYCA4No4xgLoc-1765537483-1.2.1.1-oL4.szX1O3Mho4IH.mhvOP7WMnDIyApLZg9fzonpm4I0iVnk.gi0sMb45ZZCzTDoap0UycJizBbK.s5DqGNakzeKqPfFymLzKY5257X.F2q.bBIGKH4gJ2bwd.Y9UzEZuAJg1qaYdLjMJjZaEgPkta18S6DAB0f6hhv1AdItAS7iDoxNIF5iPCvTwWswsrWknLxWeRwHSHCBNbqRbPB9_cCXOD7BrDaRvbbSDzLJJlw; _fbp=fb.2.1765537481567.450297929361346695; _ga=GA1.1.555298881.1765537482; _gcl_au=1.1.371458126.1765537482; perf_dv6Tr4n=1; .Nop.Antiforgery=CfDJ8LiTcoRywYZJiSdmMqGF8TVjJcTqo6Dh1zAv3Jl4atK_axJqBRCK6if6VBh7HWL_9RrAIz14G9JjPIXD0vW6E8rw5XP1ck0I5Nn8LOOyObHuSKiji3NRYRwW2Iu1apiLMBaUoKqA60Tl_EbsPw4u6ks; .Nop.Customer=a0b62c65-649c-47cd-a894-739121f1d74a; _ga_BK9Y2HLHL8=GS2.1.s1765537481$o1$g1$t1765537514$j27$l0$h0"
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

echo "Salextra Response: " . $response;
?>
