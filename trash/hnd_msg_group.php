<?php
function hnd_msg_group($botdata){
    if(!f("bot.handle.botdata_functions")($botdata,[
        "hnd_msg_grp_commands",
    ])){
        file_put_contents("log/unhandleMsgGroupLAST.txt", print_r($botdata,true));
    };
    return false;
}