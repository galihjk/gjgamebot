<?php
function bot__handle__chosen_inline_result($botdata){
    if(!f("bot.handle.botdata_functions")($botdata,[
        "game.sw.chosen_inline_result.ubah_mode",
        "game.sw.chosen_inline_result.ubah_kategori",
        "game.sw.chosen_inline_result.ubah_waktu_jawab",
    ])){
        file_put_contents("log/unhandledChosenInlineResult_LAST.txt", file_get_contents("php://input"));
    };
    return true;
    /*
        $explode = explode("|",$botdata['result_id']);
        if(count($explode) !== 3){
            return false;
        }
        $chat_id = $explode[1];
        $jawaban = $explode[2];
    */
}