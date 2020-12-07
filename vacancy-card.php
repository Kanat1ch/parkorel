<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Styles -->
    <link rel="stylesheet" href="styles/css/vacancy-card.min.css">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- FontAwesome -->
    <script src="https://use.fontawesome.com/4f5cd90764.js"></script>
    <!-- Scripts -->
    <script src="scripts/script.js" defer></script>
    <script src="scripts/vi/vi-vacancy-card.js" defer></script>
    <title>Подсобный рабочий - Городской парк куьтуры и отдыха г. Орла</title>
</head>
<body>
    <script>
        if ((localStorage.getItem('vi')) == 'true') {
            const visImpStyles = document.createElement('link');
            visImpStyles.setAttribute('rel', 'stylesheet');
            visImpStyles.setAttribute('href', 'styles/css/vi-vacancy-card.min.css');
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
    $vacancy_id = $_GET['vacancy_id'];
    if (!is_numeric($vacancy_id)) exit();
    $vacancy = get_vacancy_by_id($vacancy_id);
    ?>
    
    <section class="vacancy-card" style="background-image: url(admin/img/vacancy/<?=$vacancy['img']?>);">
        <div class="blur"></div>
        <div class="vacancy-card__content">
            <a href="vacancy.php" class="to-prev-page">
                <img src="img/arrow-left.png" alt="to-prev-page">
            </a>
            <h2><?=$vacancy['title']?></h2>

            <div class="salary">
                <p>Заработная плата: <span><?=$vacancy['price']?> руб.</span></p>
            </div>

            <div class="requirements">
                <h4>Требования:</h4>
                <ul>
                    <li><?=$vacancy['claim']?></li>
                </ul>
            </div>

            <div class="duties">
                <h4>Обязанности:</h4>
                <ul>
                    <li><?=$vacancy['abligation']?></li>
                </ul>
            </div>

            <button class="send-request" id="sendRequest">Оставить заявку</button>
        </div>
    </section>
        <?php 
        $title = $vacancy['title'];
        if(isset($_POST['submit']))   
        {
        $sql = "INSERT INTO requests(vacancy, surname, name, patronymic, phone) VALUE('".$title."','".$_POST['v_surname']."','".$_POST['v_name']."','".$_POST['v_patronymic']."','".$_POST['v_phone']."')";
            mysqli_query($link, $sql); 
        }
        ?>
    <div class="request-form">
        <h3>Заявка на должность "<span></span>"</h3>
        <form action="" method='post'>
            <div class="form-item">
                <label for="surname">Фамилия</label>
                <input type="text" id="surname" name="v_surname" required>
            </div>
            <div class="form-item">
                <label for="name">Имя</label>
                <input type="text" id="name" name="v_name" required>
            </div>
            <div class="form-item">
                <label for="middle-name">Отчество</label>
                <input type="text" id="middle-name" name="v_patronymic" required>
            </div>
            <div class="form-item">
                <label for="phone">Контактный телефон</label>
                <input type="text" id="phone" name="v_phone" required>
            </div>
            <div class="form-item personal">
                <input type="checkbox" id="personalData" name="personalData" required>
                <label for="personalData">Даю согласие на обработку персональных данных</label>
            </div>
            <div class="form-item">
            <input type="submit" name="submit" class="btn btn-success" value="Отправить">
            </div>
            <div class="close-modal">
                &times;
            </div>
        </form>
    </div>
    <div class="overlay"></div>

    <?php 
    require_once 'footer.php';
    ?>

    <script src="https://unpkg.com/imask"></script>
    <script>
        const sendRequestBtn = document.querySelector('.send-request');
        const modal = document.querySelector('.request-form');
        const overlay = document.querySelector('.overlay');
        const closeModalBtn = document.querySelector('.close-modal');
        const form = document.querySelector('form');
        const formItems = document.querySelectorAll('.form-item');
        const vacancyName = document.querySelector('.vacancy-card__content h2').textContent;
        document.querySelector('.request-form h3 span').textContent = vacancyName;

        sendRequestBtn.addEventListener('click', () => {
            document.body.style.overflow = 'hidden';
            modal.style.display = 'block';
            overlay.style.display = 'block';

            formItems.forEach(item => {
                item.querySelector('label').style.transform = '';
                item.querySelector('label').style.color = '';
                item.querySelector('input').style.borderColor = '';
            });
        });

        closeModalBtn.addEventListener('click', closeModal);
        overlay.addEventListener('click', closeModal);
        document.body.addEventListener('keydown', e => {
            if (e.key === 'Escape') {
                modal.style.display = 'none';
                overlay.style.display = 'none';
                document.body.style.overflowY = '';
            }
        });

        function closeModal() {
            modal.style.display = '';
            overlay.style.display = '';
            document.body.style.overflow = '';
            form.reset();
        }

        formItems.forEach(item => {
            item.addEventListener('focusin', () => {
                item.querySelector('label').style.transform = 'translateX(0)';
                item.querySelector('label').style.color = '#fff';
                item.querySelector('input').style.borderColor = 'rgb(42, 209, 40)';
            });

            item.addEventListener('focusout', () => {
                if (!item.querySelector('input').value) {
                    item.querySelector('label').style.transform = '';
                    item.querySelector('label').style.color = '';
                    item.querySelector('input').style.borderColor = '';
                }
            });
        });

        var element = document.getElementById('v_phone');
        var maskOptions = {
        mask: '+{7} (000) 000-00-00'
        };
        var mask = IMask(element, maskOptions);
    </script>
</body>
</html>