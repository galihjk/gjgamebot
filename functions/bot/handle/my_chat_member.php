<?php
function bot__handle__my_chat_member($botdata){
    if(!f("bot.handle.botdata_functions")($botdata,[
        "bot.handle.my_chat_member.stop_bot",
    ])){
        file_put_contents("log/unhandled_my_chat_member_LAST.txt", print_r($botdata,true));
    };
}