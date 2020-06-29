<?php
$server_name="localhost";
$user_name="root";
$user_password="";
$db_name="examcell";
$conn=new mysqli($server_name,$user_name,$user_password,$db_name);
if($conn->connect_error)
{
    die("Connection Failed!Connection Failed!Connection Failed!".$conn->connect_error);
}
?>