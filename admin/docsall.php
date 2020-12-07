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
            <?php $docs = get_docs();?>
            <?php foreach ($docs as $doc):?>
            <div class="card mb-3" style="max-width: 1040px;">
  <div class="row no-gutters">
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><a href="docs/<?=$doc['link'];?>"><?=$doc['title']?></a></h5>
        <p class=><a class="btn btn-red" href="docs_del.php?del_docs=<?=$doc['id'];?>">Удалить</a></p>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>
</body>
</html>