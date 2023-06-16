<?php
    function srv__run(){
        $loopcount = 0;
        while(true){
            $loopcount++;
            if($loopcount > 9999999){
                f("bot_kirim_perintah")("sendMessage",[
                    "chat_id"=>f("get_config")('bot_admins')[0],
                    "text"=>"Server Loop End",
                ]);
                break;
            }
        }
        return true;
    }
    