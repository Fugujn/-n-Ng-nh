<?php 
include ("configajax.php"); 
if ($_SESSION['language'] == 'vi') {
    $_SESSION['language'] = "vi";
    $lang = 'vi';
} elseif ($_SESSION['language'] == 'en') {
    $_SESSION['language'] = "en";
    $lang = 'en';
} else {
    $lang = 'vi';
}
?>
<?php
$id_item = $_POST['id_item'];
$d->reset();
$sql = "select * from #_product where hienthi = 1 and type = 'san-pham' and noibat > 0 and find_in_set('" . $id_item . "',list_id)>0  and gia > 0 order by stt, ngaytao desc limit 0,10";
$d->query($sql);
$product_khungdo = $d->result_array(); ?>
<?php if(count($product_khungdo) > 0) { ?>
    <?php for($i = 0; $i < count($product_khungdo);$i++) { ?>
        <div class="productcon" style="margin-top: 10px;margin-bottom: 0px">
            <?php if($product_khungdo[$i]['phantramgiam'] != '' && $product_khungdo[$i]['phantramgiam'] > 0){?>
                <span class="percent deal">-<?= $product_khungdo[$i]['phantramgiam'] ?>%</span>
            <?php } ?>
            <div class="baoanhsp">
                <a href="<?= $product_khungdo[$i]['tenkhongdau'] ?>">
                    <img src="upload/thumb/<?= $product_khungdo[$i]['thumb'] ?>">
                </a>
            </div>
            <div class="baotensp">
                <p>
                    <a href="<?= $product_khungdo[$i]['tenkhongdau'] ?>"><?= $product_khungdo[$i]['ten_vi'] ?></a>
                </p>
            </div>
            <p style="width: 100%;float:left;margin-top:5px">
                <?php $ratesao = round($product_khungdo[$i]['rate'] / $product_khungdo[$i]['luot_rate']) ?>
                <?php for($k = 0; $k < $ratesao;$k++) { ?>
                    <img src="assets/images/ngoisao.png" style="margin-right: 2px">
                <?php } ?>
                <?php for($k = 0; $k < (5 - $ratesao);$k++) { ?>
                    <img src="assets/images/ngoisaobac.png" style="margin-right: 2px">
                <?php } ?>
            </p>
            <div class="baogia">
                <p>
                    <?php if($product_khungdo[$i]['gia'] > 0) { ?>
                        <a><?= price_sp($product_khungdo[$i]['gia']) ?></a>
                    <?php } else { ?>
                        <a>Liên hệ : <?= $rs_setting['hotline'] ?></a>
                    <?php } ?>
                </p>
                <?php if($product_khungdo[$i]['phantramgiam'] > 0) { ?>
                    <p style="margin-top:2px">
                        <a style="color:#747474;font-size: 13px;text-decoration: line-through"><?= price_sp($product_khungdo[$i]['giakm']) ?></a> <!-- <a style="color:#5b5f69;font-size: 13px;margin-left: 20px"><?= $product_khungdo[$i]['phantramgiam'] ?>%</a> -->
                    </p>
                <?php } ?>
            </div>
            <div style="clear:both;"></div>
        </div>
    <?php } ?>
<?php } else { ?>
    <p style="color:white;text-align: left">
        Sản phẩm đang cập nhật
    </p>
<?php } ?>