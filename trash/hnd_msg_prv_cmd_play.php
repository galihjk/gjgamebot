<?php
function hnd_msg_prv_cmd_play($botdata){
    if(true){
        $chat_id = $botdata["chat"]["id"];
        $user_id = $botdata["from"]["id"];
        f("bot.execute")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"test PLAY PRIVATE!",
        ]);
        f("user.set")($user_id,['playing_chat_id'=>$chat_id]);
        return true;
    }
    return false;
}
    