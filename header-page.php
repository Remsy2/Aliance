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
          <a href="#" class="mobile-menu-link">О компании</a>
        </li>
        <li class="mobile-menu-nav-item">
          <a href="#" class="mobile-menu-link">Контрактное производство</a>
          <ul class="mobile-submenu">
            <li class="mobile-submenu-item">
              <a class="mobile-submenu-link" href="#">Автомобильная химия</a>
            </li>
            <li class="mobile-submenu-item">
              <a class="mobile-submenu-link" href="#">Бытовая химия</a>
            </li>
            <li class="mobile-submenu-item">
              <a class="mobile-submenu-link" href="#"
                >Дезинфицирующие средства</a
              >
            </li>
          </ul>
        </li>
        <li class="mobile-menu-nav-item">
          <a href="/trademarks.php" class="mobile-menu-link"
            >Собственные торговые марки</a
          >
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
        <span class="button-text"> Получить консультацию </span>
      </button>
    </nav>

    <!-- /.navbar -->

<header class="page-header <?php echo $header_style; ?>">
<!-- <img src="img/thumb.png" alt="" class="page-header-thumb" /> -->
<div class="container">
<div class="seporator"></div>
<h1 class="page-header-title"><?= $page_title ?></h1>
<ul class="breadcrumbs">
<li class="breadcrumbs-item">
<a href="#" class="breadcrumbs-link">Главная</a>
</li>
<li class="breadcrumbs-item active">
<a href="#" class="breadcrumbs-link"><?= $page_title ?></a>
</li>
</ul>
</div>
<!-- /.container -->

</header>
    <section class="cta">
      <div class="bg-grey section-cta">
        <img src="img/cta.png" alt="call to action" class="cta-image" />
        <div class="cta-form-wrapper container">
          <form action="handler.php" method="POST" class="cta-form">
  <h2 class="section-title cta-form-title">Хотите сотрудничать?</h2>

  <div class="input-group-wrapper">

    <div class="input-group modal-input-group">
      <input
        id="user-name"
        name="username"
        type="text"
        class="input"
        placeholder=" "
        required
      />
      <label for="user-name">Имя</label>
    </div>

    <div class="input-group modal-input-group">
      <input
        id="user-phone"
        name="userphone"
        type="tel"
        class="input"
        placeholder=" "
        required
      />
      <label for="user-phone">Номер телефона</label>
    </div>

  </div>

  <div class="cta-form-footer">
    <button type="submit" class="button cta-form-button">
      Отправить заявку
    </button>
  </div>
</form>

        </div>
        <!-- /.cta-from-wrapper -->
      </div>
    </section>

    <footer class="footer">
      <div class="container">
        <div class="footer-top">
          <svg class="logo-svg footer-logo" width="36" height="36">
            <use href="img/sprite.svg#logo"></use>
          </svg>
          <a href="tel:+74991234567" class="footer-phone">+7 (499) 686-10-14</a>
          <div class="footer-info">
            <svg class="phone-icon" width="24" height="24">
              <use href="img/mark.svg"></use>
            </svg>
            <address class="footer-info-address">
              г. Москва, Холодильный пер. 4к1с8
            </address>
          </div>
          <!-- /.footer-info -->
          <div class="footer-info">
            <svg class="mail-icon" width="24" height="24">
              <use href="img/mail.svg"></use>
            </svg>
            <a href="mailto:a.dragunov@tdaliance.ru" class="footer-info-email">
              a.dragunov@tdaliance.ru
            </a>
          </div>
          <!-- .footer-info -->
          <div class="footer-social">
            <a href="#" class="footer-social-link">
              <svg class="footer-social-icon" width="24" height="24">
                <use href="img/sprite.svg#vk"></use></svg></a
            ><a href="#" class="footer-social-link">
              <svg class="footer-social-icon" width="24" height="24">
                <use href="img/sprite.svg#inst"></use></svg
            ></a>
          </div>
          <!-- /.footer-social -->
        </div>
        <!-- /.footer-top -->
      </div>
      <hr color="#ebebf0" class="footer-seporator" />
      <div class="container">
        <div class="footer-bottom">
          <div class="footer-menu-wrapper">
            <h2 class="footer-menu-title">Контрактное производство</h2>
            <ul class="footer-menu-list footer-menu-column-2">
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link">Автомобильная химия</a>
              </li>
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link">Бытовая химия</a>
              </li>
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link"
                  >Дезинфицирующие средства</a
                >
              </li>
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link">Пищевые аэрозоли</a>
              </li>
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link">Косметическая продукция</a>
              </li>
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link">Краски аэрозольные</a>
              </li>
            </ul>
          </div>
          <!-- /.footer-menu-wrapper -->
          <div class="footer-menu-wrapper">
            <h2 class="footer-menu-title">Собственные марки</h2>
            <ul class="footer-menu-list">
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link">Автохимия AG-Tech</a>
              </li>
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link">Автохимия AP</a>
              </li>
            </ul>
          </div>
          <div class="footer-menu-wrapper">
            <ul class="footer-menu-list">
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link footer-menu-link-bold"
                  >О компании</a
                >
              </li>
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link footer-menu-link-bold"
                  >Новости</a
                >
              </li>
              <li class="footer-menu-item">
                <a href="#" class="footer-menu-link footer-menu-link-bold"
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
            <a href="#" class="footer-policy">Политики конфиденциальности</a>
          </div>
          <!-- /.footer-legal -->
          <div class="footer-author">
            <span class="made-in">Сделано в</span>
            <svg class="footer-social-icon" width="52" height="11">
              <use href="img/sprite.svg#ruso"></use>
            </svg>
          </div>
          <!-- /.footer-author -->
        </div>
        <!-- /.footer-wrapper -->
      </div>
      <!-- /.container -->
    </footer>

    <div class="modal">
      <div class="modal-dialog">
        <h2 class="modal-title">Есть вопросы?</h2>
        <a href="#" class="modal-close" data-toggle="modal">
          <svg class="close-icon" width="24" height="24">
            <use href="img/sprite.svg#close"></use>
          </svg>
        </a>
        <p class="modal-text">
          Оставьте заявку, наш менеджер свяжется с Вами в ближайшее время
          ответит на все интересующие вопросы и поможем даже в самых сложных
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

    <script src="js/swiper-bundle.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
