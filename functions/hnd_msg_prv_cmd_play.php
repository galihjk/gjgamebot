<?php
function hnd_msg_prv_cmd_play($botdata){
    if(true){
        $chat_id = $botdata["chat"]["id"];
        $user_id = $botdata["from"]["id"];
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"test PLAY PRIVATE!",
        ]);
        f("set_user")($user_id,['playing_chat_id'=>$chat_id]);
        return true;
    }
    return false;
}
    