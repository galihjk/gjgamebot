<?php
// exit();
include("init.php");

$time1 = time();
$time_notif = time()+15;
$srvcode = md5(date("mdHis").rand(0,100));
f("data.save")("servercode", $srvcode);

sleep(1); //wait for another server to stop

// f("bot.execute")("sendMessage",[
//     "chat_id"=>f("get_config")('bot_admins')[0],
//     "text"=>"Server Started: $srvcode",
// ]);

$offset = f("data.load")("get_updates_offset",0);

while(true){

    $srvcode_current = f("data.load")("servercode", "", true);
    if($srvcode_current != $srvcode){
        f("bot.execute")("sendMessage",[
            "chat_id"=>f("get_config")('bot_admins')[0],
            "text"=>"Server $srvcode stopped. (srvcode_current='$srvcode_current')",
        ]);
        $getupdates = f("bot.execute")("getUpdates",[
            "offset"=>$offset,
        ]);
        // return "SERVER STOPPED";
        exit();
        break;
    }
    
    if(time() >= $time_notif){
        $time_notif = time()+15;
        
        if(time()-$time1 > 60){
            $getupdates = f("bot.execute")("getUpdates",[
                "offset"=>$offset,
            ]);
            f("srv.get_without_wait")(f("get_config")("run_srv"));
            exit();
            break;
        }
        f("data.save")("servertime", time());
    }

    $getupdates = f("bot.execute")("getUpdates",[
        "offset"=>$offset,
        'allowed_updates'=>$GLOBALS['jenis_updates'],
    ]);

    if(!empty($getupdates["result"])){
        $updates = $getupdates["result"];
        f("bot.handle")($updates);
    }

}