<?php
function get_user($userid){
    return f("data.load")("users/$userid");
}
    