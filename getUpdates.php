<?php
include_once("init.php");
$offset = f("data.load")("get_updates_offset",0);
$updates = f("bot.execute")("getUpdates",[
    'offset'=>$offset,
    'allowed_updates'=>$GLOBALS['jenis_updates'],
]);
echo "<pre>";
if(empty($updates['result'])){
    die("no result");
}
else{
    // f("bot.handle")($updates['result']);
    $updates_got = $updates['result'];
    foreach($updates_got as $item){
        f("bot.add_update")($item);
    }
    
}
exit();
