<?php
function replyMsg($method, $access_token, $data)
{
    try {
        $url = "https://api.line.me/v2/bot/message/reply";
        if ($method == "reply") {
            $url = "https://api.line.me/v2/bot/message/reply";
        } elseif ($method == "push") {
            $url = "https://api.line.me/v2/bot/message/push";
        } elseif ($method == "multicast") {
            $url = "https://api.line.me/v2/bot/message/multicast";
        } elseif ($method == "getInfo") {
            $url = "https://api.line.me/v2/profile";
        }
        $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);

        $data = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        $result = curl_exec($ch);
        curl_close($ch);
        if ($result == false) {
            throw new Exception(curl_error($ch), curl_errno($ch));
        }

    } catch (Exception $e) {
        print_r($e);
    }
    // return $result;
}

function getProfile($uid)
{
    $headers = array('Content-Type: application/json', 'Authorization: Bearer ' . $access_token);
    $url = 'https://api.line.me/v2/profile/' . $uid;
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    $result = curl_exec($ch);
    curl_close($ch);
}

function saveFriend($txt)
{
    $fw = fopen("friends.json", "a") or die("Unable to open file");
    fwrite($fw, $txt);
    fclose($fw);
}
