<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/vacancy.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-vacancy.js" defer></script>
    <title>Вакансии - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>    
    <script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi-vacancy.min.css');
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
    ?>

    <!-- Intro -->
    <section class="intro">
        <h1>Вакансии</h1>
    </section>
    
    <!-- Vacancy -->
    <section class="vacancy">
        <?php 
        $rows = mysqli_query($link, "SELECT * FROM vacancy");
        $num_rows = mysqli_num_rows( $rows );
        if ($num_rows >! [1]) {
            ?>
            <?php $vacancies = get_vacancies();?>
            <?php foreach ($vacancies as $vacancy):?>
        <a href="vacancy-card.php?vacancy_id=<?=$vacancy['id'];?>" class="vacancy__item">
            <div class="vacancy__item-img"><img src="admin/img/vacancy/<?=$vacancy['img']?>" alt=""></div>
            <div class="vacancy__item-title">
            <?=$vacancy['title']?>
            </div>
        </a>
        <?php endforeach; ?>
    </section>
            <?php
        }
        else {
            echo 'сейчас нет свободных вакансий';
        }?>
    </section>

    <?php 
    require_once 'footer.php';
    ?>
</body>
</html>