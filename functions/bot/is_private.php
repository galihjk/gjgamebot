<?php
function bot__is_private($botdata){
    if(f("str.is_diawali")($botdata["chat"]["id"],"-")) return false;
    return true;
}