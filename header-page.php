<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;600;700&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/swiper-bundle.min.css" />
    <link rel="stylesheet" href="./css/style.css" />
    <title><?= $page_title; ?> - Aliance Production</title>
  </head>
  <body>
    <div class="mobile-menu">
      <ul class="mobile-menu-nav">
        <li class="mobile-menu-nav-item">
          <a href="/about.php" class="mobile-menu-link">О компании</a>
        </li>
        <li class="mobile-menu-nav-item">
          <a href="/contracts.php" class="mobile-menu-link">Контрактное производство</a>
          <ul class="mobile-submenu">
            <li class="mobile-submenu-item">
              <a class="mobile-submenu-link" href="#">Автомобильная химия</a>
            </li>
            <li class="mobile-submenu-item">
              <a class="mobile-submenu-link" href="#">Бытовая химия</a>
            </li>
            <li class="mobile-submenu-item">
              <a class="mobile-submenu-link" href="#">Дезинфицирующие средства</a>
            </li>
          </ul>
        </li>
        <li class="mobile-menu-nav-item">
          <a href="/trademarks.php" class="mobile-menu-link">Собственные торговые марки</a>
        </li>
        <li class="mobile-menu-nav-item">
          <a href="#" class="mobile-menu-link">Новости</a>
        </li>
        <li class="mobile-menu-nav-item">
          <a href="#" class="mobile-menu-link">Контакты</a>
        </li>
      </ul>

      <a href="tel:+74996861014" class="mobile-phone">+7 (499) 686-10-14</a>
      <div class="mobile-info">
        <svg class="phone-icon" width="24" height="24">
          <use href="img/mark.svg"></use>
        </svg>
        <address class="mobile-info-address">
          г. Москва, Холодильный пер. 4к1с8
        </address>
      </div>
      <!-- /.mobile-info -->
      <div class="mobile-info">
        <svg class="button-icon" width="24" height="24">
          <use href="img/mail.svg"></use>
        </svg>
        <a href="mailto:a.dragunov@tdaliance.ru" class="mobile-info-email">
          a.dragunov@tdaliance.ru
        </a>
      </div>

      <div class="mobile-info">
        <svg class="button-icon" width="24" height="24">
          <use href="img/vk.svg"></use>
        </svg>
        <svg class="button-icon" width="24" height="24">
          <use href="img/inst.svg"></use>
        </svg>
      </div>
    </div>
    <nav class="navbar navbar-light">
      <a href="#" class="mobile-menu-toggle">
        <div class="mobile-menu-line"></div>
        <div class="mobile-menu-line"></div>
        <div class="mobile-menu-line"></div>
      </a>
      <a href="./" class="header-logo">
        <svg class="logo-svg logo-dark">
          <use href="img/sprite.svg#logo-light"></use>
        </svg>
      </a>

      <ul class="header-nav">
        <li><a href="/about.php" class="header-nav-link">О компании</a></li>
        <li>
          <a href="/contracts.php" class="header-nav-link">Контрактное производство</a>
        </li>
        <li>
          <a href="/trademarks.php" class="header-nav-link">Собственные торговые марки</a>
        </li>
        <li><a href="" class="header-nav-link">Новости</a></li>
        <li><a href="" class="header-nav-link">Контакты</a></li>
      </ul>

      <div class="header-phone">
        <a href="tel:+74996861014" class="header-phone-link">
          +7 (499) 686-10-14
        </a>
      </div>

      <button class="navbar-button button" data-toggle="modal" data-target="#feedback-modal">
        <svg class="button-icon" width="24" height="24">
          <use href="img/sprite.svg#phone"></use>
        </svg>
        <span class="button-text">Получить консультацию</span>
      </button>
    </nav>

    <!-- /.navbar -->

    <header class="page-header <?php echo $header_style; ?>">
      <!-- <img src="img/thumb.png" alt="" class="page-header-thumb" /> -->
      <div class="container">
        <div class="separator"></div>
        <h1 class="page-header-title"><?= $page_title ?></h1>
        <ul class="breadcrumbs">
          <li class="breadcrumbs-item">
            <a href="/" class="breadcrumbs-link">Главная</a>
          </li>
          <li class="breadcrumbs-item active">
            <a href="#" class="breadcrumbs-link"><?= $page_title ?></a>
          </li>
        </ul>
      </div>
      <!-- /.container -->
    </header>
