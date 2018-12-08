<?php
$a=mysql_connect('localhost','root','');
$b=mysql_select_db('job_portal',$a);
if(!$b){
    echo "Database Not Connect";
}
?>