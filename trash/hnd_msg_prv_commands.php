<?php
function hnd_msg_prv_commands($botdata){
    $text = $botdata["text"] ?? "";
    $command = f("str.parse_cmd")($text)['command'] ?? "";
    if($text != "" && $command != ""){
        return f("bot.handle.botdata_functions")($botdata,[
            "hnd_msg_prv_cmd_$command",
        ]);
    }
    return false;
}
    