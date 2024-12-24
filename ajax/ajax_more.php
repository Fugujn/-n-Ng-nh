<?php
include ("configajax.php");

$id = $_POST['id'];
$sl = $_POST['sl'];
$limit = $id + $sl;
?>
<?php
$d->reset();
$sql = "select * from #_product where hienthi = 1 and type = 'san-pham' and spbc > 0  order by id desc, ngaytao desc";
$d->query($sql);
$countproduct = $d->result_array();
$totalajax = count($countproduct);


$d->reset();
$sql = "select * from #_product where hienthi = 1 and type = 'san-pham' and spbc > 0 order by id desc, ngaytao desc limit ".$limit.",".$sl."";
$d->query($sql);
$product_index = $d->result_array();
for($i = 0; $i < count($product_index);$i++) {
?>
    <div class="productcon" style="margin-top: 10px;margin-bottom: 0px;margin-right: 1%;width: 16.7%;">
        <?php if($product_index[$i]['phantramgiam'] != '' && $product_index[$i]['phantramgiam'] > 0){?>
            <span class="percent deal">-<?= $product_index[$i]['phantramgiam'] ?>%</span>
        <?php } ?>
        <div class="baoanhsp">
            <a href="<?= $product_index[$i]['tenkhongdau'] ?>">
                <img src="upload/thumb/<?= $product_index[$i]['thumb'] ?>">
            </a>
        </div>
        <div class="baotensp">
            <p>
                <a href="<?= $product_index[$i]['tenkhongdau'] ?>"><?= $product_index[$i]['ten_vi'] ?></a>
            </p>
        </div>
        <p style="width: 100%;float:left;margin-top:5px">
            <?php $ratesao2 = round($product_index[$i]['rate'] / $product_index[$i]['luot_rate']) ?>
            <?php for($k = 0; $k < $ratesao2;$k++) { ?>
                <img src="assets/images/ngoisao.png" style="margin-right: 2px">
            <?php } ?>
            <?php for($k = 0; $k < (5 - $ratesao2);$k++) { ?>
                <img src="assets/images/ngoisaobac.png" style="margin-right: 2px">
            <?php } ?>
        </p>
        <div class="baogia">
            <p>
                <?php if($product_index[$i]['gia'] > 0) { ?>
                    <a><?= price_sp($product_index[$i]['gia']) ?></a>
                <?php } else { ?>
                    <a>Liên hệ : <?= $rs_setting['hotline'] ?></a>
                <?php } ?>
            </p>
            <?php if($product_index[$i]['phantramgiam'] > 0) { ?>
                <p style="margin-top:2px">
                    <a style="color:#747474;font-size: 13px;text-decoration: line-through"><?= price_sp($product_index[$i]['giakm']) ?></a> <!-- <a style="color:#5b5f69;font-size: 13px;margin-left: 20px"><?= $product_index[$i]['phantramgiam'] ?>%</a> -->
                </p>
            <?php } ?>
        </div>
        <div style="clear:both;"></div>
    </div>
<?php } ?>
<?php if(($limit+$sl) < $totalajax) { ?>
    <div style="clear:both"></div>
    <div class="taithemsp checkajax<?= $limit ?>" id="<?= $limit ?>">
        <a id="changetextmore">Tải thêm sản phẩm</a>
    </div>
    <div style="clear:both"></div>
<?php } ?>

