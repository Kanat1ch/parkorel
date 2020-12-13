<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/docs.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-docs.js" defer></script>
    <title>Публичные документы - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>  
    <script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi.min.css');
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
        <h1>Публичные документы</h1>
    </section>

    <section class="docs">
            <?php $docs = get_docs();?>
            <?php foreach ($docs as $doc):?>
        <a href="admin/docs/<?=$doc['link']?>"><?=$doc['title']?></a>
        <?php endforeach; ?>
    </section>

    <?php 
    require_once 'templates/footer.php';
    ?>
</body>
</html>