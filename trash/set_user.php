<?php
function set_user($userid, $data){
    $userdata = f("user.get")($userid);
    foreach($data as $ust_k=>$usr_v){
        $userdata[$ust_k] = $usr_v;
    }
    f("data.save")("users/$userid",$userdata);
    return $userdata;
}
    