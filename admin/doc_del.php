<?php
include("../core/database.php");
error_reporting(0);
session_start();
mysqli_query($link,"DELETE FROM docs WHERE id = '".$_GET['del_docs']."'");
header("location:docs.php");  
?>