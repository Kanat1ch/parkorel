<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/clubs-card.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-clubs-card.js" defer></script>
    <title>"Империя" - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>    
    <script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi-clubs-card.min.css');
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
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    require_once 'header.php';
    $club_id = $_GET['club_id'];
    if (!is_numeric($club_id)) exit();
    $club = get_club_by_id($club_id);
    ?>
    
    <section class="clubs-card" style="background-image: url(admin/img/clubs/<?=$club['img']?>);">
        <div class="blur"></div>
        <div class="clubs-card__content">
            <a href="clubs.php" class="to-prev-page">
                <img src="img/arrow-left.png" alt="to-prev-page">
            </a>
            <h2><?=$club['title']?></h2>

            <div class="chief">
                <p>Руководитель: <span><?=$club['director']?></span></p>
            </div>
            <div class="contact-tel">
                <p>Контактный телефон: <span><a href="tel:<?=$club['phone']?>"><?=$club['phone']?></a></span></p>
            </div>
            <div class="clubs-card__content_text">
                <p><?=$club['content']?></p>
            </div>
        </div>
    </section>

    <?php 
    require_once 'footer.php';
    ?>
</body>
</html>