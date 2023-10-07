<?php
function bot__handle__message__group__cmd__play_sw($botdata){
    $chat_id = $botdata["chat"]["id"];
    $user_id = $botdata["from"]["id"];

    if(f("game.check_not_initiating")($botdata) and f("game.check_not_playing")($botdata)){
        $categories = f("game.sw.category")();
        $mode = "personal";
        $kategori = "ACAK";
        $waktujawab = 60;
        $text = "Secret Word\n";
        $text .= "<i>Permainan menebak kata</i>\n";
        $text .= "Mode: $mode\n";
        $text .= "Kategori: $kategori\n";
        $text .= "Waktu Jawab: $waktujawab detik\n";
        $text .= "\n";
        $text .= "Mulai: /start_sw_$mode"."_$kategori"."_$waktujawab";
        
        $chat_id = $botdata["chat"]["id"];
        $result = f("bot.execute")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>$text,
            'parse_mode'=>'HTML',
            'reply_markup' => f("bot.gen_inline_keyboard")([
                ['Ubah Mode','sw.ubah_mode'],
                ['Ubah Kategori', 'sw.ubah_kategori'],
                ['Ubah Waktu Jawab', 'sw.ubah_waktu_jawab'],
            ]),
            // 'reply_markup' => f("bot.gen_inline_keyboard")([
            //     ['Ubah Mode','switch_inline_query_current_chat'=>'sw_ubah_mode'],
            //     ['Ubah Kategori', 'switch_inline_query_current_chat'=>'sw_ubah_kategori'],
            //     ['Ubah Waktu Jawab', 'switch_inline_query_current_chat'=>'sw_ubah_waktu_jawab'],
            // ]),
        ]);
        $msgid = $result['result']['message_id'];
    }
    return true;
}