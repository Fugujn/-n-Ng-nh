<?php
include ("configajax.php");
?>
<?php if($_POST['fullname'] == '' || $_POST['phone'] == '' || $_POST['address'] == ''){

    //$str = "<span style='color:red'>Vui lòng nhập đầy đủ thông tin còn thiếu</span>";
    echo 1;
}else{
$d->reset();
$sql = "select * from table_time where type = 'noi-dia' ";
$d->query($sql);
$noidia = $d->result_array();

$d->reset();
$sql = "select * from table_time where type = 'nhan-hang' ";
$d->query($sql);
$nhanhang = $d->result_array();
?>
<script>
    $(document).ready(function () {
        $('.input1').click(function () {
            $(".textnhanhang").slideToggle();
            $(".textquocte").hide();
            $(".textnoidia").hide();
        });
        $('.input2').click(function () {
            $(".textnoidia").slideToggle();
            $(".textquocte").hide();
            $(".textnhanhang").hide();
        });
        $('.input3').click(function () {
            $(".textquocte").slideToggle();
            $(".textnoidia").hide();
            $(".textnhanhang").hide();
        });
    });
</script>
<?php 
    $_SESSION['payc']['fullname'] = strip_tags(addslashes($_POST['fullname'])) ; 
    $_SESSION['payc']['phone'] = strip_tags(addslashes($_POST['phone'])); 
    $_SESSION['payc']['address'] = strip_tags(addslashes($_POST['address'])); 
   // $_SESSION['payc']['city'] = $_POST['city'] ; 
    ///$_SESSION['payc']['district'] = $_POST['district'] ;  
    //$_SESSION['payc']['ward'] = $_POST['ward'] ;
    $_SESSION['payc']['email'] = strip_tags(addslashes($_POST['email']));
    $_SESSION['payc']['noidung'] = strip_tags(addslashes($_POST['noidung']));

    /*$d->reset();
    $sql = "select * from #_product_list where type = 'quanhuyen1' and com = 2 and id_parent = ".$_POST['city']." and id='" . $_POST['district'] . "'";
    $d->query($sql);
    $rs_prox = $d->fetch_array();
    $_SESSION['payc']['priceship'] = $rs_prox['gia'];*/
?>
<style type="text/css">
    @media(max-width: 770px){
        .infoleft{width: 100% !important;margin-bottom: 20px;}
        .inforight{width: 100% !important}
        .textsale{width: 100% !important; margin-bottom: 10px;}
        .salecode{width: 100% !important;}
    }
    
</style>
<div style="width: 100%;float: left;margin-top: 40px;">
    <div class="infoleft" style="width: 50%;float: left;background:#f2f2f2;padding:20px;box-sizing: border-box;">
        <p style="text-transform: uppercase;color:#C51D1D;font-size: 16px;margin-bottom: 20px;"><span><?= change_lang('Thông tin thanh toán', 'Billing Information') ?></span></p>
        <p style="color:#757575;margin:10px 0px;"><span style="font-family:'chakrapetch-bold';"><?= change_lang('Họ và tên', 'Full name') ?></span> : <?=$_POST['fullname']?></p>
        <p style="color:#757575;margin:10px 0px;"><span style="font-family:'chakrapetch-bold';"><?= change_lang('Điện thoại', 'Phone') ?></span> : <?=$_POST['phone']?></p>
        <p style="color:#757575;margin:10px 0px;"><span style="font-family:'chakrapetch-bold';">Email</span> : <?=$_POST['email']?></p>
        <p style="color:#757575;margin:10px 0px;"><span style="font-family:'chakrapetch-bold';"><?= change_lang('Địa chỉ', 'Adress') ?></span> : <?=$_POST['address']?></p>
        <!-- <p style="color:#757575;margin:10px 0px;"><span style="font-family:'chakrapetch-bold';"><?= change_lang('Tỉnh / Thành phố', 'Province / City') ?></span> : <?=get_add($_POST['city'])['ten_'.$lang]?></p>
        <p style="color:#757575;margin:10px 0px;"><span style="font-family:'chakrapetch-bold';"><?= change_lang('Quận / Huyện', 'District') ?></span> : <?=get_add($_POST['district'])['ten_'.$lang]?> , phường <?=$_POST['ward']?></p> -->
        <p style="color:#757575;margin:10px 0px;"><span style="font-family:'chakrapetch-bold';"><?= change_lang('Ghi chú', 'Notes') ?></span> : <?=$_POST['noidung']?></p>

        <p style="text-transform: uppercase;color:#C51D1D;font-size: 16px;margin-bottom: 20px;margin-top: 30px;"><span><?= change_lang('Hình thức thanh toán', 'Payments') ?></span></p>

        <div class="hinhthucthanhtoan" style="width:100%;float:left;margin-top:20px">
            <div class="inputhinhthuc" style="width:100%;float:left;margin-bottom:20px">
                <input type="radio" name="cast" id="cast1" value="nhan-hang" class="input1"  style="float:left;" checked="">
                <img src="assets/images/cast.png" style="width:25px;height:16px;float:left;margin:0px 5px"/>
                <?= change_lang('Thanh toán khi nhận hàng', 'Payment on delivery') ?>
            </div>
            <div class="textnhanhang" style="margin-bottom:20px;width:100%;float:left">
                <p><?= $nhanhang[0]['noidung_' . $lang] ?></p>
            </div>
            <div class="clear"></div>
            <div class="inputhinhthuc" style="width:100%;float :left;margin-bottom:20px">
                <input type="radio" name="cast" id="cast2" value="noi-dia" class="input2"  style="float:left;">
                <img src="assets/images/atmnoidia.jpg" style="width:25px;float:left;margin:0px 5px"/>
                <?= change_lang('Thanh toán thẻ ngân hàng', 'Domestic card payments') ?>
            </div>
            <div class="textnoidia" style="margin-bottom:20px;width:100%;float:left">
                <p><?= $noidia[0]['noidung_' . $lang] ?></p>
            </div>
            <div class="clear"></div>
            
        </div>
    </div>
    <div class="inforight" style="width: 50%;float: left;padding:0px 20px;box-sizing: border-box;">
        <p style="text-transform: uppercase;color:#C51D1D;font-size: 16px;margin-bottom: 20px;"><?= change_lang('Thông tin đơn hàng', 'Infomation Cart') ?></p>
        
        <div class="table-responsive" style="margin-top: 40px;">
            <table class="table table-bordered service-list" border="0" cellpadding="5px" cellspacing="1px" width="100%">

                <?php
                echo '<tr style="color:#111;background:#fbfbfb;height:40px">
                    <th style="text-align:left; text-transform:uppercase;width:58%;padding-left:2%;";"><span style="color:#333;font-family:chakrapetch-bold;"> Sản phẩm </span></th>
                    
                    <th align="left" style="text-transform:uppercase;width:18%;padding-left:2%;"><span style="color:#333;font-family:chakrapetch-bold;">' . change_lang('Đơn giá', 'Price') . '</span></th>
                    <th style="text-transform:uppercase;width:18%;"><span style="color:#333;font-family:chakrapetch-bold;">' . change_lang('Thành tiền', 'Total') . '</span></th>   
                    
                    </tr>';



                $max = count($_SESSION['cart']);
                $sum = 0;
                for ($i = 0; $i < $max; $i++) {
                    $pid = $_SESSION['cart'][$i]['productid'];
                    $size = $_SESSION['cart'][$i]['size'];
                    $color = $_SESSION['cart'][$i]['color'];
                    $color1 = $_SESSION['cart'][$i]['color'];
                    $q = $_SESSION['cart'][$i]['qty'];

                    if ($q == 0)
                        continue;
                    ?>
                    <tr id="<?= md5($pid) ?>" class="mausole" <?php echo 'style="background:#f5f5f5;border-bottom:1px solid #e4e4e4"'; ?>>
                        <td width="60%" style="border-left:none; text-align:center;padding:10px 10px 8px 10px">
                            
                            <div style="float:left;width: 25%;">
                                <img style="width: 100%;border: 1px solid #e4e4e4" onerror='this.src="images/no-image.jpg"' src="<?=_upload_thumb_l.get_product_image($pid)?>"  alt="<?=get_product_name($pid)?>" style="float:left;"/> 
                            </div>
                            <div style="float:right;width:71%;padding:0px 15px;text-align: left;box-sizing: border-box;"> 
                                <p><a style="color:#C51D1D"><?=get_product_name($pid)?></a></p>
                                <!-- <p style="font-style: italic;font-size: 13px;margin:5px 0px"><?=get_product_size($size)['ten']?></p>
                                <?php if($color != ''){
                                    $sum1 = 0;
                                    $color = ltrim($color,',');
                                    $tagbv = explode(',', $color);
                                    for ($j=0; $j < count($tagbv); $j++ ) {
                                        $sum1 = $sum1 + get_product_top($tagbv[$j])['gia'];
                                ?>
                                <p style="font-size: 13px;">+ <?=get_product_top($tagbv[$j])['ten']?></p>
                                                        
                                <?php } } ?> -->
                             </div>
                        </td>
                        <td style="width:100%;float:left;border-left:none; text-align:left;margin-top:10px;">
                           
                            <p><?php 
                                $price1 = get_price($pid);
                                $price2 = get_product_size($size)['gia'];
                                $price3 = $sum1;
                                $price = $price1 + $price2 + $price3;
                            ?><?=number_format($price,0,',','.')?>&nbsp;đ</p>
                            <div class="clear"></div>
                            
                            <p style="margin-top:10px;color:#6B6B6B"><?= change_lang('Số lượng', 'Quantity')?> <?=$q?></p>
                        </td>
                        
                        <td width="15%" align="center" class="price_tt" id="price_tt_<?=$pid?>">

                           <?=number_format($price*$q,0,',','.')?> đ
                        </td> 
                    </tr>
                <?php } ?>

            </table>
            <div class="clear"></div>   
           
            <div style="width: 100%;margin-top: 20px;"> 
                
                <div style="width: 100%;float: right;text-align: right;">
                    <span><?=change_lang('Tổng tiền','Total Price')?> : </span><span id="totalcart" style="color:#C51D1D;font-size: 16px;"> <?=number_format(get_order_total(),0,',','.')?> đ</span>
                </div>
                <!-- <div class="clear"></div>
                <p style="float: right;margin-top: 20px;border-top:1px solid #f2f2f2;padding-top: 10px;width: 100%;margin-bottom: 15px;"><span><?=change_lang('Phí giao hàng','Fee ship')?> : </span><span id="shipcart" style="color:#C51D1D;font-size: 16px;"> <?=number_format($rs_prox['gia'],0,',','.')?> đ</span>
                </p> -->
                <!-- <div class="clear"></div>
                <p style="float: right;width: 100%;">
                    <span class="textsale" style="display: inline-block;float: left;padding-top: 10px;padding-right: 10px;width: 30%;box-sizing: border-box;"><?=change_lang('Nhập mã giảm giá','Input your code')?></span> 
                    <input type="text"  class="form-control" name="salecode" id="salecode" placeholder="" value="" style="width:50%;float: left;background:#f2f2f2;border-bottom: none;padding:0px 5px;box-sizing: border-box;">
                    <a class="butstep salecodeuse" style="padding:8px 20px;margin-left: 10px;float: right;"><?=change_lang('Áp dụng','Use')?></a>
                </p> -->
                <div class="clear"></div>
                <p id="info_order" style="margin-top: 10px;"></p>
                <div class="clear"></div>
                <p style="float: right;margin-top:20px;border-top:1px solid #f2f2f2;padding-top: 20px;width: 100%;margin-bottom: 15px;"><span><?=change_lang('Tổng cộng','Total')?> : </span><span id="totalallcart" style="color:#C51D1D;font-size: 18px;font-family:'chakrapetch-bold';"> <?=number_format(get_order_total(),0,',','.')?> đ</span>
    
            </div>    
        </div>

    </div>
    <div class="clear"></div>
    <div style="float: left;width: 100%;text-align: center;margin-top: 40px;margin-bottom: 40px;">
        <a class="butstep butstepback2"><?=change_lang('Quay lại','Back')?></a>&nbsp;&nbsp;
        <a class="butstep butstep3" id="butstep3" onclick="callpayment()"><?=change_lang('Thanh toán','Payment')?></a>
    </div>
</div>

<script type="text/javascript">
    function callpayment(){
        $('.butstepback2').css({"opacity":"0","cursor":"not-allowed"});
        $('.butstep3').css({"opacity":"0.5","cursor":"not-allowed"});
        $('.butstep3').html("<?=change_lang('Đang xử lý ...','Loading ...')?>");
        $('#butstep3').removeAttr('onclick');
        if (document.getElementById('cast1').checked) {
            cast = document.getElementById('cast1').value;
        }else if(document.getElementById('cast2').checked){
            cast = document.getElementById('cast2').value;
        }
        $.ajax({
            url: "ajax/payment2.php",
            data: {act:'callcheck',cast:cast},
            type: "post",
            success: function (data) {
                if(data == 1){
                    //$('.butstep3').css({"opacity":"1","cursor":"pointer"});
                    //$('#butstep3').attr('onclick', 'callpayment()');
                    //$('.butstep3').html('<?=change_lang('Thanh toán','Payment')?>');
                    window.location.href = 'checkout.html';
                }
            }
        }) 
    }
    $(document).ready(function() {
        $('.butstepback2').click(function(){
            $.ajax({
                url: "ajax/payment.php",
                data: {act:'callfrmstep2'},
                type: "post",
                success: function (data) {
                    //$jdata = $.parseJSON(data);
                    //alert(data);
                    $('.colpayment').removeClass('actpay');
                    $('.paymentstep2').addClass('actpay');
                    $("#frmstep2").html(data);
                    $("#frmstep3").html('<span></span>');
                }
            })
        })  

        /*$('.salecodeuse').click(function(){
            var giatri = document.getElementById('salecode').value;
            //alert(giatri);
            $.ajax({
                url: "ajax/xuly.php",
                data: {act:'testcode',gt:giatri},
                type: "post",
                success: function (data) {
                    //alert(data);
                    $jdata = $.parseJSON(data);
                    //alert(data);
                    if($jdata.err == 1){
                        $('#info_order').html($jdata.codes);
                        $('#totalallcart').html($jdata.totalprice);
                    }
                    if($jdata.err == 0){
                        $('#info_order').html($jdata.codes);
                        $('#totalallcart').html($jdata.totalprice);
                    }
                    
                }
            })
        })*/      
    });
</script>
<?php } ?>