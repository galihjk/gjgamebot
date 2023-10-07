<?php
echo "<h1>GJGamebot</h1>";
if(file_exists('config.php')){
    echo "<p><a href='setwebhook.php'>setwebhook</a></p>";
    echo "<p><a href='unsetwebhook.php'>unsetwebhook</a></p>";
    echo "<p><a href='getUpdates.php'>getUpdates</a></p>";
}
else{
    echo "CONFIG FILE DOES NOT EXIST!";
}
