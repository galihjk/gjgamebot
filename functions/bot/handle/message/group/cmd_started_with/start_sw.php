<?php
function bot__handle__message__group__cmd_started_with__start_sw($botdata){
    if(f("game.check_not_initiating")($botdata) and f("game.check_not_playing")($botdata)){
        $chat_id = $botdata["chat"]["id"];
        $user_id = $botdata["from"]["id"];
        $text = $botdata["text"] ?? "";
        $command = f("str.parse_cmd")($text)['command'] ?? "";
        $command_explode = explode("_",$command);
        
        $text = "$user_id memulai blablablabla test [$command]";
        $result = f("bot.execute")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>$text,
            'parse_mode'=>'HTML',
            'reply_markup' => f("bot.gen_inline_keyboard")([
                ['Join','nothing'],
            ]),
        ]);
        f("data.save")("initiating/$user_id",[
            "game_name"=>"Secret Word",
            "chat_id"=>$chat_id,
            "msgid"=>$result['result']['message_id'],
        ]);
    }
}