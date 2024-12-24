<?php
session_start();
if ($_SESSION['mem_login']['email'] != '') {

$d->reset();
$sql = "select * from #_member where user = '" . $_SESSION['mem_login']['email'] . "' order by id desc ";
$d->query($sql);
$taikhoan = $d->fetch_array();

$d->reset();
$sql = "select * from #_donhang where iduser = '" . $taikhoan['id'] . "' order by ngaytao desc ";
$d->query($sql);
$showorder = $d->result_array();

$tongdon = count($showorder);
$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
$url = getCurrentPageURL();
$maxR = 15;
$maxP = 4;
$paging = paging_home($showorder, $url, $curPage, $maxR, $maxP);
$showorder = $paging['source'];

?>

<style>
    .ordercon{width:100%;float:left;padding-bottom: 20px;margin-bottom: 20px;border-bottom:1px solid #e8e8e8;}
    .ordercon p{margin-bottom: 10px;line-height: 22px;}
    .ordercon a{color:#C59A3E;font-family:'opensans-bold'}
    .orderleft{float:left;width:50%}
    .tieude p{margin-bottom:0px}
    .tieude{width: 100%;float:left;background:#f3f3f3;}
    .tieude:nth-child(2n){background:white;}
    .infoorder{width: 100%;float:left;margin-top:10px;}
    
    .col-cont{padding: 0;}
    .thongtintk{border: 1px solid #f4f4f4;width: 100%;float:left;}
    .thongtintk li {padding: 10px;border-bottom: 1px solid #f4f4f4;transition: .2s all;list-style: none}
    .thongtintk li:hover{background:#d2effb;padding-left: 15px;}
    /*.thongtintk li:last-child{border-bottom: none;}*/
    .thongtintk li a{color:#515151;font-size: 15px;}
    .acttk{background: #d2effb;}
    .show_array{width: 100%;float:left;margin:10px 0px;border-bottom: 1px solid silver;padding-bottom: 10px}
    .show_array:last-child{border-bottom: none;padding-bottom: 10px}
    .left_array{width: 60%;float:left;text-align: left;}
    .right_array{width: 40%;float:left;text-align: right}
    .orderdetail{display: none}
    
    .orderindex{width: 100%;float:left;margin-top:10px;}
    .orderindex p{float:left;margin-right: 10px}
    .orderindex a{color:red;}
</style>
<script>
    $(document).ready(function (e) {
        $('.show_orderdetail').click(function () {
            $(".orderdetail").slideToggle(400);
        });
    });

    function xoabaiviet(id){
        $.ajax({
            url: "ajax/del_new.php",
            data: {id: id},
            type: "post",
            success: function (data) {
                alert('Xóa bài viết thành công !');
                location.reload(true);
            }
        });
    }

    function editnew(id){
        $.ajax({
            url: "ajax/edit_new.php",
            data: {id: id},
            type: "post",
            success: function (data) {
                setTimeout(function () {
                    window.location = "user.html&act=editnew";
                }, 500);
            }
        });
    }

    function showdetail(id){
        $('.showkhung' + id).slideToggle(400);   
    }
</script>

<div class="boxcontent" style="padding:0px 10px;width: 100%;float: left;box-sizing: border-box;">       
    <div class="titleaccount" style="margin-bottom: 25px;border-bottom: 1px solid #e8e8e8;padding-bottom: 15px">
        <p style="font-size: 16px;color:#CDA53D;">
            <i class="fa fa-shopping-cart" aria-hidden="true" style="margin-right: 5px"></i>
            <?=change_lang('Đơn hàng của bạn','Your Order')?>
        </p>
    </div>
    <div style="clear:both"></div>
    <div class="infoorder">
        <?php
        if (count($showorder) > 0) {
            for ($i = 0; $i < count($showorder); $i++) {

                $d->reset();
                $sql = "select * from #_icon where ten_vi = '".$showorder[$i]['magiamgia']."'";
                $d->query($sql);
                $ptgiamgia = $d->fetch_array();
                ?>
                <div class="ordercon">
                    <div class="orderleft">
                        <p><?=change_lang('Mã số hóa đơn','Order Code')?> : <a><?= $showorder[$i]['madonhang'] ?></a></p>
                        <p><?=change_lang('Trạng thái','Status')?> : <a><?= date('H:i:s d/m/Y', $showorder[$i]['ngaytao']) ?> - <?= tinhtrang($showorder[$i]['trangthai']) ?></a></p>
                        <p><?=change_lang('Mã giảm giá','Sale Code')?> : <a><?= $showorder[$i]['magiamgia'] ?></a></p>
                    </div>
                    <div class="orderleft">
                        <p><?=change_lang('Họ tên','Fullname')?> : <a><?= $showorder[$i]['hoten'] ?></a></p>
                        <p><?=change_lang('Điện thoại','Phone')?> : <a><?= $showorder[$i]['dienthoai'] ?></a></p>
                        <p><?=change_lang('Địa chỉ','Address')?> : <a><?= $showorder[$i]['diachi'] ?></a></p>
                    </div>
                    <div style="clear:both"></div>
                    <div class="orderindex" style="width: 100%">
                        <p><?=change_lang('Tổng tiền','Total Prices')?> : <a><?= price_sp($showorder[$i]['tonggia']) ?></a></p>
                        <?php if($showorder[$i]['magiamgia'] != '') { ?>
                            <p><?=change_lang('Mã giảm','Sale Code')?> : - <a><?= price_sp($showorder[$i]['tonggia'] * $ptgiamgia['gia'] / 100) ?></a></p>
                        <?php } ?>
                        <?php if($showorder[$i]['ship']!= ''){?>
                        <p><?=change_lang('Phí giao hàng','Fee ship')?> : <a><?= price_sp($showorder[$i]['ship']) ?></a></p>
                        <?php } ?>
                        <p><?=change_lang('Thanh toán','Payment')?> : <a><?= price_sp(($showorder[$i]['tonggia'] - ($showorder[$i]['tonggia'] * $ptgiamgia['gia'] / 100))+$showorder[$i]['ship']) ?></a></p>
                    </div>
                    <div style="clear:both"></div>
                    <p style="float:left;cursor: pointer;margin-top:10px;color:#ababab" onclick="showdetail('<?= $i ?>')">
                        <?=change_lang('Xem chi tiết','View detail')?>
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </p>
                    <div style="clear:both"></div>
                    <div style="clear:both"></div>
                    <div class="orderdetail showkhung<?= $i ?>">
                        <div class="tieude" style="width:100%;float:left;margin-top:20px">
                            <div class="hinhanh" style="width:10%;float:left;text-align:center">
                                <p style="line-height:30px;">Stt</p>
                            </div>
                            <div class="hinhanh" style="width:15%;float:left;text-align:center">
                                <p style="line-height:30px;"><?= change_lang('Hình ảnh', 'Images') ?></p>
                            </div>
                            
                            <div class="ten" style="width:35%;float:left;text-align:left">
                                <p style="line-height:30px;"><?= change_lang('Tên', 'Title') ?></p>
                            </div>
                            <div class="gia" style="width:20%;float:left;text-align:center">
                                <p style="line-height:30px;"><?= change_lang('Đơn giá', 'Prices') ?></p>
                            </div>
                            <div class="tonggia" style="width:20%;float:left;text-align:center">
                                <p style="line-height:30px;"><?= change_lang('Tổng giá', 'Total Prices') ?></p>
                            </div>
                        </div>
                        <?php
                        $d->reset();
                        $sql = "select * from #_donhang_detail where id_nguoimua = '" . $showorder[$i]['iduser'] . "' and id_order = '".$showorder[$i]['id']."' ";
                        $d->query($sql);
                        $showorderdetail = $d->result_array();
                        for ($j = 0; $j < count($showorderdetail); $j++) {
                    
                            $pid = $showorderdetail[$j]['id_product'];
                            $size = $showorderdetail[$j]['size'];
                            $color = $showorderdetail[$j]['color'];
                            $q = $showorderdetail[$j]['soluong'];

                            ?>
                            <div class="tieude" style="width:100%;float:left;">
                                <div class="hinhanh" style="width:10%;float:left;text-align:center;padding:10px 0px">
                                    <p style="line-height:22px;"><?= $j+1 ?></p>
                                </div>
                                <div class="hinhanh" style="width:15%;float:left;text-align:center;padding:5px;box-sizing: border-box;">
                                    <p>
                                        <img onerror='this.src="images/no-image.jpg"' src="<?=_upload_thumb_l.get_product_image($pid)?>" style="max-width: 100%;height: auto;"/>
                                    </p>
                                </div>
                                <div style="width:35%;float:left;padding:5px;box-sizing: border-box;">
                                    <p><a style="color:#AE7900"><?=get_product_name($pid)?></a></p>
                                    <p style="font-style: italic;font-size: 13px;margin:5px 0px"><?=get_product_size($size)['ten']?></p>
                                    <?php if($color != ''){
                                        $sum1 = 0;
                                        $color = ltrim($color,',');
                                        $tagbv = explode(',', $color);
                                        for ($k=0; $k < count($tagbv); $k++ ) {
                                            $sum1 = $sum1 + get_product_top($tagbv[$k])['gia'];
                                    ?>
                                    <p style="font-size: 13px;">+ <?=get_product_top($tagbv[$k])['ten']?></p>
                            
                                    <?php } } ?>
                                </div>
                               
                                <div class="gia" style="width:20%;float:left;text-align:center;padding:10px 0px">
                                    
                                    <?php 
                                        $price1 = get_price($pid);
                                        $price2 = get_product_size($size)['gia'];
                                        $price3 = $sum1;
                                        $price = $price1 + $price2 + $price3;
                                    ?>
                                    <p style="margin-top:10px;color:#6B6B6B"><?=number_format($price,0,',','.')?>&nbsp;đ </p>
                                    <p style="line-height:22px;"><?= change_lang('SL', 'Qu') ?> : <?= $q ?></p>
                                </div>
                               
                                <div class="tonggia" style="width:20%;float:left;text-align:center;padding:10px 0px">
                                    <p style="margin-top:10px;color:#6B6B6B"><?=number_format($price*$q,0,',','.')?> đ</p>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div style="clear:both"></div>
                </div>
            <?php } ?>
        <?php } else { ?>
            <p>Bạn chưa có đơn hàng nào</p>
        <?php } ?>
    </div>
    <div class="clear"></div>
    <div class="phantrang" style="margin-top: 20px;"><?= $paging['paging'] ?></div>
    
</div>


<?php
} else {
    transfer("Bạn chưa đăng nhập !", "./");
}
?>