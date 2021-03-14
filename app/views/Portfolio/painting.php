
<div id='block_rosp'>
    <?php foreach ($painting as $key):?>
        <div class=" design">
            <div id="<?=$key['id'];?>" class="gallery">
                <img src="/public/foto/images/<?=$key['image'];?>" alt="<?=$key['alt'];?>" width="500" height="300">
            </div>
        </div>
        <!--modal-->
        <div class="my-modal">
            <div class="overlay"></div>
            <div class="my-modal-container" data-id="<?=$key['id'];?>">
                <a href="javascript:void(0);" onclick="closeModal();" class="closes">X</a>
                <img  class="img" src="/public/foto/images/<?=$key['image'];?>" alt="<?=$key['alt'];?>" >
            </div>
        </div>
    <?php endforeach;?>
</div>

<nav aria-label="Page navigation example" class="counter">
    <?=$pagination;?>
</nav>