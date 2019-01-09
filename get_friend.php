<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0",false);
require_once 'bot_library.php';
$content = file_get_contents("friend.json");
$content = json_decode($content,true);
echo $content[0]["userId"];
?>
