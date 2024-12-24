
<style>
    .checkoutleft{float:left;width:100%}
    .checkoutright{float:left;width:100%;margin-top:40px}
    .inputtrai{float:left;width:25%;color:#757575;margin-top:10px}
    .inputphai{float:left;width:75%;}
    .pad-contact{margin-bottom: 15px;}
    .inputphai input{width:100%;border:1px solid #e5e3e3;box-sizing: border-box;padding:10px;border-radius: 5px;float: left;}
    .inputphai textarea{height: 80px;padding-left:10px;width:100%;border:1px solid #e5e3e3;padding-top:10px;box-sizing: border-box;border-radius: 5px;font-family: Arial;}
    .selectform select{height: 25px;width:145px;border:1px solid #e5e3e3;float:left;color:#757575;margin-bottom:15px;}
    .pad-contact{margin-left:3%}

    .hinhthucthanhtoan{width:100%;float:left}

    .textnoidia{width:100%;padding:2%;border:1px solid #e5e3e3;display: none;box-sizing: border-box;background:#fff;}
    .textquocte{width:100%;padding:2%;border:1px solid #e5e3e3;display: none;box-sizing: border-box;background:#fff;}
    .textnhanhang{width:100%;padding:2%;border:1px solid #e5e3e3;box-sizing: border-box;background:#fff;}
    .viewdt{background: #C97819;transition: all .3s;color:#fff;border-radius: 5px;}
    .viewdt:hover{background: #B46C16}

    .dudk{display: none}
    .kdudk{display: none}
    .leftmid{display: none}
    .rightmid{width:100%;}
    .title-form a {text-transform: uppercase; font-size: 16px; color: #fb6b40;}
    .title-dh a {text-transform: uppercase; font-size: 16px; color: #fb6b40;}
    .price_tt{color: #C51D1D;font-size: 14px;}
    .colpayment{width: 33.33%;float: left;text-align: center;color:#6f6f6f;font-size: 17px;text-transform: uppercase;}
    .colpayment i{font-size: 22px;}
    .actpay{color:#C51D1D !important;}
    .mausole:nth-child(2n + 1) {background: white !important}
    .butstep{display: inline-block;padding:10px 20px;border:1px solid #C51D1D;color:#C51D1D;border-radius: 3px;transition: all .3s;cursor: pointer;}
    .butstep:hover{background:#C51D1D;color:#fff;transition: all .3s;}
    .delcart{color:#B3B3B3;font-size: 15px;cursor: pointer;display: inline-block;padding:5px 10px;transition: all .3s;border:1px solid transparent;float: left;}
    .delcart:hover{border:1px solid #B3B3B3;}
    @media(max-width: 770px){
        .infocart{width: 100% !important;}
        .infocheckout{width: 100% !important;}
        .mobilehienlen768{display:block !important;}
        .mobileandi768{display:none !important;}
        .colpayment{padding: 0px 10px;text-align: center;box-sizing: border-box;}
        .notetotalprice{width: 100% !important;padding: 0px 10px;box-sizing: border-box;margin-bottom: 10px;}
        .boxtotalprice{width: 100% !important;padding: 0px 10px;box-sizing: border-box;}
    }
</style>

<?php if (is_array($_SESSION['cart']) && count($_SESSION['cart']) > 0) { ?>
 
<div style="width: 100%;float: left;padding:20px;box-sizing: border-box;background:#f2f2f2;margin-top: 40px;">
    <div class="colpayment paymentstep1 actpay"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;&nbsp;<?=change_lang('Chi tiết đơn hàng','Detail Order')?></div>
    <div class="colpayment paymentstep2"><i class="fa fa-truck" aria-hidden="true"></i>&nbsp;&nbsp;<?=change_lang('Địa chỉ giao hàng','Ship Address')?></div>
    <div class="colpayment paymentstep3"><i class="fa fa-check" aria-hidden="true"></i>&nbsp;&nbsp;<?=change_lang('Xác nhận đặt hàng','Confirm Payment')?></div>
</div>
<div class="clear"></div>
    
    <div id="frmstep1" style="margin-bottom: 40px;">
        <div class="table-responsive" style="margin-top: 40px;">
            <table class="table table-bordered service-list" border="0" cellpadding="5px" cellspacing="1px" width="100%">

                <?php
                echo '<tr style="color:#111;background:#fbfbfb;height:60px">
                        <th style="text-align:left; text-transform:uppercase;padding-left:2%;";"><span style="color:#b3b3b3;font-size:15px;"> Sản phẩm </span></th>
                 
                        <th style="text-transform:uppercase;width:18%;"><span style="color:#b3b3b3;font-size:15px;">' . change_lang('Thành tiền', 'Price') . '</span></th>   
                    
                    </tr>';



                $max = count($_SESSION['cart']);
                $sum = 0;
                for ($i = 0; $i < $max; $i++) {
                    $pid = $_SESSION['cart'][$i]['productid'];
                    $idgia = $_SESSION['cart'][$i]['price'];
                    
                    $d->reset();
                    $sql = "select * from #_product where id = '".$pid."' order by stt";
                    $d->query($sql);
                    $info_pro = $d->fetch_array();


                    $price = $info_pro['gia'];
                    $q = $_SESSION['cart'][$i]['qty'];

                    $totaldetail = $price * $q;
                    $sum = $sum + $totaldetail;
                    $pname = get_product_name($pid);
                    if ($q == 0)
                        continue;
                    ?>
                    <tr id="<?= md5($pid) ?>" class="mausole" <?php echo 'style="background:#f5f5f5;border-bottom:1px solid #e4e4e4"'; ?>>
                        <td width="5%" style="border-left:none;" align="center">
                            <a href="javascript:del(<?= $pid ?>,'<?= md5($pid) ?>')">
                                <img src="assets/images/icon_del.png" border="0" />
                            </a>
                        </td>
                        <td width="5%" style="border-left:none; text-align:center;">
                            <?= $i+1 ?>
                        </td>
                        <td width="10%" style="border-left:none; text-align:center;">
                            <?= $info_pro['masp'] ?>
                        </td>
                        <td width="10%" style="border-left:none; text-align:center;padding:10px 0px 8px 0px">
                            <a href="<?= $info_pro['tenkhongdau'] ?>">
                                <img style="max-height: 50px;border: 1px solid #e4e4e4" src="<?= _upload_product1_l . get_product_image($pid) ?>"  alt="<?= $pname ?>" /> 
                            </a>
                        </td>
                        <td width="30%" style="border-left:none; text-align:left" class="mobileandi">
                            <span> 
                                <a href="<?= $info_pro['tenkhongdau'] ?>" style="color:black">
                                    <?= $pname ?>
                                </a> 
                            </span>
                        </td>
                        <td width="100%" style="border-left:none; text-align:center;margin-top:10px;" class="mobilehienlen">
                            <p style="margin-top:0%"> <?= $pname ?> </p>
                            <div class="clear"></div>
                            <p>
                            <div class="quantity buttons_added" style="text-align: center;float:left;margin:10px 0px;margin-left: 35%">
                                <a style="float: left;padding:10px 12px;width: 20px;background: #d0d0d0;color:#fff;border:none;cursor: pointer;text-align: center;" data-id="<?= $pid ?>" class="minus" data-price="<?= ($price) ? $price : 0 ?>">-</a>
                                <input style="float: left;padding:9px 0px 9px 20px;width: 30px;border:none;border-top:1px solid #d0d0d0;border-bottom: 1px solid #d0d0d0 " data-id="<?= $pid ?>"  type="number" step="1" min="" max="" name="product<?= $pid ?>" value="<?= $q ?>" size="2" title="Qty" class="input-text qty text" maxlength="3" readonly>
                                <a style="float: left;padding:10px 12px;width: 20px;background: #d0d0d0;color:#fff;border:none;cursor: pointer;text-align: center;" data-id="<?= $pid ?>" class="plus" data-price="<?= ($price) ? $price : 0 ?>">+</a>
                            </div>
                            <!-- $######### -->
                            </p><br><br>
                            <div class="clear"></div>
                            <p><?= change_lang('Đơn giá', 'Prices') ?> : <?= price_sp($price) ?>&nbsp;đ </p>
                        </td>
                        <td width="10%" align="center" class="mobileandi">
                            <?= price_sp($price) ?>
                        </td>
                        <td width="20%" align="center" class="mobileandi">
                            <!-- <input type="number" data-id="<?= $pid ?>" data-price="<?= (get_price($pid, $size)) ? get_price($pid, $size) : 0 ?>" name="product<?= $pid ?>" value="<?= $q ?>" class="change_qty" maxlength="3" size="2" style="text-align:center; border:1px solid #F0F0F0;width:40px;padding: 5px;" /> -->

                            <div class="quantity buttons_added" style="width:125px;margin:0 auto;">
                                <a style="float: left;padding:10px 8px;width: 20px;background: #d0d0d0;color:#fff;border:none;cursor: pointer;text-align: center;" data-id="<?= $pid ?>" class="minus" data-price="<?= ($price) ? $price : 0 ?>">-</a>
                                <input style="float: left;padding:9px 0px 9px 20px;width: 30px;border:none;border-top:1px solid #d0d0d0;border-bottom: 1px solid #d0d0d0 " data-id="<?= $pid ?>"  type="number" step="1" min="" max="" name="product<?= $pid ?>" value="<?= $q ?>" size="2" title="Qty" class="input-text qty text" maxlength="3" readonly>
                                <a style="float: left;padding:10px 8px;width: 20px;background: #d0d0d0;color:#fff;border:none;cursor: pointer;text-align: center;" data-id="<?= $pid ?>" class="plus" data-price="<?= ($price) ? $price : 0 ?>">+</a>
                                <div style="clear:both"></div>
                            </div>
                            <div style="clear:both"></div>
                        </td>                  
                        

                        <td width="15%" align="center" class="price_tt mobileandi">
                            <?= price_sp($totaldetail) ?>
                        </td> 

                    </tr>
                <?php } ?>

            </table>
            <div class="clear"></div>   

            <div style="width: 100%;margin-top: 20px;"> 
                <div class="notetotalprice" style="width: 68%;float: left;"></div>
                <div class="boxtotalprice" style="width: 30%;float: right;text-align: right;">
                    <span>Tổng tiền: </span><span id="totalcart" style="font-family:'chakrapetch-bold';color:#C51D1D;font-size: 20px;"> <?=number_format(get_order_total(),0,',','.')?> đ</span>
                </div>
            </div>    
            <div class="clear"></div>
            <div style="float: left;width: 100%;text-align: center;padding-top: 20px;border-top: 1px solid #f2f2f2;margin-top: 20px;margin-bottom: 40px;">
                <a class="butstep butstepback" href="javascript: window.history.go(-1)"><?=change_lang('Quay lại','Back')?></a>&nbsp;&nbsp;
                <a class="butstep butstep1"><?=change_lang('Bước tiếp theo','Next step')?></a>
            </div>
        </div>
    </div>
    <div class="clear"></div>
    <div id="frmstep2"></div>
    <div class="clear"></div>
    <div id="frmstep3"></div>
<?php
} else { ?>
  
    <p style="padding:20px;text-align:center;font-family:'chakrapetch-bold';font-size: 18px;">
        <img src="images/emptycart.png" alt="icon"><br>
        Giỏ hàng rỗng
    </p>
<?php } ?>
<script type="text/javascript">
    function del(pid,size,$color,$obj) {
        //alert($color); 
        var $x = $obj;
        $.ajax({
            url: "ajax/cart.php?type=remove_order",
            data: {id: pid,size:size,color:$color},
            type: "post",
            success: function (data) {
                $jdata = $.parseJSON(data);
                if($jdata.num > 0){    
                    $("#" + $obj).fadeOut(500);
                    setTimeout(function () {
                        $("#" + $obj).remove();
                    }, 800)
                    $('#totalcart').html($jdata.total);
                }else{
                    location.reload();
                }
                //$('#cartnumber').html($jdata.num);
                //updatePrice();
                //location.reload();
            }
        })             
    }
    function numberFormat(num, ext) {
        ext = (!ext) ? ' đ' : ext;
        return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") + ext;
    }
    function updatePrice() {
        $tt = 0;
        $(".price_tt").each(function () {
            $h = $(this).html().replace(/\./g, "");
            $tt += parseInt($h);

        })

        /*var ptgiam = document.getElementById('phamtram').value;
        if(ptgiam != 'loi'){
            $tiengiam = $tt * ptgiam / 100;
            $ttsaugiam = $tt - ($tt * ptgiam / 100);
            $(".last_tt2").html(numberFormat($ttsaugiam));
            $("#changegiamgia").html(numberFormat($tiengiam));
        }
        
        $(".last_tt").html(numberFormat($tt));*/
      
    }
    function price($val) {
        return parseInt($val.replace(/\./g, ""));
    }
    $(document).ready(function (e) {
        $(".quantity .plus").click(function(){
            $id = $(this).data("id");
            $input = $(this).parent().find(".qty")
            $num = parseInt($input.val());
            $input.val($num+1);
            $val = parseInt($input.val());
            if (parseInt($val) < 1) {
                $(this).val(1);
                $val = 1;
            }
            /*$root = $(this).parents("tr");
            $price = parseInt($(this).data("price"));
            if ($price < 1) {
                $price = 0;
            }
            $root.find("td").last().html(numberFormat(parseInt($val * $price)));
            updatePrice();*/

            $.ajax({
                url: "ajax/cart.php?type=update_qty",
                data: {"qty": $val, id: $id},
                type: "post",
                success: function (data) {
                    $jdata = $.parseJSON(data);
                    //alert($jdata.id);
                    //updatePrice();
                    $(".price_tt"+$jdata.id).html($jdata.tamtinh);
                    $("#totalcart").html($jdata.total);
                    //$("#changegiamgia").html($jdata.sale);
                }
            }) 
            return false;
        })
        $(".quantity .minus").click(function(){
            $id = $(this).data("id");
            $input = $(this).parent().find(".qty")
            $num = parseInt($input.val());
            
            if($num > 1){
               $input.val($num-1);
               $val = parseInt($input.val());
               if (parseInt($val) < 1) {
                    $(this).val(1);
                    $val = 1;
                }
           /* $root = $(this).parents("tr");
            $price = parseInt($(this).data("price"));
            if ($price < 1) {
                    $price = 0;
                }
                $root.find("td").last().html(numberFormat(parseInt($val * $price)));
                updatePrice();*/

            $.ajax({
                    url: "ajax/cart.php?type=update_qty",
                    data: {"qty": $val, id: $id},
                    type: "post",
                    success: function (data) {
                        $jdata = $.parseJSON(data);
                        //alert($jdata.tamtinh);
                        //updatePrice();
                        $(".price_tt"+$jdata.id).html($jdata.tamtinh);
                        $("#totalcart").html($jdata.total);
                        //$("#changegiamgia").html($jdata.sale);
                    }
                })     
            }else{
                alert('Nhập số lượng phải lớn hơn 0');
                return false;
            }
        })


    });

    $(document).ready(function() {
        $('.butstep1').click(function(){
            $.ajax({
                url: "ajax/payment.php",
                data: {act:'callfrmstep2'},
                type: "post",
                success: function (data) {
                    //$jdata = $.parseJSON(data);
                    //alert(data);
                    $('.colpayment').removeClass('actpay');
                    $('.paymentstep2').addClass('actpay');
                    $("#frmstep1").hide();
                    $("#frmstep2").html(data);
                }
            })
        })
    });
</script>
