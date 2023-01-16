<?php
function handle_message($botdata){
    if(f("is_private")($botdata)){
        f("handle_botdata_functions")($botdata,[
            "handle_message_start",
        ]);
    }
    else{
        // file_put_contents("log/unhandleMsg".date("Y-m-d-H-i").".txt", print_r($botdata,true));
        file_put_contents("log/unhandleMsgLAST.txt", print_r($botdata,true));
    }
}