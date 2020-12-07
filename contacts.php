<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/contacts.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-contacts.js" defer></script>
    <title>Контакты - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>    
    <script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi-contacts.min.css');
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
    require_once 'header.php';
    ?>

    <!-- Intro -->
    <section class="intro">
        <h1>Контактная информация</h1>
    </section>
    
    <!-- Contacts -->
    <section class="contacts">
        <div class="contacts__address">
            <div class="contacts__address-map">
                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A00da47a53f21fd8cd2fbd525476a9580b7989efa1e0fe9ba82a23d687f706365&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
            <div class="contacts__address-text">
                <p>Муниципальное автономное учреждение культуры <b>"Городской парк культуры и отдыха", МАУК "ГПКиО"</b></p><br>
                <p>Адрес: <b>302040 Орловская область, г.Орёл, ул. М. Горького, 36</b></p><br>
                <p>Электронная почта: <b><a href="mailto:secretar@parkorel.ru">secretar@parkorel.ru</a></b></p>
            </div>
        </div>
        <div class="contacts__info">
            <div class="contacts__info-item">
                <h3>Администрация парка</h3>
                <h4>Директор:</h4>
                <p>Чистякова Анна Александровна</p>
                <h5>Телефон секретаря:</h5>
                <a href="tel:+7(4862)598808">+7 (4862) 59-88-08</a>
                <br>
                <h4>Главный бухгалтер:</h4>
                <p>Исаева Зинаида Николаевна</p>
                <h5>Телефон:</h5>
                <a href="tel:+7(4862)598808">+7 (4862) 59-88-08</a>
                <h5>Время работы:</h5>
                <p>9:00 - 18:00</p>
                <h5>Перерыв:</h5>
                <p>13:00 - 14:00</p>
            </div>
            <div class="contacts__info-item">
                <h3>Отдел КДД</h3>
                <h4>Заведующий КДД:</h4>
                <p>Свиридова Татьяна Юрьевна</p>
                <h5>Телефон:</h5>
                <a href="tel:+7(4862)598810">+7 (4862) 59-88-10</a>
                <h5>Время работы:</h5>
                <p>9:00 - 18:00</p>
                <h5>Перерыв:</h5>
                <p>13:00 - 14:00</p>
            </div>
            <div class="contacts__info-item">
                <h3>Отдел "Эксплуатация"</h3>
                <h4>Заведующий "Эксплуатация":</h4>
                <p>Шумская Анжелика Адольфовна</p>
                <h5>Телефон:</h5>
                <a href="tel:+7(4862)598810">+7 (4862) 59-88-10</a>
                <h5>Время работы:</h5>
                <p>08:00 - 17:00</p>
                <h5>Перерыв:</h5>
                <p>13:00 - 14:00</p>
            </div>
        </div>
    </section>

    <?php 
    require_once 'footer.php';
    ?>
</body>
</html>