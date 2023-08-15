<?php
function bot__handle__botdata_functions($botdata, $functions){
    $result = false;
    foreach($functions as $function){
        if(f($function)) return f($function)($botdata);
    }
    return false;
}