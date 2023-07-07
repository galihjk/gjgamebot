<?php
function handle_botdata_functions($botdata, $functions){
    $result = false;
    foreach($functions as $function){
        $filename = "functions/$function.php";
        if(!file_exists($filename)){
            file_put_contents("log/f_handle_not_exist_".date("Y-m-d-H-i").".txt", $function);
            return false;
        }
        return f($function)($botdata);
    }
    return false;
}