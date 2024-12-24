<style>
    .productcon2{width:390px;margin-left:16px}
    .productcon3{margin-left:0px;}
    .motatennews{height:90px;overflow: hidden}
    .motatennews p{color:#716f6f;line-height:18px}
</style>
<div class="box_content">   
    <div class="title" style="margin-bottom:10px;">
        <p><?= $title_tcat ?></p>
    </div>
    <div style="clear:both"></div>
    <div class="clear"></div>           
    <?php
    if (count($tintuc) > 0) {
        $dem = 1;
        for ($i = 0; $i < count($tintuc); $i++) {
            ?>     
            <div class="productcon2
            <?php
            if ($dem == 1) {
                echo 'productcon3';
            } else if ($dem == 2) {
                echo '';
            }
            ?>">
                <div class="baoanhspdetail baogiatat">
                    <a href="bao-gia/<?= $tintuc[$i]['tenkhongdau'] ?>-<?= $tintuc[$i]['id'] ?>.html">
                        <img src="upload/news/<?= $tintuc[$i]['photo'] ?>" class="anhloptren"/>
                    </a>
                </div>
                <div class="noidungdetailsp baogiangang">
                    <div class="baotensp">
                        <p>
                            <a href="bao-gia/<?= $tintuc[$i]['tenkhongdau'] ?>-<?= $tintuc[$i]['id'] ?>.html">
                                <?= $tintuc[$i]['ten'] ?>
                            </a>
                        </p>
                    </div>
                    <div class="clear"></div>
                    <div class="motatennews">
                        <p>
                            <?= $tintuc[$i]['mota'] ?>
                        </p>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>

            </div>       
            <?php
            if ($dem == 2) {
                $dem = 1;
            } else {
                $dem++;
            }
        }
        ?>
    <?php } else { ?>
        <p><?= $title_tcat ?><?= change_lang(' đang cập nhật ...', ' is updating....') ?></p>
    <?php } ?>
    <div class="clear"></div>
    <div class="phantrang" ><?= $paging['paging'] ?></div>
</div> 
</div>
