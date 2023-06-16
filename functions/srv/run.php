<?php
    function srv__run(){
        $loopcount = 0;
        $time1 = time();
        $time_notif = time()+15;
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>f("get_config")('bot_admins')[0],
            "text"=>"Server Started",
        ]);
        $srvcode = md5(date("mdHis").rand(0,100));
        f("data_save")("servercode", $srvcode);
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
                    "text"=>(time()-$time1)." detik berlalu.",
                ]);
            }
            if($loopcount > 9999){
                f("bot_kirim_perintah")("sendMessage",[
                    "chat_id"=>f("get_config")('bot_admins')[0],
                    "text"=>"Server Loop End",
                ]);
                break;
            }
            sleep(1);
        }
        return "OK";
    }
    