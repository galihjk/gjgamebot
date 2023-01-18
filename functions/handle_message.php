<?php
function handle_message($botdata){
    if(f("is_private")($botdata)){
        if(!f("handle_botdata_functions")($botdata,[
            "hnd_msg_private",
        ])){
            file_put_contents("log/unhandleMsgPrivateLAST.txt", print_r($botdata,true));
        };
    }
    else{
        if(!f("handle_botdata_functions")($botdata,[
            "hnd_msg_group",
        ])){
            file_put_contents("log/unhandleMsgLAST.txt", print_r($botdata,true));
        }
    }
}