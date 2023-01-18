<?php
function hnd_msg_grp_play($botdata){
    if(true){
        $chat_id = $botdata["chat"]["id"];
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"test PLAY!",
        ]);
        return true;
    }
    return false;
}