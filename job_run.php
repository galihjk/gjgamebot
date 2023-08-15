<?php
include("init.php");
$last_job_run = f("data.load")("last_job_run",0);
$current_time = time();
if($last_job_run != $current_time){
    f("data.save")("last_job_run",$current_time);

    // $delay = $current_time - $last_job_run;
    
}
echo "Running job [$current_time]";