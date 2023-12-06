<?php
function srv__run(){
    $offset = f("data.load")("get_updates_offset",0);
    $data = f("db.q")("select * from updates where update_id >= $offset order by update_id");
    if(!empty($data)){
        f("db.q")("delete from updates where update_id < $offset");
        $getupdates = [];
        foreach($data as $item){
            $getupdates[] = json_decode($item['data'],true);
        }
        f("bot.handle")($getupdates);
    }
    return true;
}
    