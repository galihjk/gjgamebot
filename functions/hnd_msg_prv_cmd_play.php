<?php
function hnd_msg_prv_cmd_play($botdata){
    if(true){
        $chat_id = $botdata["chat"]["id"];
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"test PLAY PRIVATE!",
        ]);
        return true;
    }
    return false;
}
    