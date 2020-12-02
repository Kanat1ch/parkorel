<?php
 require_once 'include/database.php';
 require_once 'include/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <title>header</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <?php 
      
      $categories = get_categories();
    ?>
    <?php if (count($categories) === 0) ?>
      <li class="nav-item active">
        <a class="nav-link" href="#">Добавить категорию</a>
      </li>
    
      <?php 
      
        // while ($i <= 6) {
        //   echo 
        //   '<li class="nav-item">
        //   <a class="nav-link" href="#">Features '.$i.'</a>
        // </li>';
        //   $i++;
        // };
        // do {
        //   echo 
        //   '<li class="nav-item">
        //   <a class="nav-link" href="#">Features '.$i.'</a>
        // </li>';
        //   $i++;
        // } 
        // while ($i <= 6);
        // for ($i=1, $count = count($categories); $i <= $count; $i++) { 
        //   echo '<li class="nav-item">
        //   <a class="nav-link" href="#">Features '.$i.'</a>
        // </li>';
        // }
        foreach ($categories as $category) {
          echo '<li class="nav-item">
          <a class="nav-link" href="/category.php?id='.$category['id'].'">'.$category['title'].' </a>
        </li>';
        }
      ?>
    
    </ul>
  </div>
</nav>