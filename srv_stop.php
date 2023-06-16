<?php
include("init.php");
$srvcode = md5(date("mdHis").rand(0,100));
f("data_save")("servercode", $srvcode);