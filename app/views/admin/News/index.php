
<div class="forms">
<form action="" method="POST" enctype="multipart/form-data">
    <p><b>Раздел меню " НОВОСТИ "</b></p>
    <div class="form-group">
        <input type="text" name="title" class="form-control" id="formGroupExampleInput" placeholder="Заголовок новости">
        <?if(isset($_POST['title']) && (empty($_POST['title']))):?>
            <p style="color:red;"><? echo 'Заполните заголовок новости';?></p>
        <?endif;?>
    </div><br>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Введите текст новости</label><br>
        <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
    </div>
    <?if(isset($_POST['text']) && (empty($_POST['text']))):?>
        <p style="color:red;"><? echo 'Заполните текст новости';?></p>
    <?endif;?>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Введите продолжение новости</label><br>
        <textarea name="textTo" class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
    </div><br>
    <?if(isset($_POST['textTo']) && (empty($_POST['textTo']))):?>
        <p style="color:red;"><? echo 'Заполните текст новости';?></p>
    <?endif;?>
    <div class="form-group">
        <label for="exampleFormControlFile1">Выберите файл для загрузки</label><br>
        <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1"><br>
        <?if(isset($_FILES['foto']) && ($_FILES['foto']['error'] != 0)):?>
            <p style="color:red;"><? echo 'Загрузите файл';?></p>
        <?endif;?>
        <input type="alt" name="alt" class="form-control" placeholder="Описание фото ALT='...'">
        <?if(isset($_POST['alt']) && (empty($_POST['alt']))):?>
            <p style="color:red;"><? echo 'Заполните описание фото';?></p>
        <?endif;?>
    </div><br>
    <?if(isset($_SESSION['end']) && $_SESSION['end'] !=""):?>
        <p style="color: red"><?=$_SESSION['end']?></p>
        <?unset($_SESSION['end'])?>
    <?endif;?>
    <button type="submit" name="submit" class="btn btn-secondary">Добавить Новость</button>
</form>
</div>
