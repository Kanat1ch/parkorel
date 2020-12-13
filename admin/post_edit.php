<!DOCTYPE html>
<html lang="en">
<?php
include("../core/database.php");
include("../core/functions.php");
session_start();
$pid = $_GET['post_id'];
$ssql ="select * from posts where posts.id='$_GET[post_id]'";
$res=mysqli_query($link, $ssql); 
$row=mysqli_fetch_array($res);
if(isset($_POST['submit'])) {
    $fname = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $fsize = $_FILES['file']['size'];
    $extension = explode('.',$fname);
    $extension = strtolower(end($extension));  
    $fnew = uniqid().'.'.$extension;
    $store = "img/posts/".basename($fnew);                  
    if($extension == 'jpg'||$extension == 'png'||$extension == 'gif') {        
        if ($fsize>=1000000) {
            $error = 	'<div class="modal error">
                            Максимальный размер изображения 1 Mb!
                        </div>';
        } else {
            $sql = "update posts set title ='$_POST[p_title]', scontent ='$_POST[p_scontent]', content ='$_POST[p_content]', start ='$_POST[p_start]', img='$fnew' where id='$_GET[post_id]'";
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
    header("location:post_edit.php?post_id=$pid");
}
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/css/post_add.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="scripts/script.js" defer></script>
    <script src="scripts/modal.js" defer></script>
    <script src="https://cdn.tiny.cloud/1/cvj5zmyfd449sew2ai4nu7zewycidaain44nb5fnqbcf81pv/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="scripts/textarea-editor.js" defer></script>
    
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
        <div class="navbar__item active">
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
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/requests.png" alt="requests-icon"></div>
            <a href="requests.php">Заявки</a>
        </div>
        <a href="index.php" class="logout">Выход</a>

    </nav>
                                                        
    <div class="container">
        <div class="wrapper">
            <form class="form" action='' method='post' enctype="multipart/form-data">
                <div class="form__item short-form">
                    <label for="title">Заголовок</label>
                    <input type="text" name="p_title" id="title" value="<?=$row['title']?>">
                </div>
                <div class="form__item short-form">
                    <label for="start">Начало</label>
                    <input type="text" name="p_start" id="start" value="<?=$row['start']?>">
                </div>
                <div class="form__item">
                    <label for="short-content">Краткое описание <small style="color: #777;">(Максимум 200 символов)</small></label>
                    <input type="text" name="p_scontent" id="short-content" maxlength="200" value="<?=$row['scontent']?>">
                </div>
                <div class="form__item">
                    <label for="content">Описание</label>
                    <textarea name="p_content" id="content"><?=$row['content']?></textarea>
                </div>
                <div class="form__item">
                    <label for="background">Фоновое изображение</label>
                    <input type="file" name="file" id="background"></input>
                </div>
                <div class="form__item submit">
                    <input type="submit" name="submit" id="submit" value="Сохранить"></input>
                </div>
            </form>
            <?php
            echo $_SESSION['error'];
            echo $_SESSION['success'];
            ?>
        </div>  
    </div>
</body>
</html>