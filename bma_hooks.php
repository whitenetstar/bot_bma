<?php // callback.php

require "vendor/autoload.php";
require_once 'vendor/linecorp/line-bot-sdk/line-bot-sdk-tiny/LINEBotTiny.php';
require_once 'bot_library.php';

$access_token = 'Vc4+AyNpHxJCvzDsINZQpYx0j89Y26XWpAefFLHqIsekth8Be35Z5JtScJfXONx2SIHHBnq2g1xORJVW93vJqLyebuuwyLQ3Wo5zAT7kjEdq+3JQtuhKlDSijQBG7tKeK2YdcsLG0Z8BUedjyZrkmAdB04t89/1O/w1cDnyilFU=';

// Get POST body content
$content = file_get_contents('php://input');

// Get Line Template Content
$template = file_get_contents('template.json');
$template = json_decode($template, true);
// Parse JSON
$events = json_decode($content, true);

$db_arr = array();
// Validate parsed JSON data
if (!is_null($events['events'])) {
    // Loop through each event
    foreach ($events['events'] as $event) {
        // Reply only when message sent is in 'text' format
        if ($event['type'] == 'follow') {
            // Get replyToken
            $replyToken = $event['replyToken'];
            // Get Timestamp
            $timestamp = $event['timestamp'];
            // Get type of user
            $type_user = $event['source']['type'];
            // Get text sent
            $uid = $event['source']['userId'];

            $events["replyToken"] = $replyToken;
            $events["type"] = $event['type'];
            $events["timestamp"] = $timestamp;

            $source["type"] = $type_user;
            $source["userId"] = $uid;
            $events["source"] = $source;

            $res["events"][] = $events;
            $text = "สวัสดี ขอบคุณที่เพิ่มเรานะ";
            $text .= "รหัสของคุณคือ " . $uid;
            // Build message to reply back
            $messages = [
                'type' => 'flex',
                'contents' => $template,
            ];
            // $messages = [
            //     'type'=>'text',
            //     'text'=> $text
            // ];
            // Make a POST Request to Messaging API to reply to sender
            $url = 'https://api.line.me/v2/bot/message/reply';
            $data = [
                'replyToken' => $replyToken,
                'messages' => [$template],
            ];
            // echo json_encode($data);
            saveFriend(json_encode($res));
            callLine("reply", $access_token, $data);
        }
    }
}
