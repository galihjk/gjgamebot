<?php
function bot__send_file($chat_id, $file, $caption){
    $caption = urlencode($caption);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.telegram.org/bot".f("get_config")("bot_token")."/sendDocument?caption=$caption&chat_id=$chat_id");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);

    // Create CURLFile
    $finfo = finfo_file(finfo_open(FILEINFO_MIME_TYPE), $file);
    $cFile = new CURLFile($file, $finfo);

    // Add CURLFile to CURL request
    curl_setopt($ch, CURLOPT_POSTFIELDS, [
        "document" => $cFile
    ]);

    // Call
    $result = curl_exec($ch);

    // Show result and close curl
    // var_dump($result);
    curl_close($ch);
    
    return true;
}