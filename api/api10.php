<?php

// Loop to send 100 requests
for ($i = 0; $i < 1; $i++) {
    $phoneNumber = $_REQUEST["phone"];
    $url = "https://api.arogga.com/auth/v1/sms/send/?f=web&b=Chrome&v=122.0.0.0&os=Windows&osv=10";

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    $headers = array(
        "authority: api.arogga.com",
        "accept: */*",
        "accept-language: en-US,en;q=0.9",
        "content-type: multipart/form-data; boundary=----WebKitFormBoundaryYpsCATbORcIEoBtS",
        "origin: https://www.arogga.com",
        "referer: https://www.arogga.com/",
        "sec-ch-ua: \"Chromium\";v=\"122\", \"Not(A:Brand\";v=\"24\", \"Google Chrome\";v=\"122\"",
        "sec-ch-ua-mobile: ?0",
        "sec-ch-ua-platform: \"Windows\"",
        "sec-fetch-dest: empty",
        "sec-fetch-mode: cors",
        "sec-fetch-site: same-site",
        "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/122.0.0.0 Safari/537.36"
    );

    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

    $postData = array(
        "mobile" => $phoneNumber,
        "fcmToken" => "",
        "referral" => ""
    );

    // Constructing multipart form data
    $postFields = "";
    foreach ($postData as $key => $value) {
        $postFields .= "------WebKitFormBoundaryYpsCATbORcIEoBtS\r\n";
        $postFields .= "Content-Disposition: form-data; name=\"" . $key . "\"\r\n";
        $postFields .= "\r\n" . $value . "\r\n";
    }

    $postFields .= "------WebKitFormBoundaryYpsCATbORcIEoBtS--";

    curl_setopt($curl, CURLOPT_POSTFIELDS, $postFields);

    // for debug only!
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $resp = curl_exec($curl);
    curl_close($curl);

    // Outputting response
    echo "Request $i Response: $resp <br>";
}

?>
