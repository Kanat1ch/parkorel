<?php
include("../app/database.php");
error_reporting(0);
session_start();
mysqli_query($link,"DELETE FROM requests WHERE id = '".$_GET['del_request']."'");
header("location:requestall.php");  
?>