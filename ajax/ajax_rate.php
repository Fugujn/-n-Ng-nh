<?php
include ("configajax.php");

$product_id = $_POST['product_id'];
$value = $_POST['value'];
$id_user = $_POST['id_user'];
$tenkh_rate = $_POST['tenkh_rate'];
$noidungkh_rate = mysql_escape_string($_POST['noidungkh_rate']);

$sql_lanxem = "update #_product SET rate=rate+'".$value."', luot_rate=luot_rate+1  WHERE id ='" . $product_id . "'";
$d->query($sql_lanxem);


$data_answer['ten_vi'] = $tenkh_rate;
$data_answer['noidung_vi'] = $noidungkh_rate;
$data_answer['product_id'] = $product_id;
$data_answer['rate'] = $value;
$data_answer['id_user'] = $id_user;
$data_answer['active'] = 0;
$data_answer['type'] = 'rate-comment';
$data_answer['hienthi'] = 1;
$data_answer['ngaytao'] = time();

$d->setTable("comment");
$d->insert($data_answer);

$d->reset();
$sql = "select * from #_comment where type = 'rate-comment' and product_id = '".$product_id."' order by ngaytao desc";
$d->query($sql);
$showform_detail = $d->result_array();
?>

<?php for($i = 0 ; $i < count($showform_detail);$i++) { 
    $d->reset();
    $sql = "select * from #_member where hienthi = 1 and id = '".$showform_detail[$i]['id_user']."' order by ngaytao desc";
    $d->query($sql);
    $member_comment = $d->fetch_array();
    ?>
    <div class="traloi_ratecon">
        <div class="thongtintren_rate">
            <div class="info_user">
                <p style="font-weight: bold;font-size:13px;color:#5f5f5f;float:left;margin-top: 5px;">
                    <?php for($j = 0 ; $j < $showform_detail[$i]['rate']; $j++) { ?>
                        <img src="assets/js/rateit/scripts/star-gold35.png" style="float:left;width: 25px;margin-top:-3px">
                    <?php } ?>
                </p>
                <p style="font-size:12px;color:#6d6d6d;float:right;margin-right: 10px;">
                    Ngày : <?= date('h:i:m d/m/Y',$showform_detail[$i]['ngaytao']) ?>
                </p>
                <div style="clear:both;"></div>
                <p style="font-size:13px;color:#6d6d6d;float:left;margin-right: 10px;width: 100%;">
                    Bởi <?= $member_comment['name'] ?> 
                </p>
                <div style="clear:both;"></div>
            </div>
        </div>
        <div style="clear:both"></div>
        <div class="noidung_traloi">
            <p style="">
                <?= $showform_detail[$i]['noidung_vi'] ?>
            </p>
        </div>
    </div>
    <div style="clear:both"></div>
<?php } ?>