<?php
function hnd_msg_private($botdata){
    if(!f("handle_botdata_functions")($botdata,[
        "hnd_msg_prv_start",
    ])){
        file_put_contents("log/unhandleMsgPrivateLAST.txt", print_r($botdata,true));
    };
    return false;
}