<?php // callback.php

require "vendor/autoload.php";
require_once 'vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php';
$text = $_POST["message"];

$access_token = 'Vc4+AyNpHxJCvzDsINZQpYx0j89Y26XWpAefFLHqIsekth8Be35Z5JtScJfXONx2SIHHBnq2g1xORJVW93vJqLyebuuwyLQ3Wo5zAT7kjEdq+3JQtuhKlDSijQBG7tKeK2YdcsLG0Z8BUedjyZrkmAdB04t89/1O/w1cDnyilFU=';
// $text = "ทดสอบระบบ";
$messages = [
    'type' => 'text',
    'text' => $text,
];
$uid = "U42bd564d1c5ed0adf7d5a43113a277d0";

$url = 'https://api.line.me/v2/bot/message/push';
$data = [
    'to' => $uid,
    'messages' => [$messages],
];
$post = json_encode($data);
$headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result . "\r\n";

echo "OK";
