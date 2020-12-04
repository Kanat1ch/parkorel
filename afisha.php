<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/afisha.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-afisha.js" defer></script>

    <title>Афиша - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>
    <script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi-afisha.min.css');
            document.querySelector('head').append(visImpStyles);

            if ((localStorage.getItem('viDarkTheme')) == 'true') {
                document.body.style.backgroundColor = '#111';
                document.body.classList.add('vi-dark');
            } else {
                document.body.style.backgroundColor = '';
                document.body.classList.remove('vi-dark');
            }
        }
    </script>

    <div class="cssload-container">
        <div class="cssload-whirlpool"></div>
    </div>
    <script src="scripts/vi/vi-preloader.js"></script>
     <!-- Header -->
     <?php 
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    require_once 'header.php';
    ?>
    
    <!-- Intro -->
    <section class="intro">
        <h1>Афиша мероприятий</h1>
    </section>

    <section class="afisha">
    <?php $posts = get_posts();?>
            <?php foreach ($posts as $post):?>
        <div class="afisha__item">
            <div class="afisha__item-img"><a href="afisha-card.php?post_id=<?=$post['id'];?>"><img src="admin/img/posts/<?=$post['img']?>" alt=""></a></div>
            <div class="afisha__item-text">
                <h2 class="title"><a href="afisha-card.php?post_id=<?=$post['id'];?>"><?=$post['title'];?></a></h2>
                <p class="description"><?=$post['content'];?></p>
                <a href="afisha-card.php?post_id=<?=$post['id'];?>" class="more">Читать далее ></a>
                <small class="date">Начало: <?=$post['start'];?></small>
            </div>
        </div>
        <?php endforeach; ?>
    </section>

    <?php 
    require_once 'footer.php';
    ?>
</body>
</html>