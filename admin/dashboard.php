<!DOCTYPE html>
<html lang="en">
<?php
include("../core/database.php");
error_reporting(0);
session_start();
if(empty($_SESSION["adm_id"]))
{
	header('location:index.php');
}
else
{
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/css/dashboard.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="scripts/script.js" defer></script>
    <title>Главная | Администратор ГПКиО</title>
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
        <div class="navbar__item active">
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
        <div class="navbar__item">
            <div class="icon"><img src="img/icons/requests.png" alt="requests-icon"></div>
            <a href="requests.php">Заявки</a>
        </div>
        <a href="index.php" class="logout">Выход</a>

    </nav>

    <div class="container">
        <div class="wrapper">
            <div class="charts swiper-container">
                <div class="swiper-wrapper">
                    <div class="charts__item users-per-month swiper-slide">
                        <div class="heading">
                            <p class="heading-count"></p>
                            <p class="heading-title">Количество посещений за месяц</p>
                        </div>
                        <div class="chart">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                    <div class="charts__item users-per-day swiper-slide">
                        <div class="heading">
                            <p class="heading-count"></p>
                            <p class="heading-title">Количество посещений за день</p>
                        </div>
                        <div class="chart">
                            <canvas id="myChart1"></canvas>
                        </div>
                    </div>
                    <div class="charts__item users-age swiper-slide">
                        <div class="heading">
                            <div class="heading-title">Целевая аудитория</div>
                        </div>
                        <div class="chart">
                            <canvas id="myChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-button-next"></div>

            <div class="dashboard">
                <div class="dashboard__item">
                    <strong class="counter">
                    <?php $sql="select * from posts";
                    $result=mysqli_query($link,$sql); 
                    $rws=mysqli_num_rows($result);
                    echo $rws;?>
                    </strong>
                    <p class="title">Афиши</p>
                </div>
                <div class="dashboard__item">
                    <strong class="counter">
                    <?php $sql="select * from attr";
                    $result=mysqli_query($link,$sql); 
                    $rws=mysqli_num_rows($result);
                    echo $rws;?>
                    </strong>
                    <p class="title">Аттракционы</p>
                </div>
                <div class="dashboard__item">
                    <strong class="counter">
                    <?php $sql="select * from clubs";
                    $result=mysqli_query($link,$sql); 
                    $rws=mysqli_num_rows($result);
                    echo $rws;?>
                    </strong>
                    <p class="title">Клубы</p>
                </div>
                <div class="dashboard__item">
                    <strong class="counter">
                    <?php $sql="select * from partners";
                    $result=mysqli_query($link,$sql); 
                    $rws=mysqli_num_rows($result);
                    echo $rws;?>
                    </strong>
                    <p class="title">Партнеры</p>
                </div>
                <div class="dashboard__item">
                    <strong class="counter">
                    <?php $sql="select * from services";
                    $result=mysqli_query($link,$sql); 
                    $rws=mysqli_num_rows($result);
                    echo $rws;?>
                    </strong>
                    <p class="title">Услуги</p>
                </div>
                <div class="dashboard__item">
                    <strong class="counter">
                    <?php $sql="select * from requests";
                    $result=mysqli_query($link,$sql); 
                    $rws=mysqli_num_rows($result);
                    echo $rws;?>
                    </strong>
                    <p class="title">Заявки</p>
                </div>
            </div>
        </div>  
    </div>


    <script>
    // Metrics
fetch('https://api-metrika.yandex.net/stat/v1/data/bytime?metrics=ym:s:users&date1=30daysAgo&date2=today&group=day&id=69762088')
    .then(function (resp) { return resp.json(); })
    .then(function (data) {
        const metrics = data.data[0].metrics[0];
        let sum = 0;
        metrics.forEach(item => {
            sum += item;
        });
        document.querySelector('.users-per-month .heading-count').textContent = sum;

        const dates = data.time_intervals;
        let dataArr = [];
        let labelArr = [];
        dates.forEach((item, index) => {
            const year = `${item}`.split('-')[0];
            const month = `${item}`.split('-')[1];
            const day = `${item}`.split('-')[2].split(',')[0];

            labelArr.push(`${day}.${month}`);
            dataArr.push(`${metrics[index]}`);
        });

        var ctx = document.getElementById('myChart').getContext('2d');

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                datasets: [{
                    data: dataArr,
                    label: 'Количество посещений в день',
                    backgroundColor: 'rgba(0, 255, 0, 0.25)',
                    borderColor: 'rgba(0, 170, 0, 0.8)',
                    borderWidth: 2,
                    pointHitRadius: 30,
                    pointRadius: 2,
                    pointHoverRadius: 3
                }],
                labels: labelArr,
            },
            options: {
                animation: {
                    duration: 3000,
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            stepSize: 1,
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                }
            }
        });
    })
    .catch(function () {
        console.error('error');
    });

fetch('https://api-metrika.yandex.net/stat/v1/data/bytime?metrics=ym:s:users&date1=today&date2=today&group=hours&id=69762088')
    .then(function (resp) { return resp.json(); })
    .then(function (data) {
        const metrics = data.data[0].metrics[0];
        let sum = 0;
        metrics.forEach(item => {
            sum += item;
        });

        document.querySelector('.users-per-day .heading-count').textContent = sum;

        const dates = data.time_intervals;
        let dataArr = [];
        let labelArr = [];
        dates.forEach((item, index) => {
            const time = `${item}`.split(' ')[1].split(',')[0].substr(0, 5);

            labelArr.push(`${time}`);
            dataArr.push(`${metrics[index]}`);
        });

        var ctx = document.getElementById('myChart1').getContext('2d');

        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                datasets: [{
                    data: dataArr,
                    label: 'Количество посещений в день',
                    backgroundColor: 'rgba(0, 255, 0, 0.25)',
                    borderColor: 'rgba(0, 170, 0, 0.8)',
                    borderWidth: 2,
                    pointHitRadius: 30,
                    pointRadius: 2,
                    pointHoverRadius: 3
                }],
                labels: labelArr,
            },
            options: {
                animation: {
                    duration: 3000,
                },
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            display: false
                        },
                        ticks: {
                            stepSize: 1,
                            beginAtZero: true
                        }
                    }],
                    xAxes: [{
                        gridLines: {
                            display: false
                        }
                    }]
                }
            }
        });
    })
    .catch(function () {
        console.error('error');
    });

fetch('https://api-metrika.yandex.net/stat/v1/data?metrics=ym:s:under18AgePercentage&metrics=ym:s:upTo24AgePercentage&metrics=ym:s:upTo34AgePercentage&metrics=ym:s:upTo44AgePercentage&metrics=ym:s:upTo54AgePercentage&metrics=ym:s:over54AgePercentage&id=69762088')
    .then(function (resp) { return resp.json(); })
    .then(function (data) {
        const metrics = data.data[0].metrics;

        const under18 = metrics[0];
        const upTo24 = metrics[1];
        const upTo34 = metrics[2];
        const upTo44 = metrics[3];
        const upTo54 = metrics[4];
        const over54 = metrics[5];

        var ctx = document.getElementById('myChart2').getContext('2d');

        let legendDisplay = true;
        if (document.documentElement.clientWidth <= 365) {
            legendDisplay = false;
        }

        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                datasets: [{
                    data: [under18, upTo24, upTo34, upTo44, upTo54, over54],
                    backgroundColor: ['#E74C3C', '#7D3C98', '#F4D03F', '#228855', '#6666ff', '#F39C12'],
                }],
                labels: ['До 18 лет', 'От 18 до 24 лет', 'От 25 до 34 лет', 'От 35 до 44 лет', 'От 45 до 54 лет', 'Старше 54 лет']
            },
            options: {
                animation: {
                    duration: 2000,
                },
                legend: {
                    display: legendDisplay,
                    position: 'right',
                    align: 'start'
                }
            }
        });

    })
    .catch(function () {
        console.error('error');
    });


    // Slider
    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 20,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
      992: {
        slidesPerView: 2
      }
    },
    });
    </script>
</body>
</html>
<?php
}
?>