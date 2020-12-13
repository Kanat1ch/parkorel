<?php
include("../core/database.php");
error_reporting(0);
session_start();
$aid=$_SESSION['ai'];
mysqli_query($link,"DELETE FROM attrimg WHERE id = '".$_GET['del_attrimg']."'");
header("location:attr_upload.php?attr_id=$aid");  
?>