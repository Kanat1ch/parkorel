<!DOCTYPE html>
<html lang="en">
<?php
include("../core/database.php");
include("../core/functions.php");
error_reporting(0);
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Партнеры | Администратор ГПКиО</title>
    <link rel="stylesheet" href="styles/css/allposts.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="scripts/script.js" defer></script>
</head>
<body>
    <header class="header">
        <div class="header__logo">
            <img src="../img/logo.png" alt="logo">
            <h1>Администратор</h1>
        </div>
        <div class="menu">
            <div class="line"></div>
        </div>
        <div class="page-title">Партнеры</div>
        <div class="header__authorization">
            <div class="user">
                <div class="image"><img src="../img/logo.png" alt="image"></div>
                <p class="username">admin@parkorel.ru</p>
            </div>
            <a href="index.php" class="logout">Выход</a>
        </div>
    </header>

    <nav class="navbar">
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/home.png" alt="homepage-icon"></div>
            <a href="dashboard.php">Главная</a>
        </div>
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/afisha.png" alt="afisha-icon"></div>
            <a href="posts.php">Афиша</a>
            <a href="post_add.php" class="add-new"><img src="img/icons/plus.png" alt="add-new"></a>
        </div>
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/carousel.png" alt="attr-icon"></div>
            <a href="attrs.php">Аттракционы</a>
            <a href="attr_add.php" class="add-new"><img src="img/icons/plus.png" alt="add-new"></a>
        </div>
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/clubs.png" alt="clubs-icon"></div>
            <a href="clubs.php">Клубы</a>
            <a href="club_add.php" class="add-new"><img src="img/icons/plus.png" alt="add-new"></a>
        </div>
        <div class="navbar__item active">
            <div class="icon"><img src="img/icons/partners.png" alt="partners-icon"></div>
            <a href="partners.php">Партнеры</a>
            <a href="partner_add.php" class="add-new"><img src="img/icons/plus.png" alt="add-new"></a>
        </div>
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/services.png" alt="services-icon"></div>
            <a href="services.php">Услуги</a>
            <a href="service_add.php" class="add-new"><img src="img/icons/plus.png" alt="add-new"></a>
        </div>
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/docs.png" alt="docs-icon"></div>
            <a href="docs.php">Документы</a>
            <a href="doc_add.php" class="add-new"><img src="img/icons/plus.png" alt="add-new"></a>
        </div>
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/vacancy.png" alt="vacancy-icon"></div>
            <a href="vacancies.php">Вакансии</a>
            <a href="vacancy_add.php" class="add-new"><img src="img/icons/plus.png" alt="add-new"></a>
        </div>
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/requests.png" alt="requests-icon"></div>
            <a href="requests.php">Заявки</a>
        </div>
        <a href="index.php" class="logout">Выход</a>

    </nav>

    <div class="container">
        <div class="wrapper">
            <div class="posts">
                <?php $partners = get_partners();?>
                <?php foreach ($partners as $partner):?>
                <div class="posts__item">
                    <div class="image">
                        <img src="img/partners/<?=$partner['img']?>" alt="image">
                    </div>
                    <div class="content">
                        <a href="#"><?=$partner['title']?></a>
                    </div>
                    <div class="options">
                        <img src="img/icons/options.png" alt="options">
                        <div class="click-handler">
                            <div class="options-list">
                                <div class="option delete">
                                    <div class="icon"><img src="img/icons/delete.png" alt="icon"></div>
                                    <a href="partner_del.php?del_partner=<?=$partner['id'];?>">Удалить</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <script>
        const optionBtns = document.querySelectorAll('.options img');
        optionBtns.forEach(item => {
            item.addEventListener('click', openCloseOptions);
        });

        function openCloseOptions(e) {
            if (!e.target.parentElement.classList.contains('active')) {
                document.querySelectorAll('.options').forEach(item => {
                    item.classList.remove('active');
                });
                e.target.parentElement.classList.add('active');
                document.body.addEventListener('click', closeAll);
            } else {
                e.target.parentElement.classList.remove('active');
            }
        }

        function closeAll(e) {
            if (!e.target.closest('.options')) {
                document.querySelectorAll('.options').forEach(item => {
                    item.classList.remove('active');
                });
                document.body.removeEventListener('click', closeAll);
            }
        }
    </script>
</body>
</html>