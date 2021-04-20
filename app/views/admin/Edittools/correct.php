<div class="forms">
    <form action="" method="POST" enctype="multipart/form-data">
        <p><b>Раздел меню " ДЕКОРАТИВНЫЕ МАТЕРИАЛЫ " часть  ИНСТРУМЕНТЫ</b></p>
        <div class="form-group">
            <label><b>Загруженное изображение :</b><?=$arrTools['image'];?></label><br>
            <label for="exampleFormControlFile1"><b>Заменить изображение</b></label><br>
            <input type="file" name="user_file" class="form-control-file" id="exampleFormControlFile1"><br>
            <input type="text" name="alt" class="form-control" placeholder="Описание фото ALT='...'" value="<?=$arrTools['alt'];?>">
        </div>
        <div class="form-group">
            <label for="formGroupExampleInput"><b>Заменить название инструмента</b></label><br>
            <input type="text" name="title" class="form-control" id="formGroupExampleInput" value="<?=$arrTools['title'];?>">
            <label for="exampleFormControlTextarea1"><b>Заменить описание инструмента</b></label><br>
            <textarea name="big_text" class="form-control" id="exampleFormControlTextarea1" rows="5" ><?=$arrTools['text'];?></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-secondary">Заменить ИНСТРУМЕНТ</button>
    </form>
</div>