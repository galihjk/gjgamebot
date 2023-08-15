<?php
function bot__handle__chosen_inline_result($botdata){
    $from_id = $botdata['from']['id'];
    $from_name = $botdata['from']['first_name'];

    $explode = explode("|",$botdata['result_id']);
    if(count($explode) !== 3){
        return false;
    }
    $chat_id = $explode[1];
    $jawaban = $explode[2];

    f("bot.kirim_perintah")("sendMessage",[
        'chat_id' => $chat_id,
        'text'=> "ini: ".print_r($botdata,true),
        'parse_mode'=>'HTML',
    ]);

    return true;
}