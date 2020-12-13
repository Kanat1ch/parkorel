<?php
include("../core/database.php");
error_reporting(0);
session_start();
$pid=$_SESSION['pi'];
mysqli_query($link,"DELETE FROM postimg WHERE id = '".$_GET['del_postimg']."'");
header("location:post_upload.php?post_id=$pid");  
?>