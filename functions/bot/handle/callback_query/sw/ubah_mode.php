<?php
function bot__handle__callback_query__sw__ubah_mode($botdata){
    f("bot.execute")("answerCallbackQuery",[
        "callback_query_id" => $botdata['id'],
        "text"=> "ubah mode",
        "show_alert"=>true,
    ]);	
    return true;
}