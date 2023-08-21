<?php
// exit();
include("init.php");

$time1 = time();
$time_notif = time()+15;
$srvcode = md5(date("mdHis").rand(0,100));
f("data.save")("servercode", $srvcode);

sleep(2); //wait for another server to stop

// f("bot.kirim_perintah")("sendMessage",[
//     "chat_id"=>f("get_config")('bot_admins')[0],
//     "text"=>"Server Started: $srvcode",
// ]);

$offset = f("data.load")("get_updates_offset",0);
$jenis_updates = [
    "message",
    "inline_query",
    "chosen_inline_result",
    "my_chat_member",
    "callback_query",
];
while(true){

    $srvcode_current = f("data.load")("servercode", "", true);
    if($srvcode_current != $srvcode){
        f("bot.kirim_perintah")("sendMessage",[
            "chat_id"=>f("get_config")('bot_admins')[0],
            "text"=>"Server $srvcode stopped. (srvcode_current='$srvcode_current')",
        ]);
        $getupdates = f("bot.kirim_perintah")("getUpdates",[
            "offset"=>$offset,
        ]);
        // return "SERVER STOPPED";
        exit();
        break;
    }
    
    if(time() >= $time_notif){
        $time_notif = time()+15;
        
        // f("bot.kirim_perintah")("sendMessage",[
        //     "chat_id"=>f("get_config")('bot_admins')[0],
        //     "text"=>(time()-$time1)." detik berlalu. $srvcode. $offset.",
        // ]);
        if(time()-$time1 > 60){
            $getupdates = f("bot.kirim_perintah")("getUpdates",[
                "offset"=>$offset,
            ]);
            f("srv.get_without_wait")(f("get_config")("run_srv"));
            exit();
            break;
        }
        f("data.save")("servertime", time());
    }

    $getupdates = f("bot.kirim_perintah")("getUpdates",[
        "offset"=>$offset,
    ]);

    if(!empty($getupdates["result"])){
        $updates = $getupdates["result"];
        $updated_users = [];
        foreach($updates as $update){
            foreach($jenis_updates as $item_jenis){
                if(!empty($update[$item_jenis])){
                    $botdata = $update[$item_jenis];
                    if(!empty($botdata["from"]["first_name"])){
                        $botdata["from"]["first_name"] = str_replace("<", "&lt;", $botdata["from"]["first_name"]);
                        $botdata["from"]["first_name"] = str_replace("'", "&apos;", $botdata["from"]["first_name"]);
                        if(!in_array($botdata["from"]["id"],$updated_users)){
                            $user_id = $botdata["from"]["id"];
                            $updated_users[] = $user_id;
                            f("user.set")($user_id, $botdata["from"]);
                        }
                    }
                    if(!empty($botdata["from"]["last_name"])){
                        $botdata["from"]["last_name"] = str_replace("<", "&lt;", $botdata["from"]["last_name"]);
                        $botdata["from"]["last_name"] = str_replace("'", "&apos;", $botdata["from"]["last_name"]);
                    }
                    f("bot.handle.$item_jenis")($botdata);
                    break;
                }
            }
            file_put_contents("log/unhandled_LAST.txt", print_r($update,true));
            $offset = 1+$update["update_id"];
        }
        f("data.save")("get_updates_offset",$offset);
    }

}