<?php
function get_user($user_id){
    return f("data.load")("users/$user_id");
}
    