<?php

require "vendor/autoload.php";

$access_token = 'trDx2gTUsd/6C6EgXFRz2Cv7teEgdwxvmBaRH+YTUAfvMUJOw0npGoKhGAorYttBSIHHBnq2g1xORJVW93vJqLyebuuwyLQ3Wo5zAT7kjEdt+1GN5Rk2JwcxXE2f3IwVNNtsEVUYwe6Be21KZhPoVgdB04t89/1O/w1cDnyilFU=
';

$channelSecret = 'ae4574b5e24f07f90859297ff4ed2b33';

$pushID = 'U7ef7a449f2a5c2057eacfc02ba2eb286';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channelSecret]);

$textMessageBuilder = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder('hello world');
$response = $bot->pushMessage($pushID, $textMessageBuilder);

echo $response->getHTTPStatus() . ' ' . $response->getRawBody();
