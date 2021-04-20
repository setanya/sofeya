<?php
//pr($arNews);
?>
<div class="forms">
    <form action="" method="POST" enctype="multipart/form-data">
        <p><b>Редактирование " НОВОСТИ "</b></p>
        <div class="form-group">
            <input type="text" name="title" class="form-control" id="formGroupExampleInput"  value="<?=$arNews['title'];?>">
        </div><br>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Изменить текст новости</label><br>
            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="5"><?=$arNews['preview'];?></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Изменить продолжение новости</label><br>
            <textarea name="textTo" class="form-control" id="exampleFormControlTextarea1" rows="5"><?=$arNews['text'];?></textarea>
        </div><br>
        <div class="form-group">
            <label>Загруженное изображение : <?=$arNews['image'];?></label><br>
            <label for="exampleFormControlFile1">Заменить изображение</label><br>
            <input type="file" name="foto" class="form-control-file" id="exampleFormControlFile1"> <br>
            <input type="alt" name="alt" class="form-control" placeholder="Описание фото ALT=''" value="<?=$arNews['alt'];?>">

        </div><br>

        <button type="submit" name="submit" class="btn btn-secondary">Обновить Новость</button>
    </form>
</div>
