<?php

$phn = $_REQUEST["phone"];  // User input
$msisdn = $phn;             // এখানে +88 প্রয়োজন নেই, API সরাসরি 013... ফরম্যাট চায়

$url = "https://bkwebsitethc.grameenphone.com/api/v1/offer/send_otp";

$data = json_encode([
    "msisdn" => $msisdn
]);

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$headers = [
    "Accept: application/json, text/plain, */*",
    "Accept-Language: en-US,en;q=0.9,ru;q=0.8,zh-TW;q=0.7,zh;q=0.6",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "Content-Type: application/json",
    "Origin: https://www.grameenphone.com",
    "Pragma: no-cache",
    "Referer: https://www.grameenphone.com/",
    "Sec-Fetch-Dest: empty",
    "Sec-Fetch-Mode: cors",
    "Sec-Fetch-Site: same-site",
    "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/143.0.0.0 Safari/537.36",
    "lang: en",
    'sec-ch-ua: "Google Chrome";v="143", "Chromium";v="143", "Not A(Brand";v="24"',
    "sec-ch-ua-mobile: ?0",
    'sec-ch-ua-platform: "Windows"',

    // Cookies
    "_gcl_aw=GCL.1762478201.Cj0KCQiAq7HIBhDoARIsAOATDxDo0sAMnK_VLqw8aQpXLzG-W6E7njDJUZ_vJcJfV5BsJSY35vwvudkaArJJEALw_wcB",
    "_gcl_gs=2.1.k1\$i1762478197\$u33761015",
    "_gcl_au=1.1.1096560150.1762478201",
    "_gac_UA-43119652-1=1.1762478201.Cj0KCQiAq7HIBhDoARIsAOATDxDo0sAMnK_VLqw8aQpXLzG-W6E7njDJUZ_vJcJfV5BsJSY35vwvudkaArJJEALw_wcB",
    "_fbp=fb.1.1762478201262.927404850701335642",
    "_tt_enable_cookie=1",
    "_ttp=01K9DY66FXVKKDVVFDH1ZVFJDN_.tt.1",
    "_fbc=fb.1.1763818920063.IwY2xjawOOnPVleHRuA2FlbQIxMABicmlkETE3ODhpSkhKTzFvZDR0dTdYc3J0YwZhcHBfaWQQMjIyMDM5MTc4ODIwMDg5MgABHn6IxUUqcHkAIkSFjY09iiC3jB1QPZLmSBF3PRaSHoiCQhqPKRs5_ifJsB1m_aem_-STTqsICcFSAE_O5AFDGVg",
    "_hjSessionUser_1481106=eyJpZCI6ImMwODNlMzBmLTU1YTYtNTk5OC04MjQyLTg4NDE0MDNiYTVlMCIsImNyZWF0ZWQiOjE3NjI0NzgyMDEzMjMsImV4aXN0aW5nIjp0cnVlfQ==",
    "_gid=GA1.2.390244491.1765546110",
    "_gat_UA-43119652-1=1",
    "_ga_2ED7ES040Q=GS2.1.s1765546122\$o3\$g0\$t1765546122\$j60\$l0\$h0",
    "_ga_G6Z1J37FC0=GS2.1.s1765546122\$o3\$g0\$t1765546122\$j60\$l0\$h0",
    "_ga_NLR6457KZE=GS2.1.s1765546122\$o3\$g0\$t1765546122\$j60\$l0\$h0",
    "_ga_KC9CZR7L4L=GS2.1.s1765546123\$o3\$g0\$t1765546123\$j60\$l0\$h0",
    "_ga_YKH9SKG3JM=GS2.1.s1765546124\$o3\$g0\$t1765546124\$j60\$l0\$h0",
    "_ga=GA1.1.2011947113.1762478201",
    "_hjSession_1481106=eyJpZCI6IjI4ODQ2Mzc3LWVjYWMtNGJkNC04OWZhLWFhYzVlMTk1ODA1MiIsImMiOjE3NjU1NDYxMjQ1MjAsInMiOjAsInIiOjAsInNiIjowLCJzciI6MCwic2UiOjAsImZzIjowLCJzcCI6MH0=",
    "ttcsid_CN0EGPRC77U1TB56MMI0=1765546124271::rOtKrnw9cmEVnuw4MB_k.3.1765546146762.0",
    "ttcsid=1765546124272::cQ1r8rFZ_DNWsv_wCrN6.3.1765546146762.0"
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo "cURL Error: " . curl_error($ch);
}
curl_close($ch);

echo $response;
