<?php
    function srv__run(){
        $loopcount = 0;
        $time1 = time();
        $time_notif = time()+15;
        $srvcode = md5(date("mdHis").rand(0,100));
        f("data_save")("servercode", $srvcode);
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>f("get_config")('bot_admins')[0],
            "text"=>"Server Started: $srvcode",
        ]);
        while(true){
            $srvcode_current = f("data_load")("servercode", "");
            if($srvcode_current != $srvcode){
                f("bot_kirim_perintah")("sendMessage",[
                    "chat_id"=>f("get_config")('bot_admins')[0],
                    "text"=>"Server stopped. (srvcode_current=$srvcode_current, srvcode=$srvcode)",
                ]);
                return "SERVER STOPPED";
                break;
            }
            $loopcount++;
            if(time() >= $time_notif){
                $time_notif = time()+15;
                f("bot_kirim_perintah")("sendMessage",[
                    "chat_id"=>f("get_config")('bot_admins')[0],
                    "text"=>(time()-$time1)." detik berlalu. $srvcode",
                ]);
            }
            if(time()-$time1 > 30){
                f("srv.get_without_wait")("http://galihjk.my.id/gjgamebot/srv_run_fdb8e0f27050d87f4faad843c4da5f3f.php");
            }
            if(time()-$time1 > 40){
                f("bot_kirim_perintah")("sendMessage",[
                    "chat_id"=>f("get_config")('bot_admins')[0],
                    "text"=>"limit 40 sec.",
                ]);
                break;
            }
        }
        return "OK";
    }
    