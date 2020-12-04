<!DOCTYPE html>
<html lang="en">
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("../app/database.php");
error_reporting(0);
session_start();
if(empty($_SESSION["adm_id"]))
{
	header('location:index.php');
}
else
{
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Админка</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/helper.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="fix-header">
    <div id="main-wrapper">
    <div class="left-sidebar">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                   <ul id="sidebarnav">
                        <li class="nav-label">Главная</li>
                                <li class="nav-label"><a href="postall.php">Афиша</a></li>
                                <li class="nav-label"><a href="post_add.php">Добавить в афишу</a></li>
                                <li class="nav-label"><a href="allattr.php">Все аттракционы</a></li>
                                <li class="nav-label"><a href="add_attr.php">Добавить аттракцион</a></li>
                                <li class="nav-label"><a href="clubsall.php">Все клубы</a></li>
                                <li class="nav-label"><a href="club_add.php">Добавить клуб</a></li>
                                <li class="nav-label"><a href="partnersall.php">Все партнеры</a></li>
                                <li class="nav-label"><a href="partners_add.php">Добавить партнеров</a></li>
                                <li class="nav-label"><a href="servicesall.php">Все сервисы</a></li>
                                <li class="nav-label"><a href="services_add.php">Добавить сервис</a></li>
                                
                    </ul>
                </nav>
            </div>
        </div>
        <div class="page-wrapper" style="height:1200px;">
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Панель управления</h3> </div>
            </div>
            <div class="container-fluid">
                     <div class="row">
                    <div class="col-md-3">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-archive f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from posts";
												$result=mysqli_query($link,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></h2>
                                    <p class="m-b-0">Афиша</p>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from attr";
												$result=mysqli_query($link,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></h2>
                                    <p class="m-b-0">Аттракционы</p>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from clubs";
												$result=mysqli_query($link,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></h2>
                                    <p class="m-b-0">Клубы</p>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from partners";
												$result=mysqli_query($link,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></h2>
                                    <p class="m-b-0">Партнеры</p>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php $sql="select * from services";
												$result=mysqli_query($link,$sql); 
													$rws=mysqli_num_rows($result);
													echo $rws;?></h2>
                                    <p class="m-b-0">Услуги</p>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php
}
?>