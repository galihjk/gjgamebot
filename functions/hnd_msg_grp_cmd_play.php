<?php
function hnd_msg_grp_cmd_play($botdata){
    if(true){
        $chat_id = $botdata["chat"]["id"];
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"test PLAY GROUP!",
        ]);
        return true;
    }
    return false;
}