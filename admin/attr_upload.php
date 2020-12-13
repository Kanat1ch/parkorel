<!DOCTYPE html>
<html lang="en">
<?php
include("../core/database.php");
include("../core/functions.php");
session_start();
$aid = $_GET['attr_id'];
$_SESSION['ai']=$aid;
$attr_id = $_GET['attr_id'];
$row = get_attr_by_id($attr_id);
if(isset($_POST['submit'])) {
    $fname = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $fsize = $_FILES['file']['size'];
    $extension = explode('.',$fname);
    $extension = strtolower(end($extension));  
    $fnew = uniqid().'.'.$extension;
    $store = "img/attr/".basename($fnew);                  
    if($extension == 'jpg'||$extension == 'png'||$extension == 'gif') {        
        if ($fsize>=1000000) {
            $error = 	'<div class="modal error">
                            Максимальный размер изображения 1 Mb!
                        </div>';
        } else {
            $sql = "INSERT INTO attrimg(aid, img) VALUE('".$aid."','".$fnew."')";
            mysqli_query($link, $sql); 
            move_uploaded_file($temp, $store);
            $success = 	'<div class="modal success">
                            Запись успешно изменена!
                        </div>';
        }
    } elseif ($extension == '') {
        $error = 	'<div class="modal error">
                        Необходимо выбрать изображение!
                    </div>';
    } else {
        $error = 	'<div class="modal error">
                        Допустимые форматы изображения: PNG, JPEG, GIF!
                    </div>';
    }
    $_SESSION['error'] = $error;
    $_SESSION['success'] = $success;
    header("location:attr_upload.php?attr_id=$aid");
}

?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/css/post_upload.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="scripts/script.js" defer></script>
    <script src="scripts/modal.js" defer></script>
    <script src="scripts/fullsize-image.js" defer></script>
    <title><?=$row['title']?> | Администратор ГПКиО</title>
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
        <div class="page-title">Главная</div>
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
        <div class="navbar__item active">
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
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/requests.png" alt="requests-icon"></div>
            <a href="requests.php">Заявки</a>
        </div>
        <a href="index.php" class="logout">Выход</a>

    </nav>
                                                        
    <div class="container">
        <div class="wrapper">
            <div class="fullsize-image"></div>
            <form class="form" action='' method='post' enctype="multipart/form-data">
                <h2>Редактирование изображений афиши "<?=$row['title']?>"</h2>
                <div class="form__item">
                    <label for="background">Добавить изображение</label>
                    <input type="file" name="file" id="background"></input>
                </div>
                <div class="form__item submit">
                    <input type="submit" name="submit" id="submit" value="Добавить"></input>
                </div>
                <?php 
        $aimg = get_attrimg($aid);
        ?>
                <div class="image-container">
                    <?php foreach ($aimg as $aimgs):?>
                        <div class="image-item">
                            <img src="img/attr/<?=$aimgs['img']?>" alt="image">
                            <div class="loupe"></div>
                            <a href="attrimg_del.php?del_attrimg=<?=$aimgs['id'];?>">Удалить</a>
                        </div>
                    <?php endforeach; ?>
                </div>
            </form>
            <?php
            echo $_SESSION['error'];
            echo $_SESSION['success'];
            ?>
        </div>  
    </div>
    <div class="overlay"></div>
</body>
</html>