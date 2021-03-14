
<div class="row">
    <div id='block_rosp'>
        <?php foreach ($project as $key):?>
        <div class="design">
            <div id="<?=$key['id'];?>" class="gallery">
                <img id="gallery_id" src="/foto/design/<?=$key['image'];?>" alt="<?=$key['alt'];?>"  >
            </div>
        </div>
        <!--modal-->
        <div class="my-modal">
            <div class="overlay"></div>
            <div class="my-modal-container" data-id="<?=$key['id'];?>">
                <a href="javascript:void(0);" onclick="closeModal();" class="closes">X</a>
                <img  class="img" src="/foto/design/<?=$key['image'];?>" alt="<?=$key['alt'];?>">
            </div>
        </div>

        <?php endforeach;?>
    </div>
</div>
    <nav aria-label="Page navigation example" class="counter">
        <?=$pagination;?>
    </nav>