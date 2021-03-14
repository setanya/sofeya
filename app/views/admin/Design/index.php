<div class="forms">
    <form action="" method="POST" enctype="multipart/form-data">
        <p><b>Раздел меню " ПОРТФОЛИО / Дизйны  "</b></p>
        <?if(isset($_SESSION['end']) && $_SESSION['end'] !=""):?>
            <p style="color: red"><?=$_SESSION['end']?></p>
            <?unset($_SESSION['end'])?>
        <?endif;?>
        <div class="form-group">
            <label for="exampleFormControlFile1">Выберите файл для загрузки</label><br>
            <input type="file" name="design" class="form-control-file" id="exampleFormControlFile1"><br>
            <?if(isset($_FILES['user_file']) && ($_FILES['user_file']['error'] != 0)):?>
                <p style="color:red;"><? echo ('Загрузите файл') ;?></p>
            <?endif;?>
            <input type="text" name="alt" class="form-control" placeholder="Описание фото ALT='...'">
            <?if(isset($_POST['alt']) && (empty($_POST['alt']))):?>
                <p style="color:red;"><? echo ('Заполните описание фото') ;?></p>
            <?endif;?>
        </div><br>

        <button type="submit" name="submit" class="btn btn-secondary">Дообавить Дизайн</button>
    </form><br>
</div>
