<?php
function user__get($userid){
    return f("data.load")("users/$userid");
}