<?php
function hnd_msg_prv_cmd_start($botdata){
    $text = $botdata["text"] ?? "";
    if(f("str.is_diawali")($text,"/start")){
        
        $chat = $botdata["chat"];
        $chat_id = $chat["id"];

        f("bot.execute")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"test START! (private)",
        ]);

        return true;
    }
    return false;
}