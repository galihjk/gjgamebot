<?php
function bot__add_update($data){
    $update_id = $data['update_id'];
    f("db.q")("insert into updates (update_id,data) values ($update_id,".f("str.dbq")(json_encode($data)).")");
}