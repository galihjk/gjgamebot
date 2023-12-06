<?php
include("init.php");
// f("bot.execute")("sendMessage",[
//     "chat_id"=>f("get_config")('bot_admins')[0],
//     "text"=>"Server Started",
// ]);
$srvcode = md5(date("mdHis").rand(0,100));
f("data.save")("servercode", $srvcode);
echo f("get_config")("run_srv");
f("srv.get_without_wait")(f("get_config")("run_srv"));
echo "Server STARTED";