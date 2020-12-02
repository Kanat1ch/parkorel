<!DOCTYPE html>
<html lang="en">
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("../app/include/database.php");
include("../app/include/functions.php");
error_reporting(0);
session_start();
$p_id = $_GET['id'];
$posts = get_image_by_id($p_id);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="page-header">
                <h1>Все записи:</h1>
            </div>  
            <?php $posts = get_posts();?>
            <?php foreach ($posts as $post):?>
            <div class="card mb-3" style="max-width: 1040px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/posts/<?=$post['img']?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><a href="post.php?post_id=<?=$post['id'];?>"><?=$post['title']?></a></h5>
        <p class="card-text"><?=mb_substr($post['content'], 0, 128, 'UTF-8').'...'?></p>
        <p class=><a class="btn btn-dark" href="../post.php?post_id=<?=$post['id'];?>">Читать больше</a><a class="btn btn-dark" href="upadate_post.php?post_id=<?=$post['id'];?>">Редактировать</a><a class="btn btn-dark" href="upload_post.php?post_id=<?=$post['id'];?>">Добавить картинку</a><a class="btn btn-red" href="delete_post.php?del_post=<?=$post['id'];?>">Удалить</a></p>
        <p class="card-text"><small class="text-muted">17 октября 2002</small> <small class="text-muted">Категория</small></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
</body>
</html>