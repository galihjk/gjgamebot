<?php
include("init.php");
$srvcode = md5(date("mdHis").rand(0,100));
f("data.save")("servercode", $srvcode);
echo "OK";
// f("bot.kirim_perintah")("sendMessage",[
//     "chat_id"=>f("get_config")('bot_admins')[0],
//     "text"=>"Server Stopped",
// ]);