<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="../styles/css/vacancy-card.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <title>Подсобный рабочий - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>

    <div class="cssload-container">
        <div class="cssload-whirlpool"></div>
    </div>
    <script src="scripts/vi/vi-preloader.js"></script>

    <?php 
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    include("../app/database.php");
    include("../app/functions.php");
    $vacancy_id = $_GET['vacancy_id'];
    if (!is_numeric($vacancy_id)) exit();
    $vacancy = get_vacancy_by_id($vacancy_id);
    ?>
    
    <section class="vacancy-card" style="background-image: url(img/vacancy/<?=$vacancy['img']?>);">
        <div class="blur"></div>
        <div class="vacancy-card__content">
            <a href="vacancyall.php" class="to-prev-page">
                <img src="../img/arrow-left.png" alt="to-prev-page">
            </a>
            <h2><?=$vacancy['title']?></h2>

            <div class="salary">
                <p>Заработная плата: <span><?=$vacancy['price']?> руб.</span></p>
            </div>

            <div class="requirements">
                <h4>Требования:</h4>
                <ul>
                    <li><?=$vacancy['claim']?></li>
                </ul>
            </div>

            <div class="duties">
                <h4>Обязанности:</h4>
                <ul>
                    <li><?=$vacancy['abligation']?></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="overlay"></div>
</body>
</html>