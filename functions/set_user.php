<?php
function set_user($userid, $data){
    $userdata = f("get_user")($userid);
    foreach($data as $ust_k=>$usr_v){
        $userdata[$ust_k] = $usr_v;
    }
    $GLOBALS['users'][$userid] = $userdata;
    f("data_save")("users/$userid",$userdata);
    return $userdata;
}
    