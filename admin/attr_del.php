<?php
include("../core/database.php");
error_reporting(0);
session_start();
mysqli_query($link,"DELETE FROM attr WHERE id = '".$_GET['del_attr']."'");
header("location:attrs.php");  
?>