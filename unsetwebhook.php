<?php
include("init.php");
echo $webhook = "https://".$_SERVER['SERVER_NAME'] .f("get_config")("webhook");
echo "<pre>";
print_r(
    f("bot.execute")("setWebhook",[
        'drop_pending_updates'=>true,
    ])
);
echo "</pre>";