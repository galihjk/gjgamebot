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

        f("bot_kirim_perintah",5)("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"5 detik telah beralu",
        ]);

        return true;
    }
    return false;
}