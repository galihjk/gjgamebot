<?php
include("init.php");
f("bot_kirim_perintah")("sendMessage",[
    "chat_id"=>f("get_config")('bot_admins')[0],
    "text"=>"Server Started",
]);
f("srv.get_without_wait")(f("get_config")("run_srv"));
echo "Server STARTED";