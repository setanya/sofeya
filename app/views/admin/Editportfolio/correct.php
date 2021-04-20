<?php
//pr($arrOnePortfolio);
//pr($arDecor);
//pr($_POST);
?>
<div class="forms">
    <form  method="POST" enctype="multipart/form-data">
        <p><b>Редактирование раздела " ПОРТФОЛИО "</b></p>
        <div class="form-group">
            <label for="exampleFormControlSelect1"><b>Изменить раздел Портфолио</b></label><br>

            <select name="categoryPortfolio" class="form-control" id="exampleFormControlSelect1">

                    <?foreach ($arCat as $value):?>
                <?if($value['id'] === $arrOnePortfolio['portfolio_id']):?>
                <option selected value="<?=$value['id'];?>"><?=$value['category'];?></option>
                        <?endif;?>
                    <?endforeach;?>

                    <?foreach ($arCat as $val):?>
                        <option value="<?=$val['id'];?>"><?=$val['category'];?></option>
                    <?endforeach;?>
            </select>
        </div><br>
        <div class="form-group">
            <label for="formGroupExampleInput"><b>Изменить название декора</b></label><br>
            <input type="text" name="nameDecor" class="form-control" id="formGroupExampleInput" value="<?=$arrOnePortfolio['title'];?>">
        </div><br>
        <div class="form-group">
            <label for="exampleFormControlSelect1"><b>Изменить вид фактуры</b></label><br>
            <select name="categoryImage" class="form-control" id="exampleFormControlSelect1">
                <?foreach ($arDecor as $valus):?>
                    <?if($valus['id'] === $arrOnePortfolio['decor_id']):?>
                        <option selected value="<?=$valus['id'];?>"><?=$valus['category'];?></option>
                    <?endif;?>
                <?endforeach;?>

                <?foreach ($arDecor as $valus):?>
                    <option value="<?=$valus['id'];?>"><?=$valus['category'];?></option>
                <?endforeach;?>
            </select>
            <label for="exampleFormControlFile1"><b>Выберите файл для загрузки</b></label><br>
            <input type="file" name="portfolio" class="form-control-file" id="exampleFormControlFile1"><br>
            <input type="text" name="alt" class="form-control" placeholder="Описание фото ALT='...'" value="<?=$arrOnePortfolio['alt'];?>">
        </div><br>
        <button type="submit" name="submit" class="btn btn-secondary">Обновить Портфолио</button>
    </form>
</div>

