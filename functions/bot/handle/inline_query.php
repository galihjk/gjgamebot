<?php
function bot__handle__inline_query($botdata){
    $jawaban = $botdata['query'];
    $user = f("user.get")($botdata["from"]["id"]);
    $results = [];
    if(!empty($user['playing_chat_id'])){
        $chat_id = $user['playing_chat_id'];
        $results[] = [
            'type'=>'article',
            'id'=>count($results)+1 . "|$chat_id|$jawaban",
            'title'=>"JAWAB: $jawaban",
            'description'=>"Pilih ini untuk menjawab dengan \"$jawaban\"",
            'input_message_content'=>[
                'message_text'=>'*mengirim...',
            ],
            'thumb_url'=>'https://icon2.cleanpng.com/20180715/eqi/kisspng-speech-balloon-computer-icons-hablante-sprecherzie-icon-conversation-5b4b58176c9a10.6350522215316644074448.jpg',
        ];
    }
    else{
        $results[] = [
            'type'=>'article',
            'id'=>count($results)+1 . "|$jawaban",
            'title'=>"Main $jawaban yuk!",
            'description'=>"Ayo ajak temanmu!",
            'input_message_content'=>[
                'message_text'=>"Main $jawaban yuk!",
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
}