
<?php foreach ($news as $arNews):?>
    <div class="card mb-3 block_news">
        <img src="/foto/news/<?=$arNews['image'];?>" class="card-img-top" width="625" height="205" alt="<?=$arNews['alt'];?>">
        <div class="card-body">
            <h5 class="card-title news"><?=$arNews['title'];?></h5>
            <p class="card-text text_news"><?=$arNews['preview'];?> </p>
        </div>
            <div class="more">
                <a href="/news/viewdatail/<?=$arNews['id'];?>"> "Читать дальше"</a>
            </div>
    </div>
<?php endforeach;?>
    <div class="counter">
        <?=$pagination;?>
    </div>





