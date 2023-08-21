<?php
function user__get($user_id){
    return f("data.load")("users/$user_id");
}