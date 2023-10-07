<?php
function bot__handle__callback_query__sw__ubah_waktu_jawab($botdata){
    f("bot.execute")("answerCallbackQuery",[
        "callback_query_id" => $botdata['id'],
        "text"=> "ubah waktu jawab",
        "show_alert"=>true,
    ]);	
    return true;
}