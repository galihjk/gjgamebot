<?php
function game__sw__chosen_inline_result__ubah_mode($botdata){
    if(f("str.is_diawali")($botdata['result_id'],"sw_setmode_")){
        $user_id = $botdata["from"]["id"];
        $initdata = f("data.load")("initiating/$user_id");
        if(empty($initdata)){
            return true;
        }
        $chat_id = $initdata["chat_id"];

        f("bot.execute")("sendMessage",[
            'chat_id' => $chat_id,
            'text'=> "ini: ".print_r([$initdata,$botdata],true),
            'parse_mode'=>'HTML',
        ]);
        return true;
    };    
    return false;
}
    