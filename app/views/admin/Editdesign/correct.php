<div class="forms">
    <form action="" method="POST" enctype="multipart/form-data">
        <p><b>Изменения в разделе " ПОРТФОЛИО / Дизйны  "</b></p>
        <div class="form-group">
            <label><b>Загруженное изображение :</b><?=$arOneDesign['image'];?> </label><br>
            <label for="exampleFormControlFile1"><b>Выберите новое изображение для загрузки</b></label><br>
            <input type="file" name="design" class="form-control-file" id="exampleFormControlFile1"><br>
            <input type="text" name="alt" class="form-control" placeholder="краткое описание фото ALT='...'" value="<?=$arOneDesign['alt'];?>">
        </div><br>
        <button type="submit" name="submit" class="btn btn-secondary">Заменить изображение Дизайна</button>
    </form>
</div>

