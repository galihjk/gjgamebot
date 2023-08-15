<?php
function bot__handle__message__group__cmd__play($botdata){
    $chat_id = $botdata["chat"]["id"];
    f("bot.kirim_perintah")("sendMessage",[
        "chat_id"=>$chat_id,
        "text"=>"test PLAY GROUP!",
    ]);
}