<div class="forms">
    <form action="" method="POST" enctype="multipart/form-data">
        <p><h4>Редактирование раздела "Краски,  лаки, грунты"</h4></p>
<!--        <div class="form-group">-->
<!--            <label for="exampleFormControlFile1">Редактирование файла для загрузки</label><br>-->
<!--            <input type="file" name="paint" class="form-control-file" id="exampleFormControlFile1" value="--><?//=$_SERVER['DOCUMENT_ROOT'].'/public/foto/paint/'.$arPaints['image']?><!--"><br>-->
<!--            <input type="text" name="alt" class="form-control" placeholder="Описание фото ALT='..'" value="--><?//=$arPaints['alt']?><!--">-->
<!--        </div>-->
        <div class="form-group">
             <b><label for="formGroupExampleInput">Изменить название материала</label><br></b>
            <input type="text" name="title" class="form-control" id="formGroupExampleInput" value="<?=$arPaints['title']?>">
           <b><label for="exampleFormControlTextarea1">Заменить характеристики материала </label></b><br>
            <textarea name="text" class="form-control" id="exampleFormControlTextarea1" rows="5" ><?=$arPaints['text']?></textarea>
        </div>
        <button type="submit" name="submit" class="btn btn-secondary">Заменить Материал</button>
    </form>
</div>
