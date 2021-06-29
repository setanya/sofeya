<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Студия декора Софея,  дизайн интерьера, художественные услуги, декоративная штукатурка">
    <meta name="description" content="Студия декора Софея, художественные услуги и дизайн, консультация по декору, декоративная штукатурка, нанесение декоративных материалов">
    <link rel="stylesheet" href="/public/fonts/Commissioner-VariableFont_wght.ttf">
    <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/style/style.css">
    <link rel="stylesheet" href="/public/style/media.css">
    <title><?php echo TITLE;?></title>
</head>
<body>
    <div id="case">
        <div class="logo">
            <p class="title"><?php echo TITLE;?></p>
            <p class="telefon"><?php echo TELEFON1;?></p>
        </div>
        <div id="block" class="container">
            <div class="row">
                <header class="col-md-3 ">
                    <nav class="sidebar-sticky  navbar-light navbar-expand-md">
                        <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto flex-column ">
                                <li class="nav-item list active zero">.</li>
                                <li class="nav-item list">
                                    <a href="/" class="nav-link">Главная</a>
                                </li>
                                <li class="dropdown list">
                                    <a class="dropdown-toggle nav-link" href="/" data-toggle="dropdown">Декоративные <br> материалы
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item list-menu">
                                            <a class="nav-link" href="/materials/plasters">Декоративные штукатурки</a>
                                        </li>
                                        <li class="nav-item list-menu">
                                            <a class="nav-link" href="/materials/tools">Инструменты</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="dropdown list">
                                    <a class="dropdown-toggle nav-link" href="#" data-toggle="dropdown">Портфолио
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-item list-menu">
                                            <a class="nav-link" href="/portfolio/decorative">Декоративная отделка</a>
                                        </li>
                                        <li class="nav-item list-menu">
                                            <a class="nav-link" href="/portfolio/textures">Образцы фактур</a>
                                        </li>
                                        <li class="nav-item list-menu">
                                            <a class="nav-link" href="/portfolio/painting">Росписи ,рельефы</a>
                                        </li>
                                        <li class="nav-item list-menu">
                                            <a class="nav-link" href="/portfolio/baby">Детские темы</a>
                                        </li>
                                        <li class="nav-item list-menu">
                                            <a class="nav-link" href="/portfolio/pictures">Мои картины</a>
                                        </li>
                                        <li class="nav-item list-menu">
                                            <a class="nav-link" href="/portfolio/design">Дизайн</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item list">
                                    <a href="/contact/index" class="nav-link">Контакты</a>
                                </li>
                                <li class="nav-item list">
                                    <a href="/news/view" class="nav-link">Новости</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </header>
                <main class="col-md-9">
                <?=$content;?>
                </main>
            </div>
            <footer>
                <div class="row footer">
                    <div col-md-4>
                        <p>Контакты <br>
                            <?php echo TELEFON1;?><br>
                            <?php echo TELEFON2;?>
                        </p>
                    </div>
                    <div col-md-4>
                        <p>Наш инстaграм<br>
                            <a class="insta" href="<?php echo INSTA;?>" target="_blank"><?php echo INSTAGRAM;?></a>
                        </p>
                    </div>
                    <div col-md-4>
                        <p>Мы в контакте <br>
                            <a href="<?php echo CONTACT;?>" target="_blank">
                                <img class="vkontact" src="/public/foto/home/contact.png"  alt="Мы в контакте">
                            </a>
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="/public/script/jquery.min.js"></script>
    <script src="/public/bootstrap/popper/slim_min.js"></script>
    <script src="/public/bootstrap/popper/popper.min.js"></script>
    <script src="/public/bootstrap/popper/bootstrap.min.js"></script>
    <script src="/public/script/script.js"></script>
</body>
</html>