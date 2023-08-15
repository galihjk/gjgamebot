<?php
function str_cmd($str){
    $command = "";
    $query = "";
    if(f("str.is_diawali")($str,"/")){
        $explode = explode(' ', $str);
        $command = $explode[0];
        $command = str_replace('@'.f("get_config")("botuname"), '', $command);
        $command = substr($command, 1);
        if(count($explode > 1)){
            $query = substr($str,1+strlen($explode[0]));
        }
        
    }
    return [
        'command' => $command,
        'query' => $query,
    ];
}