<?php

require "vendor/autoload.php";

// require_once 'vendor/linecorp/line-bot-sdk/src/LINEBot.php';
// require_once 'vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php';
$access_token = 'Vc4+AyNpHxJCvzDsINZQpYx0j89Y26XWpAefFLHqIsekth8Be35Z5JtScJfXONx2SIHHBnq2g1xORJVW93vJqLyebuuwyLQ3Wo5zAT7kjEdq+3JQtuhKlDSijQBG7tKeK2YdcsLG0Z8BUedjyZrkmAdB04t89/1O/w1cDnyilFU=
';
$channel_secret = 'ae4574b5e24f07f90859297ff4ed2b33';

$httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient($access_token);
$bot = new \LINE\LINEBot($httpClient, ['channelSecret' => $channel_secret]);

$msg = "Hello World";
$message = new \LINE\LINEBot\MessageBuilder\TextMessageBuilder($msg);
$uid = "U42bd564d1c5ed0adf7d5a43113a277d0";
// $response = $bot->pushMessage($uid, $message);
var_dump($message);
