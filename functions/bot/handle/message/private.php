<?php
function bot__handle__message__private($botdata){
    if(!f("bot.handle.botdata_functions")($botdata,[
        "bot.handle.message.private.cmd",
    ])){
        file_put_contents("log/unhandleMsgPrivateLAST.txt", print_r($botdata,true));
    };
    return false;
}