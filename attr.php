<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/attr.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-attr.js" defer></script>
    <title>Аттракционы - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>
    <script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi-attr.min.css');
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
        <h1>Аттракционы</h1>
    </section>
    
    <!-- Attr -->
    <section class="info">
        <div class="attr__info">
            <div class="attr__info-item">
                <div class="attr__info-item_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                <div class="attr__info-item_text">12:00 - 20:00<br>Без выходных</div>
            </div>
            <div class="attr__info-item">
                <div class="attr__info-item_icon"><i class="fa fa-cloud" aria-hidden="true"></i></div>
                <div class="attr__info-item_text">При неблагоприятных метеорологических<br>условиях аттрационы не работают</div>     
            </div>
            <div class="attr__info-item">
                <div class="attr__info-item_icon"><i class="fa fa-credit-card" aria-hidden="true"></i></div>
                <div class="attr__info-item_text">Наличная и безналичная<br>оплата</div>
            </div>
        </div>
    </section>
    <section class="attr">
        <?php $attrs = get_attrs();?>
            <?php foreach ($attrs as $attr):?>
        <a href="attr-card.php?attr_id=<?=$attr['id'];?>" class="attr__item">
            <div class="attr__item-img"><img src="admin/img/attr/<?=$attr['img']?>" alt=""></div>
            <div class="attr__item-title">
                <?=$attr['title'];?>
            </div>
        </a>
        <?php endforeach; ?>
    </section>

    <?php 
    require_once 'templates/footer.php';
    ?>
</body>
</html>