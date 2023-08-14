<?php
function get_user($userid){
    $userdata = [];
    if(empty($GLOBALS['users'][$userid])){
        $userdata = f("data_load")("users/$userid");
        if(empty($GLOBALS['users'])){
            $GLOBALS['users'] = [];
        }
        $GLOBALS['users'][$userid] = $userdata;
    }
    else{
        $userdata = $GLOBALS['users'][$userid];
    }
    return $userdata;
}
    