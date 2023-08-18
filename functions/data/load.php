<?php
function data__load($name, $empty = [], $force_reload = false){

	$data = $empty;

    if($force_reload) $GLOBALS['data'][$name] = null;

    if(empty($GLOBALS['data'][$name])){

        $filename="data/$name.json";
		if(file_exists($filename)){
			$filedata = file_get_contents($filename);
			$data = json_decode($filedata,true);
			if($data === false){
				$data = $empty;
			}
		}
		else{
			$data = $empty;
		}

        if(empty($GLOBALS['data'])){
            $GLOBALS['data'] = [];
        }

        $GLOBALS['data'][$name] = $data;
    }
    else{
        $data = $GLOBALS['data'][$name];
    }

    return $data;
}