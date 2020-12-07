<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimal-ui">
    <!-- Preloader -->
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/main.min.css">
    <link rel="stylesheet" href="styles/css/afisha.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <!-- Scripts -->
    <script src="scripts/realtime.js" defer></script>
    <script src="scripts/script.js" defer></script>
    <script src="scripts/main.js" defer></script>
    <script src="scripts/vi/vi-main.js" defer></script>
    <title>Главная - Городской парк куьтуры и отдыха г. Орла Поиск: <?php echo $_GET['search']; ?></title>
</head>
<body>
<script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi-main.min.css');
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
    <?php 
    ini_set('error_reporting', E_ALL);
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    require_once 'header.php';
    ?>
    <!DOCTYPE html>
<html>
<head>
<p></p>
<p></p>
<p></p>
<p></p>
<p></p>

</head>
<body>
<?php
$search_get = $_GET['search'];
$sql = "SELECT * FROM posts WHERE title LIKE '%$search_get%' OR content LIKE '%$search_get%'";
$select = mysqli_query($link, $sql);
while ($select_while = mysqli_fetch_assoc($select)) {
	?>
	<section class="afisha">
        <div class="afisha__item">
            <div class="afisha__item-img"><a href="afisha-card.php?post_id=<?=$select_while['id'];?>"><img src="admin/img/posts/<?=$select_while['img']?>" alt=""></a></div>
            <div class="afisha__item-text">
                <h2 class="title"><a href="afisha-card.php?post_id=<?=$select_while['id'];?>"><?=$select_while['title'];?></a></h2>
                <p class="description"><?=$select_while['content'];?></p>
                <a href="afisha-card.php?post_id=<?=$select_while['id'];?>" class="more">Читать далее ></a>
                <small class="date">Начало: <?=$select_while['start'];?></small>
            </div>
        </div>
    </section>
    <?php
}
?>
<?php 
    require_once 'footer.php';
    ?>
</body>
</html>

</body>
</html>