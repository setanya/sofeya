<?php
$c = 1;
?>
    <div class="row">
        <?php foreach ($paint as $key):?>
        <div class="col-sm-4 respons">
                <div class="card gallery paint" >
                    <img src="/foto/paint/<?=$key['image'];?>" class="card-img-top" alt="<?=$key['alt'];?>" width="50%" ">
                    <div class="card-body">
                        <h5 class="card-title"><?=$key['title'];?></h5>
                        <p class="card-text"><?=$key['text'];?></p>
                    </div>
                </div>
        </div>
            <?if($c % 3 == 0):?>
    </div>
    <div class="row">
            <?endif;?>
            <?$c++;?>
        <?php endforeach;?>
    </div>
<nav aria-label="Page navigation example" class="counter">
    <?=$pagination;?>
</nav>




