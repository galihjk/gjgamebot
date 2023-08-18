<?php
function bot__handle__message__private__cmd__start($botdata){
    $chat_id = $botdata["chat"]["id"];
    f("bot.kirim_perintah")("sendMessage",[
        "chat_id"=>$chat_id,
        "text"=>"Hai, yuk main denganku.. /play",
    ]);
}
    