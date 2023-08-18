<?php
function bot__handle__callback_query__nothing($botdata){
    //this button does nothing
    if($botdata["data"] == "nothing"){
        f("bot.kirim_perintah")("answerCallbackQuery",[
            "callback_query_id" => $botdata['id'],
            "text"=> "This button does nothing",
        ]);	
        return true;
    }
    return false;
}
    