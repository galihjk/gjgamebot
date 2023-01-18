<?php
function hnd_msg_grp_commands($botdata){
    $text = $botdata["text"] ?? "";
    $command = f("str_cmd")($text)['command'] ?? "";
    if($text != "" && $command != ""){
        return f("handle_botdata_functions")($botdata,[
            "hnd_msg_grp_cmd_$command",
        ]);
    }
    return false;
}