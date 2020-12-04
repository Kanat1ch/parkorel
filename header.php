<?php 
include_once 'app/database.php';
include_once 'app/functions.php';
?>

<!-- Header -->
<header class="header">
        <!-- MOBILE -->
        <!-- Menu button -->
        <div class="menu-btn">
            <div class="line"></div>
        </div>
        <!-- Mobile Menu Content -->
        <div class="mobile-menu">
            <div class="menu-overlay">
                <div class="search">
                    <input type="text" placeholder="Я ищу...">
                    <button><i class="fa fa-search" aria-hidden="true"></i></button>
                </div>
            </div>
    
            <ul>
                <li><a href="index.php">Главная</a></li>
                <li><a href="afisha.php">Афиша</a></li>
                <li><a href="attr.php">Аттракционы</a></li>
                <li><a href="clubs.php">Клубы</a></li>
                <li><a href="history.php">История парка</a></li>
                <li><a href="partners.php">Партнеры</a></li>
                <li><a href="services.php">Услуги</a></li>
                <li><a href="docs.php">Документы</a></li>
                <li><a href="contacts.php">Контакты</a></li>
                <li><a href="vacancy.php">Вакансии</a></li>
                <li><a class="vis-imp-btn">Версия для слабовидящих</a></li>
            </ul>
        </div>
    
        <!-- DESKTOP -->
        <!-- Logo -->
        <div class="header__logo">
            <a href="index.php">
    
            </a>
        </div>
    
        <!-- Navigation -->
        <div class="header__navmenu">
            <ul>
                <li><a href="afisha.php">Афиша</a></li>
                <li><a href="attr.php">Аттракционы</a></li>
                <li><a href="clubs.php">Клубы</a></li>
                <li><a href="history.php">История парка</a></li>
                <li><a href="partners.php">Партнеры</a></li>
                <li><a href="#">О нас<span>&#8250;</span></a>
                    <ul>
                        <li><a href="contacts.php">Контакты</a></li>
                        <li><a href="services.php">Услуги</a></li>
                        <li><a href="docs.php">Документы</a></li>
                        <li><a href="vacancy.php">Вакансии</a></li>
                    </ul>
                </li>
                <div class="search">
                        <button class="search-btn"><i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                        <input type="text" placeholder="Я ищу...">
                </div>
            </ul>
        </div>
    
        <!-- Info -->
        <div class="header__info">
            <a href="tel:+7(4862)598808"><i class="fa fa-phone" aria-hidden="true"></i>+7 (4862) 59-88-08</a>
            <p><i class="fa fa-map-marker" aria-hidden="true"></i>
                ул. М. Горького, 36</p>
        </div>
        <button class="vis-imp-btn" title="Версия для слабовидящих"><i class="fa fa-eye" aria-hidden="true"></i></button>
    </header>

    <!-- Visually impaired -->
    <section class="vi-panel">
        <div class="vi-panel__item">
            <span>Размер шрифта:</span>
            <button class="vi-btn" id="fontPlus">+</button>
            <button class="vi-btn" id="fontMinus">-</button>
        </div>
        <div class="vi-panel__item">
            <span>Интервал:</span>
            <button class="vi-btn" id="spacingPlus">+</button>
            <button class="vi-btn" id="spacingMinus">-</button>
        </div>
        <div class="vi-panel__item">
            <span>Фон:</span>
            <button class="vi-btn" id="bgWhite">А</button>
            <button class="vi-btn" id="bgBlack">Б</button>
        </div>

        <div class="vi-panel__item">
            <span>Обычная версия:</span>
            <button class="vi-default" id="defaultVersion"><i class="fa fa-eye-slash" aria-hidden="true"></i></button>
        </div>
    </section>

    <section class="header-vi">
        <ul>
            <li><a href="index.php">Главная</a></li>
            <li><a href="afisha.php">Афиша</a></li>
            <li><a href="attr.php">Аттракционы</a></li>
            <li><a href="clubs.php">Клубы</a></li>
            <li><a href="history.php">История парка</a></li>
            <li><a href="partners.php">Партнеры</a></li>
            <li><a href="services.php">Услуги</a></li>
            <li><a href="docs.php">Документы</a></li>
            <li><a href="contacts.php">Контакты</a></li>
            <li><a href="vacancy.php">Вакансии</a></li>
        </ul>
    </section>