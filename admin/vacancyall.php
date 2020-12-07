<!DOCTYPE html>
<html lang="en">
<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
include("../app/database.php");
include("../app/functions.php");
error_reporting(0);
session_start();
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
            <?php $vacancies = get_vacancies();?>
            <?php foreach ($vacancies as $vacancy):?>
            <div class="card mb-3" style="max-width: 1040px;">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img/vacancy/<?=$vacancy['img']?>" class="card-img" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><a href="vacancy_info.php?vacancy_id=<?=$vacancy['id'];?>"><?=$vacancy['title']?></a></h5>
        <p class=><a class="btn btn-dark" href="vacancy_info.php?vacancy_id=<?=$vacancy['id'];?>">Читать больше</a><a class="btn btn-dark" href="vacancy_update.php?vacancy_id=<?=$vacancy['id'];?>">Редактировать</a><a class="btn btn-dark" href="upload_post.php?post_id=<?=$post['id'];?>">Добавить картинку</a><a class="btn btn-red" href="vacancy_del.php?del_vacancy=<?=$vacancy['id'];?>">Удалить</a></p>
        <p class="card-text"><small class="text-muted">17 октября 2002</small> <small class="text-muted">Категория</small></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
</body>
</html>