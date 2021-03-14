
<div class="row">
    <div id="block_rosp">
        <?php foreach ($decor as $key):?>
        <div class="responsive">
            <div id="<?=$key['id'];?>" class="gallery">
                <img id="gallery_id" src="/foto/images/<?=$key['image'];?>" alt="<?=$key['alt'];?>" height="350">
            </div>
            <div class="desc"><?=$key['title'];?></div>
        </div>
        <!--modal-->
        <div class="my-modal">
            <div class="overlay"></div>
            <div class="my-modal-container" data-id="<?=$key['id'];?>">
                <a href="javascript:void(0);" onclick="closeModal();" class="closes">X</a>
                <img  class="img" src="/foto/images/<?=$key['image'];?>" alt="<?=$key['alt'];?>" height="500">
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<nav aria-label="Page navigation example" class="counter">
    <?=$pagination;?>
</nav>
