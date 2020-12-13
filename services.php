<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/services.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-services.js" defer></script>
    <title>Услуги - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>    
    <script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi-services.min.css');
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

    <?php 
    require_once 'templates/header.php';
    ?>
    
    <!-- Intro -->
    <section class="intro">
        <h1>Услуги</h1>
    </section>

    <section class="services">  <!-- Нужно переписать -->
    <?php $services = get_services();?>
            <?php foreach ($services as $service):?>
        <a href="tel:<?=$service['phone'];?>" class="services__item" style="background-image: url(admin/img/services/<?=$service['img']?>);">
            <div class="services__item-title">
                <p><?=$service['title'];?></p>
            </div>

            <ul>
                <li><?=$service['title'];?></li>
            </ul>
        </a>
        <?php endforeach; ?>
    </section>

    <?php 
    require_once 'templates/footer.php';
    ?>
</body>
</html>