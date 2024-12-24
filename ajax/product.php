<?php
include ("configajax.php");
$id = $_POST['duan'];
$d->reset();
$sql = "select * from #_product_list where hienthi = 1 and type = 'san-pham' and id = '" . $id . "'";
$d->query($sql);
$showcat1 = $d->result_array();
?>
<style>
    .spajax{width:100%;float:left;transition: all 1s}
</style>
<div class="spajax">
    <?php
    $d->reset();
    $sql = "select * from #_product where hienthi = 1 and type = 'san-pham' and noibat > 0 and id_list = '" . $id . "' limit 0,8 ";
    $d->query($sql);
    $showsp1 = $d->result_array();
    if (count($showsp1) > 0) {
        for ($i = 0; $i < count($showsp1); $i++) {
            ?>
            <div class="productcon">
                <div class="baoanhsp">
                    <a href="<?= $showsp1[$i]['tenkhongdau'] ?>">
                        <img src="timthumb.php?src=upload/product/<?= $showsp1[$i]['photo'] ?>&w=337&h=258&zc=1" class="anhsp12"/>
                    </a>
                    <?php if ($showsp1[$i]['giakm'] > 0) { ?>
                        <img src="assets/images/iconsales.png" class="saleicon"/>
                    <?php } ?>
                </div>
                <div class="baotensp">
                    <p>
                        <a href="<?= $showsp1[$i]['tenkhongdau'] ?>">
                            <?= $showsp1[$i]['ten_' . $lang] ?>
                        </a>
                    </p>
                </div>
                <div class="baogia">
                    <?php if ($showsp1[$i]['giakm'] > 0) { ?>
                        <p style="float:left">
                            <a style="font-size:15px;text-decoration: line-through;color:#71706c">
                                <?= price_sp($showsp1[$i]['giakm']) ?>
                            </a>
                        </p>
                    <?php } ?>
                    <p style="float:right">
                        <a><?= price_sp($showsp1[$i]['gia']) ?></a>
                    </p>
                    <div style="clear:both"></div>
                    <div style="width:100%;height:1px;border-bottom:1px dotted black;"></div>
                </div>
                <div class="baomota">
                    <p><?= $showsp1[$i]['mota_' . $lang] ?></p>
                </div>
            </div>   
        <?php } ?>
    <?php } else { ?>
        <p style="text-align: center"><?= change_lang('Sản phẩm đang cập nhật...', 'Product is updating...') ?></p>
    <?php } ?>
</div>
<div style="clear:both"></div>