<?php
function bot__handle__message__private__cmd__play($botdata){
    $chat_id = $botdata["chat"]["id"];
    $user_id = $botdata["from"]["id"];
    f("bot.kirim_perintah")("sendMessage",[
        "chat_id"=>$chat_id,
        "text"=>"test PLAY PRIVATE!",
    ]);
    f("user.set")($user_id,['playing_chat_id'=>$chat_id]);
}
    