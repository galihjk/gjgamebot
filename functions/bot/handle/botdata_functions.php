<?php
function bot__handle__botdata_functions($botdata, $functions, $errlog = true){
    $result = false;
    foreach($functions as $function){
        if(f($function)) return f($function, $errlog)($botdata);
    }
    return false;
}