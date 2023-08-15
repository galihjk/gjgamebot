<?php
function bot__handle__message__group__cmd($botdata){
    $text = $botdata["text"] ?? "";
    $command = f("str.parse_cmd")($text)['command'] ?? "";
    if($text != "" && $command != ""){
        return f("bot.handle.botdata_functions")($botdata,[
            "handle.message.group.cmd.$command",
        ]);
    }
    return false;
}