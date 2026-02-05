<!doctype html>
<html lang="ru">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?= $page_title; ?> - Aliance Production. Контрактное производство автомобильной и бытовой химии, дезинфицирующих средств. Собственные торговые марки." />
    
    <!-- Preconnect для внешних ресурсов -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    
    <!-- Preload критичных ресурсов -->
    <link rel="preload" href="css/style.css" as="style" />
    <link rel="preload" href="js/main.js" as="script" />
    
    <!-- Google Fonts с display=swap для улучшения производительности -->
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
          <a href="about.php" class="mobile-menu-link">О компании</a>
        </li>
        <li class="mobile-menu-nav-item">
          <a href="contracts.php" class="mobile-menu-link">Контрактное производство</a>
          <ul class="mobile-submenu">
            <li class="mobile-submenu-item">
              <a class="mobile-submenu-link" href="contracts.php">Автомобильная химия</a>
            </li>
            <li class="mobile-submenu-item">
              <a class="mobile-submenu-link" href="contracts.php">Бытовая химия</a>
            </li>
            <li class="mobile-submenu-item">
              <a class="mobile-submenu-link" href="contracts.php"
                >Дезинфицирующие средства</a
              >
            </li>
          </ul>
        </li>
        <li class="mobile-menu-nav-item">
          <a href="trademarks.php" class="mobile-menu-link"
            >Собственные торговые марки</a
          >
        </li>
        <li class="mobile-menu-nav-item">
          <a href="index.php#news" class="mobile-menu-link">Новости</a>
        </li>
        <li class="mobile-menu-nav-item">
          <a href="index.php#contacts" class="mobile-menu-link">Контакты</a>
        </li>
      </ul>

      <a href="tel:+74996861014" class="mobile-phone">+7 (499) 686-10-14</a>
      <div class="mobile-info">
        <svg class="phone-icon" width="24" height="24" aria-hidden="true">
          <use href="img/mark.svg"></use>
        </svg>
        <address class="mobile-info-address">
          г. Москва, Холодильный пер. 4к1с8
        </address>
      </div>
      <!-- /.mobile-info -->
      <div class="mobile-info">
        <svg class="button-icon" width="24" height="24" aria-hidden="true">
          <use href="img/mail.svg"></use>
        </svg>
        <a href="mailto:a.dragunov@tdaliance.ru" class="mobile-info-email">
          a.dragunov@tdaliance.ru
        </a>
      </div>

      <div class="mobile-info">
        <a href="https://vk.com/alianceproduction" class="footer-social-link" aria-label="ВКонтакте" target="_blank" rel="noopener">
          <svg class="button-icon" width="24" height="24" aria-hidden="true">
            <use href="img/vk.svg"></use>
          </svg>
        </a>
        <a href="https://instagram.com/alianceproduction" class="footer-social-link" aria-label="Instagram" target="_blank" rel="noopener">
          <svg class="button-icon" width="24" height="24" aria-hidden="true">
            <use href="img/inst.svg"></use>
          </svg>
        </a>
      </div>
    </div>
    <nav class="navbar navbar-light">
      <a href="#" class="mobile-menu-toggle" aria-label="Открыть мобильное меню">
        <div class="mobile-menu-line"></div>
        <div class="mobile-menu-line"></div>
        <div class="mobile-menu-line"></div>
      </a>
      <a href="./" class="header-logo" aria-label="Aliance Production - Главная страница">
        <svg class="logo-svg logo-dark" aria-hidden="true">
          <use href="img/sprite.svg#logo-light"></use>
        </svg>
      </a>

      <ul class="header-nav">
        <li><a href="about.php" class="header-nav-link">О компании</a></li>
        <li>
          <a href="contracts.php" class="header-nav-link">Контрактное производство</a>
        </li>
        <li>
          <a href="trademarks.php" class="header-nav-link">Собственные торговые марки</a>
        </li>
        <li><a href="index.php#news" class="header-nav-link">Новости</a></li>
        <li><a href="index.php#contacts" class="header-nav-link">Контакты</a></li>
      </ul>

      <div class="header-phone">
        <a href="tel:+74996861014" class="header-phone-link">
          +7 (499) 686-10-14
        </a>
      </div>

      <button class="navbar-button button" data-toggle="modal" data-target="#feedback-modal" aria-label="Получить консультацию">
        <svg class="button-icon" width="24" height="24" aria-hidden="true">
          <use href="img/sprite.svg#phone"></use>
        </svg>
        <span class="button-text"> Получить консультацию </span>
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
<a href="index.php" class="breadcrumbs-link">Главная</a>
</li>
<li class="breadcrumbs-item active">
<a href="#" class="breadcrumbs-link" aria-current="page"><?= $page_title ?></a>
</li>
</ul>
</div>
<!-- /.container -->

</header>
    <section class="cta">
      <div class="bg-grey section-cta">
        <img src="img/cta.png" alt="Продукция AG-Tech" class="cta-image" width="554" height="622" loading="lazy" />
        <div class="cta-form-wrapper container">
          <form action="handler.php" method="POST" class="cta-form">
  <h2 class="section-title cta-form-title">Хотите сотрудничать?</h2>
  <p class="cta-form-text">
    Оставьте заявку, наш менеджер свяжется с Вами в ближайшее время
    ответит на&nbsp;все интересующие вопросы и поможем даже в самых сложных
    случаях!
  </p>

  <div class="input-group-wrapper input-group-vertical">

    <div class="input-group modal-input-group">
      <input
        id="user-name"
        name="username"
        type="text"
        class="input"
        placeholder=" "
        maxlength="100"
        required
        aria-label="Введите ваше имя"
      />
      <label class="input-group-label modal-input-label" for="user-name">Имя</label>
    </div>

    <div class="input-group modal-input-group">
      <input
        id="user-phone"
        name="userphone"
        type="tel"
        class="input phone-mask"
        placeholder=" "
        maxlength="30"
        required
        aria-label="Введите номер телефона"
      />
      <label class="input-group-label modal-input-label" for="user-phone">Номер телефона</label>
    </div>

  </div>

  <div class="cta-form-footer">
    <button type="submit" class="button cta-form-button">
      Отправить заявку
    </button>
    <div class="notify">
      <svg class="notify-icon" width="14" height="14" aria-hidden="true">
        <use href="img/sprite.svg#shield"></use>
      </svg>
      <p class="notify-text">
        Обращаясь к нам вы получаете не только профессиональную работу, но
        и абсолютную конфиденциальность информации!
      </p>
    </div>
  </div>
</form>

        </div>
        <!-- /.cta-from-wrapper -->
      </div>
    </section>

    <footer class="footer">
      <div class="container">
        <div class="footer-top">
          <svg class="logo-svg footer-logo" width="36" height="36" aria-hidden="true">
            <use href="img/sprite.svg#logo"></use>
          </svg>
          <a href="tel:+74991234567" class="footer-phone">+7 (499) 686-10-14</a>
          <div class="footer-info">
            <svg class="phone-icon" width="24" height="24" aria-hidden="true">
              <use href="img/mark.svg"></use>
            </svg>
            <address class="footer-info-address">
              г. Москва, Холодильный пер. 4к1с8
            </address>
          </div>
          <!-- /.footer-info -->
          <div class="footer-info">
            <svg class="mail-icon" width="24" height="24" aria-hidden="true">
              <use href="img/mail.svg"></use>
            </svg>
            <a href="mailto:a.dragunov@tdaliance.ru" class="footer-info-email">
              a.dragunov@tdaliance.ru
            </a>
          </div>
          <!-- .footer-info -->
          <div class="footer-social">
            <a href="https://vk.com/alianceproduction" class="footer-social-link" aria-label="ВКонтакте" target="_blank" rel="noopener">
              <svg class="footer-social-icon" width="24" height="24" aria-hidden="true">
                <use href="img/sprite.svg#vk"></use></svg></a
            ><a href="https://instagram.com/alianceproduction" class="footer-social-link" aria-label="Instagram" target="_blank" rel="noopener">
              <svg class="footer-social-icon" width="24" height="24" aria-hidden="true">
                <use href="img/sprite.svg#inst"></use></svg
            ></a>
          </div>
          <!-- /.footer-social -->
        </div>
        <!-- /.footer-top -->
      </div>
      <hr color="#ebebf0" class="footer-separator" />
      <div class="container">
        <div class="footer-bottom">
          <div class="footer-menu-wrapper">
            <h2 class="footer-menu-title">Контрактное производство</h2>
            <ul class="footer-menu-list footer-menu-column-2">
              <li class="footer-menu-item">
                <a href="contracts.php" class="footer-menu-link">Автомобильная химия</a>
              </li>
              <li class="footer-menu-item">
                <a href="contracts.php" class="footer-menu-link">Бытовая химия</a>
              </li>
              <li class="footer-menu-item">
                <a href="contracts.php" class="footer-menu-link"
                  >Дезинфицирующие средства</a
                >
              </li>
              <li class="footer-menu-item">
                <a href="contracts.php" class="footer-menu-link">Пищевые аэрозоли</a>
              </li>
              <li class="footer-menu-item">
                <a href="contracts.php" class="footer-menu-link">Косметическая продукция</a>
              </li>
              <li class="footer-menu-item">
                <a href="contracts.php" class="footer-menu-link">Краски аэрозольные</a>
              </li>
            </ul>
          </div>
          <!-- /.footer-menu-wrapper -->
          <div class="footer-menu-wrapper">
            <h2 class="footer-menu-title">Собственные марки</h2>
            <ul class="footer-menu-list">
              <li class="footer-menu-item">
                <a href="trademarks.php" class="footer-menu-link">Автохимия AG-Tech</a>
              </li>
              <li class="footer-menu-item">
                <a href="trademarks.php" class="footer-menu-link">Автохимия AP</a>
              </li>
            </ul>
          </div>
          <div class="footer-menu-wrapper">
            <ul class="footer-menu-list">
              <li class="footer-menu-item">
                <a href="about.php" class="footer-menu-link footer-menu-link-bold"
                  >О компании</a
                >
              </li>
              <li class="footer-menu-item">
                <a href="index.php#news" class="footer-menu-link footer-menu-link-bold"
                  >Новости</a
                >
              </li>
              <li class="footer-menu-item">
                <a href="index.php#contacts" class="footer-menu-link footer-menu-link-bold"
                  >Контакты</a
                >
              </li>
            </ul>
          </div>
        </div>
        <!-- /.footer-bottom -->
      </div>
      <!-- /.container -->
      <hr color="#ebebf0" class="footer-seporator" />
      <div class="container">
        <div class="footer-wrapper">
          <div class="footer-legal">
            <p class="footer-copyright">
              &copy; 2022 «Aliance Production». Все права защищены.
            </p>
            <a href="privacy.php" class="footer-policy">Политики конфиденциальности</a>
          </div>
          <!-- /.footer-legal -->
          <div class="footer-author">
            <span class="made-in">Сделано в</span>
            <svg class="footer-social-icon" width="52" height="11" aria-hidden="true">
              <use href="img/sprite.svg#ruso"></use>
            </svg>
          </div>
          <!-- /.footer-author -->
        </div>
        <!-- /.footer-wrapper -->
      </div>
      <!-- /.container -->
    </footer>

    <div class="modal" id="feedback-modal">
      <div class="modal-dialog">
        <h2 class="modal-title">Есть вопросы?</h2>
        <a href="#" class="modal-close" data-toggle="modal" aria-label="Закрыть модальное окно">
          <svg class="close-icon" width="24" height="24" aria-hidden="true">
            <use href="img/sprite.svg#close"></use>
          </svg>
        </a>
        <p class="modal-text">
          Оставьте заявку, наш менеджер свяжется с Вами в ближайшее время
          ответит на все интересующие вопросы и поможем даже в самых сложных
          случаях!
        </p>
        <form action="handler.php" method="POST" class="modal-form">
  <div class="input-group-wrapper input-group-vertical">

    <div class="input-group">
      <input
        id="modal-user-name"
        name="username"
        type="text"
        class="input modal-input"
        placeholder=" "
        required
        aria-label="Введите ваше имя"
      />
      <label for="modal-user-name">Имя</label>
    </div>

    <div class="input-group">
      <input
        id="modal-user-phone"
        name="userphone"
        type="tel"
        class="input modal-input"
        placeholder=" "
        required
        aria-label="Введите номер телефона"
      />
      <label for="modal-user-phone">Номер телефона</label>
    </div>

  </div>

  <div class="modal-form-footer">
    <button type="submit" class="button modal-form-button">
      Отправить заявку
    </button>
  </div>
</form>

      </div>
    </div>

    <!-- Defer для неблокирующей загрузки JavaScript -->
    <script src="js/swiper-bundle.min.js" defer></script>
    <script src="js/main.js" defer></script>
  </body>
</html>
