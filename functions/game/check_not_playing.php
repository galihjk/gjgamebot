<?php
function game__check_not_playing($botdata){
    $chat_id = $botdata["chat"]["id"];
    $playingdata = f("data.load")("playing/$chat_id");
    if(empty($playingdata)){
        return true;
    }
    else{
        f("bot.execute")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"Mohon maaf, saat ini sedang berlangsung permainan ".$playingdata['game_name'],
        ]);
        return false;
    }
}
    