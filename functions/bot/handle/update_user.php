<?php
function bot__handle__update_user($botdata){
    $userid = $botdata['from']['id']; if(empty($userid)) return false;
    $userdata = f("user.get")($userid);
    if(
        empty($userdata['first_name']) or 
        empty($userdata['last_name']) or 
        empty($userdata['username']) or 
        empty($userdata['updated_at']) or 
        time()-strtotime($userdata['updated_at']) > 5*60 //lima menit
    ){
        $user = $botdata['from'];
        if(!isset($user['last_name'])) $user['last_name'] = "";
        if(!isset($user['username'])) $user['username'] = "";

        if(!isset($userdata['first_name'])) $userdata['first_name'] = "";
        if(!isset($userdata['last_name'])) $userdata['last_name'] = "";
        if(!isset($userdata['username'])) $userdata['username'] = "";

        $userdata['first_name'] = str_replace("<","&lt;",$userdata['first_name']);
        $userdata['last_name'] = str_replace("<","&lt;",$userdata['last_name']);
        
        if(
            $userdata['first_name'] != $user['first_name'] or
            $userdata['last_name'] != $user['last_name'] or
            $userdata['username'] != $user['username']
        ){
            $user_update = [
                'first_name'=>$user['first_name'],
                'last_name'=>$user['last_name'],
                'username'=>$user['username'],
            ];
            f("user.set")($userid, $user_update);
        }
    }   
    return false;
}