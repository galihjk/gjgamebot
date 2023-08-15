<?php
function bot__handle__message__private__cmd($botdata){
    $text = $botdata["text"] ?? "";
    $command = f("str.parse_cmd")($text)['command'] ?? "";
    if($text != "" && $command != ""){
        return f("bot.handle.botdata_functions")($botdata,[
            "handle.message.private.cmd.$command",
        ]);
    }
    return false;
}