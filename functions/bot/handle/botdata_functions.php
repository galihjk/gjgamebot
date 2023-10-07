<?php
function bot__handle__botdata_functions($botdata, $functions, $errlog = true, $exit_not_exists = true){
    $result = false;
    foreach($functions as $function){
        return f($function, $errlog, $exit_not_exists)($botdata);
    }
    return false;
}