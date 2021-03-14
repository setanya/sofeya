
<div class="row">
    <div id='block_rosp'>
        <?php foreach ($pictures as $key):?>
        <div class="rosp">
            <div id="<?=$key['id'];?>" class="gallery">
                <img src="/public/foto/images/<?=$key['image'];?>" alt="<?=$key['alt'];?>"  width="250" height="400">
            </div>
            <div class="desc"><?=$key['title'];?></div>
        </div>
        <!--modal-->
        <div class="my-modal">
            <div class="overlay"></div>
            <div class="my-modal-container" data-id="<?=$key['id'];?>">
                <a href="javascript:void(0);" onclick="closeModal();" class="closes">X</a>
                <img src="/public/foto/images/<?=$key['image'];?>" alt="<?=$key['alt'];?>" height="500">
            </div>
        </div>
        <?php endforeach;?>
    </div>
</div>
<nav aria-label="Page navigation example" class="counter">
    <?=$pagination;?>
</nav>

