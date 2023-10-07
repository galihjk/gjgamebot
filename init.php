<?php 
date_default_timezone_set('Asia/Jakarta');
function f($f, $errlog = true, $not_found_exit = true){
    $filename = "functions/".str_replace(".","/",$f).".php";
    if(file_exists($filename)){
        include_once($filename);
        return str_replace(".","__",$f);
    }
    if ($errlog) file_put_contents("log/f_not_exist_".date("Y-m-d-H-i").".txt", $f);
    echo "f_not_exist: $f!\n";
    if ($not_found_exit) exit();
    return "error_init_function";
}

function error_init_function(){
    $numArgs = func_num_args();
    echo 'Number of arguments:' . $numArgs . "\n";
    $args = func_get_args();
    foreach ($args as $index => $arg) {
        echo 'Argument' . $index . ' is ' . print_r($arg,1) . "\n";
        unset($args[$index]);
    }
    return false;
}

function dump($data, $vardump = false) {
    echo '<pre>';
    if($vardump)var_dump($data);
    if(!$vardump)print_r($data);
    echo '</pre><br>';
}
function dd($data, $vardump = false) {
    dump($data, $vardump);
    die();
}
$GLOBALS['jenis_updates'] = [
    "message",
    "inline_query",
    "chosen_inline_result",
    "my_chat_member",
    "callback_query",
];