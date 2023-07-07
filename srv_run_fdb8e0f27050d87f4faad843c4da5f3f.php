<?php
include("init.php");

$time1 = time();
$time_notif = time()+15;
$srvcode = md5(date("mdHis").rand(0,100));
f("data_save")("servercode", $srvcode);
// f("bot_kirim_perintah")("sendMessage",[
//     "chat_id"=>f("get_config")('bot_admins')[0],
//     "text"=>"Server Started: $srvcode",
// ]);
$offset = f("data_load")("get_updates_offset",0);
$jenis_updates = [
    "message",
    // "callback_query",
];
while(true){
    $srvcode_current = f("data_load")("servercode", "");
    if($srvcode_current != $srvcode){
        // f("bot_kirim_perintah")("sendMessage",[
        //     "chat_id"=>f("get_config")('bot_admins')[0],
        //     "text"=>"Server stopped. (srvcode_current=$srvcode_current, srvcode=$srvcode)",
        // ]);
        // return "SERVER STOPPED";
        break;
    }
    
    if(time() >= $time_notif){
        $time_notif = time()+15;
        $getupdates = f("bot_kirim_perintah")("getUpdates",[
            "offset"=>$offset,
        ]);
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>f("get_config")('bot_admins')[0],
            "text"=>(time()-$time1)." detik berlalu. $srvcode. $offset.",
        ]);
        if(time()-$time1 > 60){
            f("srv.get_without_wait")(f("get_config")("run_srv"));
            break;
        }
        f("data_save")("servertime", time());
    }

    $getupdates = f("bot_kirim_perintah")("getUpdates",[
        "offset"=>$offset,
    ]);

    if(!empty($getupdates["result"])){
        $updates = $getupdates["result"];
        foreach($updates as $update){
            foreach($jenis_updates as $item_jenis){
                if(!empty($update[$item_jenis])){
                    f("handle_$item_jenis")($update[$item_jenis]);
                    break;
                }
            }
            file_put_contents("log/unhandled_LAST.txt", $update);
            $offset = 1+$update["update_id"];
        }
        f("data_save")("get_updates_offset",$offset);
    }

}