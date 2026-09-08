 <?php

// Get the phone number from the GET request
$phone = isset($_GET['phone']) ? $_GET['phone'] : '';

if (preg_match('/^01[0-9]{9}$/', $phone)) {
    // Valid Bangladeshi phone number format (11 digits starting with 01)
    
    $data = [
        "customer" => [
            "email" => "kgjkgjgg'.$phone.'@gmail.com",
            "password" => "#bUV?'3*N#7N}.g",
            "password_confirmation" => "#bUV?'3*N#7N}.g",
            "phone" => "+880" . substr($phone, 1), // Format phone number as +880XXXXXXXXXX
            "draft_order_id" => null,
            "first_name" => "sdfgfd",
            "last_name" => "fgfd",
            "note" => [
                "birthday" => "",
                "gender" => "male"
            ],
            "withTimeout" => true,
            "newsletter_email" => true,
            "newsletter_sms" => true
        ]
    ];

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, "https://api.sundora.com.bd/api/user/customer/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "User-Agent: Mozilla/5.0 (Windows NT 8.0; Win64; x64; rv:131.0) Gecko/20100101 Firefox/131.0",
        "Accept: application/json, text/plain, */*",
        "Accept-Language: en-US,en;q=0.5",
      
        "Referer: https://sundora.com.bd/",
        "My-Location: BD",
        "Content-Type: application/json",
        "Origin: https://sundora.com.bd",
        "Connection: keep-alive",
        "Sec-Fetch-Dest: empty",
        "Sec-Fetch-Mode: no-cors",
        "Sec-Fetch-Site: same-site",
        "TE: trailers",
        "Priority: u=4",
        "Pragma: no-cache",
        "Cache-Control: no-cache"
    ]);

    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

    $response = curl_exec($ch);
    $error = curl_error($ch);

    curl_close($ch);

    if ($error) {
        echo "cURL Error: " . $error;
    } else {
        echo $response;
    }

} else {
    echo "Invalid phone number. The phone number must start with '01' and be 11 digits long.";
}

?>
