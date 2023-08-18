<?php
function bot__handle__message__group__cmd__play_sw($botdata){
    $chat_id = $botdata["chat"]["id"];
    if(f("game.check_not_playing")($chat_id)){
        $mode = "personal";
        $kategori = "alat";
        $waktujawab = 60;
        $text = "Secret Word\n";
        $text .= "<i>Permainan menebak kata</i>\n";
        $text .= "Mode: $mode\n";
        $text .= "Kategori: $kategori\n";
        $text .= "Waktu Jawab: $waktujawab detik\n";
        $text .= "\n";
        $text .= "Mulai: /start_sw_$mode"."_$kategori"."_$waktujawab";
        
        $chat_id = $botdata["chat"]["id"];
        f("bot.kirim_perintah")("sendMessage",[
            "chat_id"=>$chat_id,
            "text"=>$text,
            'parse_mode'=>'HTML',
            'reply_markup' => f("bot.gen_inline_keyboard")([
                ['Ubah Mode', "nothing"],
                ['Ubah Kategori', "nothing"],
                ['Ubah Waktu Jawab', "nothing"],
            ]),
        ]);
    }
}