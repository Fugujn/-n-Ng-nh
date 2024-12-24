<?php
if ($_REQUEST['command'] == 'delete' && $_REQUEST['pid'] > 0) {
    remove_product($_REQUEST['pid'], $_REQUEST['size']);
} else if ($_REQUEST['command'] == 'clear') {
    unset($_SESSION['cart']);
} else if ($_REQUEST['command'] == 'update') {
    $max = count($_SESSION['cart']);
    for ($i = 0; $i < $max; $i++) {
        $pid = $_SESSION['cart'][$i]['productid'];
        $q = intval($_REQUEST['product' . $pid]);
        if ($q > 0 && $q <= 999) {
            $_SESSION['cart'][$i]['qty'] = $q;
        } else {
            $msg = 'Some proudcts not updated!, quantity must be a number between 1 and 999';
        }
    }
}
?>
<script language="javascript">
    function del(pid, $obj) {
        var $x = $obj;
        swal({
            title: "Thông báo !",
            text: "Bạn có muốn xóa sản phẩm này không?",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Đồng ý",
            cancelButtonText: "Không đồng ý",
            closeOnConfirm: false,
            closeOnCancel: false},
                function (isConfirm) {
                    if (isConfirm) {
                        $.ajax({
                            url: "ajax/cart.php?type=remove_order",
                            data: {id: pid},
                            type: "post",
                            success: function (data) {
                                $("#" + $obj).remove();
                                updatePrice();

                            }

                        })
                        swal("Xóa", "Xóa thành công", "success");

                    } else {
                        swal("Hủy xóa", "Đã hủy xóa", "error");
                    }
                });
    }
    function clear_cart() {
        if (confirm('This will empty your shopping cart, continue?')) {
            document.form1.command.value = 'clear';
            document.form1.submit();
        }
    }
    function update_cart() {
        document.form1.command.value = 'update';
        document.form1.submit();
    }

    function printlist(){
        window.print();
    }
</script>
<style>
    .mausole:nth-child(2n + 1) {background: white !important}
    .leftmid{display: none}
    .rightmid{width: 100%;}

    @media print {
        .banner{display: none !important;}
        .menuprint{display: none !important;}
        .img-res{display: none !important;}
        .logodoitac1{display: none !important;}
        footer{display: none !important;}
        .buttonmuathem{display: none !important;}
    }
</style>
<div class="box_content">
    <div class="content" style="width:100%;float:left;margin-top:20px;font-family: Arial">

        <form name="form1" method="post" action="checkout.html">
            <div class="infocheckout" style="width:96%;float:left;padding:2%;box-shadow: 0px 0px 15px 0px #ececec">
                <div class="box-form" style="width:100%;float:left">
                    <div class="checkoutleft">
                        <div class="title-form" style="margin-bottom:20px">
                            <i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 5px;color:#35c853;font-size: 18px"></i>
                            <a style="font-size:14px;font-weight: bold;color:#35c853"><?= change_lang('Thông tin khách hàng', 'Billing Information') ?></a>
                        </div>

                        <div class="pad-contact" style="width: 49%;margin-right: 2%;float:left">
                            <div class="inputphai">
                                <input type="text" class="form-control" name="hoten" id="hoten" placeholder="<?= change_lang('Họ và tên', 'Full name') ?>" required="required">
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="pad-contact" style="width: 49%;margin-right: 0%;float:left">
                            <div class="inputphai">
                                <div style="padding-left: 0px;width: 100%">
                                    <input type="tel" pattern="[0][0-9]{9,10}" min="10" max="13" class="form-control" name="dienthoai" id="dienthoai" placeholder="<?= change_lang('Điện thoại', 'Phone') ?>" value="" required="required">
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div style="clear: both;"></div>
                        <div class="pad-contact" style="width: 49%;margin-right: 2%;float:left">
                            <div class="inputphai">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="">
                            </div>
                            <div class="clear"></div>
                        </div>
                        
                        <div class="thongtinform" style="width: 49%;margin-right: 0%;float:left">
                            <div class="pad-contact" >
                                <div class="inputphai" style="">
                                    <input type="text"  class="form-control" name="diachi" id="diachi" placeholder="<?= change_lang('Địa chỉ', 'Adress') ?>"  required="required">
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                        <div style="clear: both;"></div>
                        <div style="clear: both;"></div>
                        <div class="thongtinform" style="margin-top:20px">
                            <div class="pad-contact" style=";width: 100%;float:left">
                                <div class="inputphai" style="">
                                    <textarea style="" name="noidung" id="noidung" class="form-control"  placeholder="<?= change_lang('Ghi chú', 'Content') ?>"></textarea>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div style="clear: both;"></div>
                        </div>
                        <div style="clear: both;"></div>
                        
                    </div>
                    <div class="clear"></div>
                    
                </div>
            </div>
            <div class="infocart" style="width:96%;float:left;margin-top:20px;padding:2%;box-shadow: 0px 0px 15px 0px #ececec">
                <input type="hidden" name="pid" />
                <input type="hidden" name="command" /> 
                <?php if (is_array($_SESSION['cart'])) { ?>
                    <div class="table-responsive">
                        <table class="table table-bordered service-list" border="0" cellpadding="5px" cellspacing="1px" style="font-size:12px;" width="100%">

                            <?php
                            echo '<tr  style="font-weight:bold;color:#111;border-top:1px solid #e4e4e4;border-bottom:1px solid #e4e4e4;height:30px">
                                <th align="center" style="border-left: none"></th>
                                <th style="text-align:center;  text-transform:uppercase;">' . change_lang('STT', 'Images') . '</th>
                                <th style="text-align:center;  text-transform:uppercase;">' . change_lang('Mã', 'Images') . '</th>
                                <th style="text-align:center; text-transform:uppercase;">' . change_lang('Photo', 'Name product') . '</th>
                                <th style="text-align:center; text-transform:uppercase;">' . change_lang('Diễn dải', 'Name product') . '</th>
                                <th align="center" style="text-transform:uppercase;" class="mobileandi">' . change_lang('Đơn giá', 'Price') . '</th>
                                <th align="center" style="text-transform:uppercase;" class="mobileandi">' . change_lang('Số lượng', 'Number') . '</th>
                                
                                <th align="center" style="text-transform:uppercase;" class="mobileandi">' . change_lang('Thành tiền', 'Amount') . '</th>   
                                
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
                                    <td  style="border-left:none; text-align:left;margin-top:10px;padding-left:20%;width: 80%;" class="mobilehienlen">
                                        <p style="margin-top:0%"> <?= $pname ?> </p>
                                        <div class="clear"></div>
                                        <p>
                                        <div class="quantity buttons_added" style="text-align: center;float:left;margin:10px 0px;">
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
                    </div>
                    <div class="total-order" style="width:100%;float:left;margin:20px 0px;text-align: right;">
                        <b style="margin-right:30px;font-size: 16px;"><?= change_lang('Tổng tiền', 'Total') ?> : <span class="last_tt"><?= price_sp($sum) ?></span></b>
                    </div> 
                    <div class="clear"></div>
                    <style type="text/css">
                        .buttonmuathem{float:right;margin-top:20px}
                        .buttonmuathem a{padding:12px 35px;background: linear-gradient(#229CD0, #229CD0);color:white;margin-left:10px;font-size: 14px}
                    </style>
                    <!-- <div class="buttonmuathem" style="margin-right:28px;cursor: pointer;" onclick="printlist()">
                        <div class="tienhangdathang">
                            <a style="font-size: 13px"><?= change_lang('IN DANH SÁCH', 'Pay') ?></a>
                        </div>
                    </div> -->
                    
                    <div class="clear" style="height:30px;"></div>
                    <?php
                } else {
                    echo "<br><br>" . change_lang('Giỏ hàng rỗng !', 'Cart empty !') . "<br><br>";
                }
                ?>
            </div>
            <div style="clear:both"></div>
            <div class="pad-contact" style="float:right;margin-right: 0px;margin:20px 0px;">
                <div class="inputphai" style="width:100%;float:left;margin-top:20px">
                    <button name="continue" type="submit" class="continue hieuunghover" style="width: 150px;float:right;text-align: center;background: #9a4948;height: 50px;border:none;color:white;font-size: 16px;cursor: pointer;" ><?= change_lang('Lưu Đơn Hàng', 'Continue >>') ?></button>
                </div>
                <div class="clear"></div>
            </div>
        </form>
        <div style="clear:both"></div>
    </div>
</div>
<div style="clear:both"></div>
<script type="text/javascript">
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

        $(".last_tt").html(numberFormat($tt));


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
            $root = $(this).parents("tr");
            $price = parseInt($(this).data("price"));
            if ($price < 1) {
                $price = 0;
            }
            $root.find("td").last().html(numberFormat(parseInt($val * $price)));
            updatePrice();
            
            $.ajax({
                url: "ajax/cart.php?type=update_qty",
                data: {"qty": $val, id: $id},
                type: "post",
                success: function (data) {
                    updatePrice();
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
            $root = $(this).parents("tr");
            $price = parseInt($(this).data("price"));
            if ($price < 1) {
                    $price = 0;
                }
                $root.find("td").last().html(numberFormat(parseInt($val * $price)));
                updatePrice();

            $.ajax({
                    url: "ajax/cart.php?type=update_qty",
                    data: {"qty": $val, id: $id},
                    type: "post",
                    success: function (data) {
                        updatePrice();
                    }
                })     
            }else{
                alert('Nhập số lượng phải lớn hơn 0');
                return false;
            }
        })


    });


</script>