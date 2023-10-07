<?php
function bot__handle($updates){
    $jenis_updates = $GLOBALS['jenis_updates'];
    //==
    foreach($updates as $update){
        $new_offset = $update['update_id']+1;
        echo "----\n";
        print_r($update);
        echo "\n";
        foreach($jenis_updates as $item_jenis){
            if(!empty($update[$item_jenis])){
                $botdata = $update[$item_jenis];
                if(!empty($botdata["from"]["first_name"])){
                    $botdata["from"]["first_name"] = str_replace("<", "&lt;", $botdata["from"]["first_name"]);
                    $botdata["from"]["first_name"] = str_replace("'", "&apos;", $botdata["from"]["first_name"]);
                }
                if(!empty($botdata["from"]["last_name"])){
                    $botdata["from"]["last_name"] = str_replace("<", "&lt;", $botdata["from"]["last_name"]);
                    $botdata["from"]["last_name"] = str_replace("'", "&apos;", $botdata["from"]["last_name"]);
                }
                f("bot.handle.update_user")($botdata);
                f("bot.handle.$item_jenis")($botdata);
                break;
            }
            file_put_contents("log/unhandled_LAST.txt", print_r($update,true));
        }
        
    }
    if(!empty($new_offset))f("data.save")("get_updates_offset",$new_offset);
}