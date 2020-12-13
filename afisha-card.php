<!DOCTYPE html>
<html lang="ru">
<?php 
    // ini_set('error_reporting', E_ALL);
    // ini_set('display_errors', 1);
    // ini_set('display_startup_errors', 1);
    include_once 'core/database.php';
    include_once 'core/functions.php';
    $post_id = $_GET['post_id'];
    $pid = $_GET['post_id'];
    if (!is_numeric($post_id)) exit();
    $post = get_post_by_id($post_id);
    ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/afisha-card.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-afisha-card.js" defer></script>
    <script src="scripts/fullsize-image.js" defer></script>
    <title><?=$post['title']?> - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>
    <script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi-afisha-card.min.css');
            document.querySelector('head').append(visImpStyles);
        }

        if ((localStorage.getItem('viDarkTheme')) == 'true') {
                document.body.style.backgroundColor = '#111';
                document.body.classList.add('vi-dark');
            } else {
                document.body.style.backgroundColor = '';
                document.body.classList.remove('vi-dark');
        }
    </script> 
        <?php require_once 'templates/header.php';?>

    <div class="cssload-container">
        <div class="cssload-whirlpool"></div>
    </div>
    <script src="scripts/vi/vi-preloader.js"></script>
    
    <section class="afisha-card" style="background-image: url(admin/img/posts/<?=$post['img']?>);">
        <div class="blur"></div>
        <div class="afisha-card__content">
            <a href="afisha.php" class="to-prev-page">
                <img src="img/arrow-left.png" alt="to-prev-page">
            </a>
            <small>Начало: <?=$post['start'];?></small>
            <h2><?=$post['title'];?></h2>

            <div class="afisha-card__content_text">
            <?=$post['content'];?>
            </div>
            
            <?php
            $sql = "SELECT * FROM postimg WHERE pid='".$pid."' "  ;
            $result = mysqli_query($link, $sql);
            $rows = mysqli_num_rows($result);
            if ($rows >! [1]) {
            ?>
            <div class="view-images">Посмотреть изображения</div>
            <?php
            }
            else {
                echo ' ';
            }
            ?>
        </div>
    </section>

    <section class="images">
        <div class="content">
            <div class="fullsize-image"></div>
            <div class="close-images">&times;</div>
            <?php 
            $pimg = get_postimg($pid);
            ?>
            <?php foreach ($pimg as $pimgs):?>
            <div class="image">
                <div class=loupe></div>
                <img src="admin/img/posts/<?=$pimgs['img']?>" alt="image">
            </div>
            <?php endforeach; ?>
        </div>

        <div class="overlay"></div>
    </section>

    <div class="box-shadow-start"></div>
    <div class="box-shadow-end"></div>

    <?php 
    require_once 'templates/footer.php';
    ?>
</body>
</html>