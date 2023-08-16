<?php
function bot__handle__message__group__cmd($botdata){
    $text = $botdata["text"] ?? "";
    $command = f("str.parse_cmd")($text)['command'] ?? "";
    if($text != "" && $command != ""){
        f("bot.handle.botdata_functions")($botdata,[
            "bot.handle.message.group.cmd.$command",
        ],false);
        return true;
    }
    return false;
}