<?php
function game__sw__inline_query__ubah_mode($botdata){
    
    $query = $botdata['query'];

    if($query != "sw_ubah_mode"){
        return false;
    }
    $user_id = $botdata["from"]["id"];
    $initdata = f("data.load")("initiating/$user_id");
    if(empty($initdata)){
        f("bot.execute")("answerInlineQuery",[
            'inline_query_id'=>$botdata['id'],
            'results'=>json_encode([
                [
                    'type'=>'article',
                    'id'=>"no_action",
                    'title'=>"Anda belum menginisiasi permainan",
                    'description'=>"Untuk menginisiasi permainan, gunakan command /play_sw",
                    'input_message_content'=>[
                        'message_text'=>'Untuk menginisiasi permainan, gunakan command /play_sw',
                    ],
                    'thumb_url'=>'https://img.freepik.com/free-vector/red-prohibited-sign-no-icon-warning-stop-symbol-safety-danger-isolated-vector-illustration_56104-912.jpg',
                ]
            ]),
            'cache_time'=>1
        ]);
        return true;
    }

    f("bot.execute")("answerInlineQuery",[
        "inline_query_id"=>$botdata["id"],
        "results"=>json_encode([
            [
                "type"=>"article",
                "id"=>"sw_setmode_personal",
                "title"=>"Mode Personal",
                "description"=>"Tiap pemain membuat kata rahasia sendiri untuk ditebak pemain lain",
                "input_message_content"=>[
                    "message_text"=>"*memilih <b>MODE PERSONAL</b>\nTiap pemain membuat kata rahasia sendiri untuk ditebak pemain lain",
                    "parse_mode"=>"HTML",
                ],
                "thumb_url"=>"https://cdn-icons-png.flaticon.com/512/953/953789.png",
            ],
            [
                "type"=>"article",
                "id"=>"sw_setmode_randomteam",
                "title"=>"Mode Random Team (underconstruction)",
                "description"=>"Mohon maaf, mode ini belum bisa dipakai",
                "input_message_content"=>[
                    "message_text"=>"*memilih <b>MODE RANDOM TEAM</b>\nMohon maaf, mode ini belum bisa dipakai (Underconstruction)",
                    "parse_mode"=>"HTML",
                ],
                "thumb_url"=>"https://cdn-icons-png.flaticon.com/512/5822/5822134.png",
            ],
        ]),
        "cache_time"=>100
    ]);    

    return true;


}
    