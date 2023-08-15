<?php 
date_default_timezone_set('Asia/Jakarta');
function f($f, $errlog = true){
    $filename = "functions/".str_replace(".","/",$f).".php";
    if(file_exists($filename)){
        include_once($filename);
        return str_replace(".","__",$f);
    }
    if ($errlog) file_put_contents("log/f_not_exist_".date("Y-m-d-H-i").".txt", $f);
    return false;
}