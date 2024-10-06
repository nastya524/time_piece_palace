<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/assets/styles/app.css">
    <title>TimePiece Palace</title>
</head>
<body>
    <header class="header">
        <div class="header__inner container">
            <div class="header__content">
                <a class="header__logo logo" href="/" >
                    <img class="logo__img"
                         src="public/assets/media/svg/logo.svg"
                         alt="TimePiece Palace"
                         width="202" height="30" loading="lazy"
                    >
                </a>
                <nav class="header__menu">
                    <ul class="header__menu-list">
                        <li class="header__menu-item"><a href="/error-404" class="header__menu-link" title="Перейти к каталогу брендов">Бренды</a></li>
                        <li class="header__menu-item"><a href="/catalog-man" class="header__menu-link" title="Перейти к каталогу мужских часов">Мужские</a></li>
                        <li class="header__menu-item"><a href="/catalog-woman" class="header__menu-link" title="Перейти к каталогу женских часов">Женские</a></li>
                    </ul>
                </nav>
                <ul class="header__icon-menu-list">
                    <?php
                    if(!isset($_SESSION["user"])) {
                    ?>
                        <li class="header__icon-menu-item">
                            <a href="/registration" class="header__icon-menu-link">
                                <span class="visually-hidden">Перейти в корзину</span>
                                <img class="header__icon-menu-img"
                                     src="public/assets/media/svg/cart.svg"
                                     alt="Перейти в корзину"
                                     title="Перейти в корзину"
                                     width="40" height="40" loading="lazy"
                                >
                            </a>
                        </li>
                        <li class="header__icon-menu-item">
                            <a href="/catalog" class="header__icon-menu-link">
                                <span class="visually-hidden">Перейти в каталог</span>
                                <img class="header__icon-menu-img"
                                     src="public/assets/media/svg/catalog.svg"
                                     alt="Перейти в каталог"
                                     title="Перейти в каталог"
                                     width="40" height="40" loading="lazy"
                                >
                            </a>
                        </li>
                        <li class="header__icon-menu-item">
                            <a href="/registration" class="header__icon-menu-link">
                                <span class="visually-hidden">Зарегистрироваться</span>
                                <img class="header__icon-menu-img"
                                     src="public/assets/media/svg/user.svg"
                                     alt="Зарегистрироваться"
                                     title="Зарегистрироваться"
                                     width="40" height="40" loading="lazy"
                                >
                            </a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="header__icon-menu-item">
                            <a href="/cart" class="header__icon-menu-link">
                                <span class="visually-hidden">Перейти в корзину</span>
                                <img class="header__icon-menu-img"
                                     src="public/assets/media/svg/cart.svg"
                                     alt="Перейти в корзину"
                                     title="Перейти в корзину"
                                     width="40" height="40" loading="lazy"
                                >
                            </a>
                        </li>
                        <li class="header__icon-menu-item">
                            <a href="/catalog" class="header__icon-menu-link">
                                <span class="visually-hidden">Перейти в каталог</span>
                                <img class="header__icon-menu-img"
                                     src="public/assets/media/svg/catalog.svg"
                                     alt="Перейти в каталог"
                                     title="Перейти в каталог"
                                     width="40" height="40" loading="lazy"
                                >
                            </a>
                        </li>
                        <li class="header__icon-menu-item">
                            <form action="/profile" method="get" style="margin-bottom: 0;">
                                <button class="header__icon-menu-link header__icon-menu-link--logout" type="submit">
                                    <span class="visually-hidden">Профиль</span>
                                    <img class="header__icon-menu-img"
                                         src="public/assets/media/svg/user.svg"
                                         alt="Профиль"
                                         title="Профиль"
                                         width="40" height="40" loading="lazy"
                                    >
                                </button>
                            </form>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </header>
