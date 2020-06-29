<?php
$server_name="166.62.28.125";
$user_name="mpg7";
$user_password="mpgseven";
$db_name="mpgseven";
$conn=new mysqli($server_name,$user_name,$user_password,$db_name);
if($conn->connect_error)
{
    die("Connection Failed!Connection Failed!Connection Failed!".$conn->connect_error);
}
?>