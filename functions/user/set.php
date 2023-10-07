<?php
function user__set($userid, $updatedata){
    /*
        // NO DB Mode:
        $userdata = f("user.get")($userid);
        foreach($updatedata as $ust_k=>$usr_v){
            $userdata[$ust_k] = $usr_v;
        }
        f("data.save")("users/$userid",$userdata);
        return $userdata;
    */
    $userdata = f("user.get")($userid);
    $updateq_arr = [];
    foreach($updatedata as $k=>$v){
        $userdata[$k] = $v;
        if($v === null){
            $updateq_arr[] = "$k = null";
        }
        else{
            $updateq_arr[] = "$k = ".f("str.dbq")($v,true);
        }
    }
    $GLOBALS['users'][$userid] = $userdata;
    $updateq_arr[] = "updated_at = '".f("saat_ini")()."'";
    $updateq_str = implode(", ",$updateq_arr);
    $q = "update users set $updateq_str where id = ".f("str.dbq")($userid,true);
    $result = f("db.q")($q);
    return $result;
}