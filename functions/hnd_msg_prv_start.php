<?php
function hnd_msg_prv_start($botdata){
    $text = $botdata["text"] ?? "";
    if(f("str_is_diawali")($text,"/start")){
        
        $chat = $botdata["chat"];
        $chat_id = $chat["id"];

        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"test START!",
        ]);

        return true;
    }
    return false;
}