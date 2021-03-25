
<div class="forms">
    <form  method="POST" enctype="multipart/form-data">
        <p><b>Раздел меню " ПОРТФОЛИО "</b></p>
        <?if(isset($_SESSION['end']) && $_SESSION['end'] !=""):?>
            <p style="color: red"><?=$_SESSION['end']?></p>
        <?unset($_SESSION['end'])?>
        <?endif;?>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Выбрать раздел Портфолио</label><br>
            <select name="categoryPortfolio" class="form-control" id="exampleFormControlSelect1">
                <option selected ></option>
                <?foreach ($arCat as $value):?>
                <option value="<?=$value['id'];?>"><?=$value['category'];?></option>
                <?endforeach;?>
            </select>
            <?if(isset($_POST['categoryPortfolio']) && (empty($_POST['categoryPortfolio']))):?>
                <p style="color:red;"><? echo 'Выберите категорию раздел Портфолио' ;?></p>
            <?endif;?>
        </div><br>
        <div class="form-group">
            <label for="formGroupExampleInput">Название декора</label><br>
            <input type="text" name="nameDecor" class="form-control" id="formGroupExampleInput" placeholder="Название декора">
            <?if(isset($_POST['nameDecor']) && (empty($_POST['nameDecor']))):?>
                <p style="color:red;"><? echo'Введите название декоративной штукатурки';?></p>
            <?endif;?>
        </div><br>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория изображения</label><br>
            <select name="categoryImage" class="form-control" id="exampleFormControlSelect1">
                <option selected ></option>
                <?foreach ($arDez as $value):?>
                    <option value="<?=$value['id'];?>"><?=$value['category'];?></option>
                <?endforeach;?>
            </select>
            <?if(isset($_POST['categoryImage']) && (empty($_POST['categoryImage']))):?>
                <p style="color:red;"><? echo 'Выберите категорию изображения';?></p>
            <?endif;?>
            <label for="exampleFormControlFile1">Выберите файл для загрузки</label><br>
            <input type="file" name="portfolio" class="form-control-file" id="exampleFormControlFile1"><br>
            <?if(isset($_FILES['user_file']) && ($_FILES['user_file']['error'] != 0)):?>
                <p style="color:red;"><? echo 'Загрузите файл';?></p>
            <?endif;?>
            <input type="text" name="alt" class="form-control" placeholder="Описание фото ALT='...'">
            <?if(isset($_POST['alt']) && (empty($_POST['alt']))):?>
                <p style="color:red;"><? echo 'Заполните описание фото';?></p>
            <?endif;?>
        </div>
        <br>
        <button type="submit" name="submit" class="btn btn-secondary">Добавить</button>
    </form>

</div>






