<?php
function bot__handle__message__group__cmd($botdata){
    $text = $botdata["text"] ?? "";
    $command = f("str.parse_cmd")($text)['command'] ?? "";
    if($text != "" && $command != ""){
        if(!f("bot.handle.botdata_functions")($botdata,[
            "bot.handle.message.group.cmd.$command",
        ],false,false)){
            $scandir = scandir("functions/bot/handle/message/group/cmd_started_with");
            dump($scandir);
            foreach($scandir as $file){
                if(in_array($file, ['..', '.'])) continue;
                if(f("str.is_diawali")($command,substr($file, 0, -4))){
                    dump("bot.handle.message.group.cmd_started_with.".substr($file, 0, -4));
                    f("bot.handle.botdata_functions")(
                        $botdata,
                        ["bot.handle.message.group.cmd_started_with.".substr($file, 0, -4)],
                        false,false
                    );
                }
            }
            
        };
        return true;
    }
    return false;
}