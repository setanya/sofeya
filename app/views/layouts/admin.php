<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/public/fonts/Commissioner-VariableFont_wght.ttf">
        <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/public/style/style.css">
        <link rel="stylesheet" href="/public/style/media.css">
        <title>Страница администратора</title>
    </head>
    <body>
        <div id="case" >
            <div class="logo">
                <p class="title"><?php echo TITLE;?></p>
            </div>
            <div id="block" class="container">
                <div class="row">
                    <main class="col-md-12">
                        <div class="card card-info block_admin">
                            <div class="card-header">
                                <h3 class="card-title">Заполнение контентом сайт</h3>
                            </div>
                            <div class="menu_admin">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <a class="nav-link link_admin" href="/admin/main">Портфолио</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link_admin" href="/admin/tools">Инструменты</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link_admin" href="/admin/design">Дизайны</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link_admin" href="/admin/paint">Краски, лак</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link link_admin" href="/admin/news">Новости</a>
                                    </li>
                                    <li class="nav-item dropdown">
                                        <a class="dropdown-toggle nav-link link_admin" href="#" data-toggle="dropdown">Редактирование
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item list-menu">
                                                <a class="nav-link link_admin" href="#">Портфолио</a>
                                            </li>
                                            <li class="nav-item list-menu">
                                                <a class="nav-link link_admin" href="#">Инструменты</a>
                                            </li>
                                            <li class="nav-item list-menu">
                                                <a class="nav-link link_admin" href="#">Дизайны</a>
                                            </li>
                                            <li class="nav-item list-menu">
                                                <a class="nav-link link_admin" href="/admin/editpaint">Краски, лак</a>
                                            </li>
                                            <li class="nav-item list-menu">
                                                <a class="nav-link link_admin" href="/admin/edit">Новости</a>
                                            </li>
                                        </ul>
                                    </li>
<!--                                    <li class="nav-item">-->
<!--                                        <a class="nav-link link_admin" href="/admin/edit">Редактирование</a>-->
<!--                                    </li>-->
                                    <li class="nav-item">
                                        <a class="nav-link link_admin" href="/">Главная</a>
                                    </li>
                                </ul>
                            </div>
                            <?=$content;?>
                        </div>
                    </main>
                </div>
            </div>
        </div>

        <script src="/public/script/jquery.min.js"></script>
        <script src="/public/bootstrap/popper/slim_min.js"></script>
        <script src="/public/bootstrap/popper/popper.min.js"></script>
        <script src="/public/bootstrap/popper/bootstrap.min.js"></script>
        <script src="/public/script/script.js"></script>
    </body>
</html>
