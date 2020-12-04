<!DOCTYPE html>
<html lang="ru">
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
    <title>Акарицидная обработка - Городской парк куьтуры и отдыха г. Орла</title>
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
    
    <div class="cssload-container">
        <div class="cssload-whirlpool"></div>
    </div>
    <script src="scripts/vi/vi-preloader.js"></script>
    
    <?php 
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    require_once 'header.php';
    $post_id = $_GET['post_id'];
    if (!is_numeric($post_id)) exit();
    $post = get_post_by_id($post_id);
    ?>
    
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

            <!-- Если есть изображения -->
            <!-- <img src="img/main/intro1.jpg" alt=""> -->
        </div>
    </section>

    <?php 
    require_once 'footer.php';
    ?>
</body>
</html>