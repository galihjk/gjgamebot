<?php
function bot__handle__message($botdata){
    if(f("bot.is_private")($botdata)){
        if(!f("bot.handle.botdata_functions")($botdata,[
            "bot.handle.message.private",
        ])){
            file_put_contents("log/unhandleMsgPrivateLAST.txt", print_r($botdata,true));
        };
    }
    else{
        if(!f("bot.handle.botdata_functions")($botdata,[
            "bot.handle.message.group",
        ])){
            file_put_contents("log/unhandleMsgLAST.txt", print_r($botdata,true));
        }
    }
}