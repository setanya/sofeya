<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="/public/fonts/Commissioner-VariableFont_wght.ttf">
        <link rel="stylesheet" href="/public/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="/public/style/style.css">
        <link rel="stylesheet" href="/public/style/media.css">

        <title><?php echo TITLE;?></title>
    </head>
    <body>
        <div id="case" >
            <div class="logo">
                <p class="title">
                    <?php echo TITLE;?>
                </p>
            </div>

            <div id="block" class="container">
                <div class="row">
                    <main class="col-md-9">
                        <div class="card card-info block_admin">
                            <div class="card-header">
                                <h3 class="card-title">Регистрации администратора</h3>
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

