<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/clubs.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-clubs.js" defer></script>
    <title>Клубные формирования - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>    
    <script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi-clubs.min.css');
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
        <h1>Клубные формирования</h1>
    </section>
    
    <!-- clubs -->
    <section class="info">
        <div class="clubs__info">
            <p>На базе МАУК «ГПКиО» создано несколько клубных объединений, проводящих насыщенную репетиционную, культурно-досуговую и концертную деятельность в Городском парке и за его пределами. Каждый сможет подобрать себе клуб по интересам, вкусу, возрасту.</p>
        </div>
    </section>
    <section class="clubs">
    <?php $clubs = get_clubs();?>
            <?php foreach ($clubs as $club):?>
        <a href="clubs-card.php?club_id=<?=$club['id'];?>" class="clubs__item">
            <div class="clubs__item-img"><img src="admin/img/clubs/<?=$club['img']?>" alt=""></div>
            <div class="clubs__item-title">
            <?=$club['title'];?>
            </div>
        </a>
        <?php endforeach; ?>
    </section>

    <?php 
    require_once 'templates/footer.php';
    ?>
</body>
</html>