<?php
function game__check_not_initiating($botdata){
    $chat_id = $botdata["chat"]["id"];
    $user_id = $botdata["from"]["id"];
    $initdata = f("data.load")("initiating/$user_id");
    if(empty($initdata)){
        return true;
    }
    else{
        f("bot.kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>"Saat ini anda sedang menginisiasi permainan, silakan /cancel_init dahulu.",
        ]);
        return false;
    }
}