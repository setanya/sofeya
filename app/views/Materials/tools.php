 <div class="block_instrym">
     <?php foreach ($tools as $key):?>
        <div class="card mb-3 " style="max-width: 700px;">
            <div class="row no-gutters">
                <div class="col-md-4 ">
                    <img src="/foto/tools/<?=$key['image'];?>" class="card-img inst_img" alt="<?=$key['alt'];?>">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title"><?=$key['title'];?></h5>
                        <p class="card-text">
                            <?=$key['text'];?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
     <?php endforeach;?>
 </div>
<nav aria-label="Page navigation example" class="counter">
    <?=$pagination;?>
</nav>