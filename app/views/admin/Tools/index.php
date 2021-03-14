
<div class="forms">
    <form action="" method="POST" enctype="multipart/form-data">
        <p><b>Раздел меню " ДЕКОРАТИВНЫЕ МАТЕРИАЛЫ " часть  ИНСТРУМЕНТЫ</b></p>
        <?if(isset($_SESSION['end']) && $_SESSION['end'] !=""):?>
            <p style="color: red"><?=$_SESSION['end']?></p>
            <?unset($_SESSION['end'])?>
        <?endif;?>
        <div class="form-group">
            <label for="exampleFormControlFile1">Выберите файл для загрузки</label><br>
            <input type="file" name="user_file" class="form-control-file" id="exampleFormControlFile1"><br>
            <?if(isset($_FILES['user_file']) && ($_FILES['user_file']['error'] != 0)):?>
                <p style="color:red;"><? echo 'Загрузите файл';?></p>
            <?endif;?>
            <input type="text" name="alt" class="form-control" placeholder="Описание фото ALT='...'">
            <?if(isset($_POST['alt']) && (empty($_POST['alt']))):?>
                <p style="color:red;"><? echo 'Заполните описание фото';?></p>
            <?endif;?>
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput">Название инструмента</label><br>
            <input type="text" name="title" class="form-control" id="formGroupExampleInput">
            <?if(isset($_POST['title']) && (empty($_POST['title']))):?>
                <p style="color:red;"><? echo 'Заполните название инструмента';?></p>
            <?endif;?>
            <label for="exampleFormControlTextarea1">Введите коментарий к инструменту </label><br>
            <textarea name="big_text" class="form-control" id="exampleFormControlTextarea1" rows="5" ></textarea>
            <?if(isset($_POST['big_text']) && (empty($_POST['big_text']))):?>
                <p style="color:red;"><? echo 'Заполните коментарий к инструменту';?></p>
            <?endif;?>
        </div>
        <button type="submit" name="submit" class="btn btn-secondary">Добавить ИНСТРУМЕНТ</button>
    </form>
</div>