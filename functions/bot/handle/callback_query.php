<?php
function bot__handle__callback_query($botdata){
    if(!f("bot.handle.botdata_functions")($botdata,[
        "bot.handle.callback_query.nothing",
    ])){
        // file_put_contents("log/unhandledcallback_query_".date("Y-m-d-H-i").".txt", file_get_contents("php://input"));
        file_put_contents("log/unhandledcallback_query_LAST.txt", file_get_contents("php://input"));
    };
}