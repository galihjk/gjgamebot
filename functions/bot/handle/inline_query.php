<?php
/*
    $results = [];
    if(!empty($user['playing_chat_id'])){
        $chat_id = $user['playing_chat_id'];
        $results[] = [
            'type'=>'article',
            'id'=>count($results)+1 . "|$chat_id|$query",
            'title'=>"JAWAB: $query",
            'description'=>"Pilih ini untuk menjawab dengan \"$query\"",
            'input_message_content'=>[
                'message_text'=>'*mengirim...',
            ],
            'thumb_url'=>'https://icon2.cleanpng.com/20180715/eqi/kisspng-speech-balloon-computer-icons-hablante-sprecherzie-icon-conversation-5b4b58176c9a10.6350522215316644074448.jpg',
        ];
    }
    else{
        $results[] = [
            'type'=>'article',
            'id'=>count($results)+1 . "|$query",
            'title'=>"Main $query yuk!",
            'description'=>"Ayo ajak temanmu!",
            'input_message_content'=>[
                'message_text'=>"Main $query yuk!",
            ],
            'thumb_url'=>'https://icon2.cleanpng.com/20180715/eqi/kisspng-speech-balloon-computer-icons-hablante-sprecherzie-icon-conversation-5b4b58176c9a10.6350522215316644074448.jpg',
        ];
    }
    f("bot.kirim_perintah")("answerInlineQuery",[
        'inline_query_id'=>$botdata['id'],
        'results'=>json_encode($results),
        'cache_time'=>1
    ]);
    return true;
*/

function bot__handle__inline_query($botdata){
    if(!f("bot.handle.botdata_functions")($botdata,[
        "game.sw.inline_query.ubah_mode",
        "game.sw.inline_query.ubah_kategori",
        "game.sw.inline_query.ubah_waktu_jawab",
    ])){
        
        f("bot.kirim_perintah")("answerInlineQuery",[
            'inline_query_id'=>$botdata['id'],
            'results'=>json_encode([
                [
                    'type'=>'article',
                    'id'=>"no_action",
                    'title'=>"Tidak ada hasil",
                    'description'=>"Tidak ada hasil",
                    'input_message_content'=>[
                        'message_text'=>'Untuk melihat daftar permainan, gunakan command /play',
                    ],
                    'thumb_url'=>'https://img.freepik.com/free-vector/red-prohibited-sign-no-icon-warning-stop-symbol-safety-danger-isolated-vector-illustration_56104-912.jpg',
                ]
            ]),
            'cache_time'=>1
        ]);

        // file_put_contents("log/unhandledcallback_query_".date("Y-m-d-H-i").".txt", file_get_contents("php://input"));
        file_put_contents("log/unhandledcallback_query_LAST.txt", file_get_contents("php://input"));
    };
    return true;
    
}