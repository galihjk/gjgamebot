<?php
function user__get($userid, $force_reload = false){
    // no db mode: return f("data.load")("users/$user_id");
    
    if($force_reload) $GLOBALS['users'][$userid] = null;

    if(empty($GLOBALS['users'][$userid])){

        $data = f("db.select_one")("select * from users where id = ".f("str.dbq")($userid,true));

        if(empty($data)){
            $result = f("bot.execute")("getChat",[
                "chat_id"=>$userid,
            ]);
            if(!empty($result["result"]["id"])){
                if(!isset($result["result"]['first_name'])) $result["result"]['first_name'] = "";
                if(!isset($result["result"]['last_name'])) $result["result"]['last_name'] = "";
                if(!isset($result["result"]['username'])) $result["result"]['username'] = "";
                $result["result"]['first_name'] = str_replace("<","&lt;",$result["result"]['first_name']);
                $result["result"]['last_name'] = str_replace("<","&lt;",$result["result"]['last_name']);
                f("db.q")("insert into users 
                (id, first_name,
                last_name, username,
                created_at, updated_at) 
                values 
                ('$userid', ".f("str.dbq")($result["result"]['first_name'],true).",
                ".f("str.dbq")($result["result"]['last_name'],true).", ".f("str.dbq")($result["result"]['username'],true).",
                '".f("saat_ini")()."', '".f("saat_ini")()."')");
                $data = [
                    'id'=>$userid,
                    'first_name'=>$result["result"]['first_name'],
                    'last_name'=>$result["result"]['last_name'],
                    'username'=>$result["result"]['username'],
                    'created_at'=>f("saat_ini")(),
                    'updated_at'=>f("saat_ini")(),
                ];
            }
            else{
                return false;
            }
        }

        if(empty($GLOBALS['users'])){
            $GLOBALS['users'] = [];
        }

        $GLOBALS['users'][$userid] = $data;
    }
    else{
        $data = $GLOBALS['users'][$userid];
    }

    return $data;
}