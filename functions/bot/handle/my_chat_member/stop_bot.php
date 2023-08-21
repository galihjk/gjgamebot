<?php
function bot__handle__my_chat_member__stop_bot($botdata){
    if(!empty($botdata["chat"]["id"])
    and !empty($botdata["from"]["id"])
    and $botdata["from"]["id"] == $botdata["chat"]["id"]
    and !empty($botdata["new_chat_member"]["status"])
    and $botdata["new_chat_member"]["status"] == "kicked"
    ){
        f("user.set")($user_id, ['STOP_BOT'=>date("Y-m-d H:i:s")]);
        return true;
    }
    return false;
}
    