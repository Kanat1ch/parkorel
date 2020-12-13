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
    <title>Заявки | Администратор ГПКиО</title>
    <link rel="stylesheet" href="styles/css/requests.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
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
        <div class="page-title">Заявки</div>
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
        <div class="navbar__item">
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
        <div class="navbar__item active">
            <div class="icon"><img src="img/icons/requests.png" alt="requests-icon"></div>
            <a href="requests.php">Заявки</a>
        </div>
        <a href="index.php" class="logout">Выход</a>

    </nav>

    <div class="container">
        <div class="wrapper">
            <ul class="responsive-table">
                <a href="#" class="delete-all">Удалить все заявки</a>
                <li class="table-header">
                    <div class="col col-1">Вакансия</div>
                    <div class="col col-2">Фамилия</div>
                    <div class="col col-3">Имя</div>
                    <div class="col col-4">Отчество</div>
                    <div class="col col-5">Телефон</div>
                    <a href="requestall_del.php" class="col col-6" title="Удалить все заявки"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                </li>
                <?php
                    $sql="SELECT * FROM requests order by id desc";
                    $query=mysqli_query($link,$sql);
                    
                    if(!mysqli_num_rows($query) > 0)
                        { echo '<li class="table-row mobile-table-row" style="width: 100%; justify-content: center; font-weight: 600;">Нет заявок</li>'; }
                    else {				
                        while($rows=mysqli_fetch_array($query)) {
                            $mql="select * from requests order by id";
                            $newquery=mysqli_query($link,$mql);
                            $fetch=mysqli_fetch_array($newquery);

                            echo '
                            <li class="table-row">
                                <a href="request_del.php?del_request='.$rows['id'].'" class="delete-vacancy">&#10006;</a>
                                <div class="col col-1" data-label="Вакансия">'.$rows['vacancy'].'</div>
                                <div class="col col-2" data-label="Фамилия">'.$rows['surname'].'</div>
                                <div class="col col-3" data-label="Имя">'.$rows['name'].'</div>
                                <div class="col col-4" data-label="Отчество">'.$rows['patronymic'].'</div>
                                <div class="col col-5" data-label="Телефон"><a href="tel:'.$rows['phone'].'">'.$rows['phone'].'</a></div>
                                <div class="col col-6" data-label="Удаление"><a href="request_del.php?del_request='.$rows['id'].'"><i class="fa fa-trash-o" aria-hidden="true"></i></a></div>
                            </li>
                            ';
                        }	
                    }
                ?>  
            </ul>
        </div>
    </div>
</body>
</html>