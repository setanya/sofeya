<?if(isset($_SESSION['error']) && $_SESSION['error'] !=""):?>
<p style="color: red"><?=$_SESSION['error']?></p>
<?unset($_SESSION['error'])?>
<?endif;?>

<form class="form-horizontal" action="/admin/main/login" method="post">
        <div class="card-body">
            <div class="form-group row">
                <label for="inputText3" class="col-sm-3 col-form-label">Введите логин:</label>
                <div class="col-sm-9">
                    <input name ="login" type="text" class="form-control" id="inputText3" placeholder="Логин">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Введите пароль:</label>
                <div class="col-sm-9">
                    <input name ="password" type="password" class="form-control" id="inputPassword3" placeholder="Пароль">
                </div>
            </div>
            <div class="form-group row">
                <label for="inputDblPassword3" class="col-sm-3 col-form-label">Подтвердите пароль :</label>
                <div class="col-sm-9">
                    <input name ="dbl_password" type="password" class="form-control" id="inputDblPassword3" placeholder="Подтвердите пароль">
                </div>
            </div>

        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-light"><b>Войти</b></button>
        </div>
</form>
