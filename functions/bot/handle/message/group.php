<?php
function bot__handle__message__group($botdata){
    if(!f("bot.handle.botdata_functions")($botdata,[
        "bot.handle.message.group.cmd",
    ])){
        file_put_contents("log/unhandleMsgGroupLAST.txt", print_r($botdata,true));
    };
    return false;
}