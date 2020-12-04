<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="../styles/css/attr-card.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-attr-card.js" defer></script>
    <title>Вихрь - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>
    <?php 
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    include("../app/database.php");
    include("../app/functions.php");
    $attr_id = $_GET['attr_id'];
    if (!is_numeric($attr_id)) exit();
    $attr = get_attr_by_id($attr_id);
    ?>
    <section class="fullattr" style="background-image: url(admin/img/attr/<?=$attr['img']?>);">
        <div class="blur"></div>
        <div class="fullattr__content">
            <a href="allattr.php" class="to-prev-page">
                <img src="../img/arrow-left.png" alt="to-prev-page">
            </a>
            <h2><?=$attr['title']?></h2>

            <div class="adult-ticket">
                <p>Взрослый билет: <span><?=$attr['adult']?></span></p>
            </div>
            <div class="child-ticket">
                <p>Детский билет: <span><?=$attr['child']?></span></p>
            </div>
            <div class="time">
                <p>Время катания: <span><?=$attr['time']?></span></p>
            </div>
            <div class="seats-count">
                <p>Количество мест: <span><?=$attr['places']?></span></p>
            </div>
            <div class="age-limit">
                <p>Возрастное ограничение: <span>от <?=$attr['age']?> лет*</span></p>
                <small>* Дети до <?=$attr['age']?> лет только в сопровождении взрослого</small>
            </div>


            <div class="forbid">
                <h4>Запрещается:</h4>
                <?=$attr['ban']?>
            </div>

            <div class="respons">
                <h4>Посетитель обязан:</h4>
                <?=$attr['obligation']?>
            </div>
        </div>
    </section>
    <a href="attr_update.php">Изменить</a>
    </body>
</html>