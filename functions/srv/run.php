<?php
    function srv__run(){
        $loopcount = 0;
        $time1 = time();
        $time_notif = time()+15;
        f("bot_kirim_perintah")("sendMessage",[
            "chat_id"=>f("get_config")('bot_admins')[0],
            "text"=>"Server Started",
        ]);
        while(true){
            $loopcount++;
            if(time() >= $time_notif){
                $time_notif = time()+15;
                f("bot_kirim_perintah")("sendMessage",[
                    "chat_id"=>f("get_config")('bot_admins')[0],
                    "text"=>(time()-$time1)." detik berlalu.",
                ]);
            }
            if($loopcount > 9999999){
                f("bot_kirim_perintah")("sendMessage",[
                    "chat_id"=>f("get_config")('bot_admins')[0],
                    "text"=>"Server Loop End",
                ]);
                break;
            }
            sleep(1);
        }
        return true;
    }
    