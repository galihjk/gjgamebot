<?php
function set_user($user_id, $data){
    $userdata = f("user.get")($user_id);
    foreach($data as $ust_k=>$usr_v){
        $userdata[$ust_k] = $usr_v;
    }
    f("data.save")("users/$user_id",$userdata);
    return $userdata;
}
    