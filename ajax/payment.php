<?php
include ("configajax.php");
?>

    
<?php if($_REQUEST['act']=='callfrmstep2'){?>
<?php
$d->reset();
$sql = "select * from table_member where user='" . $_SESSION['mem_login']['email'] . "'";
$d->query($sql);
$result_info_mem = $d->fetch_array();

$d->reset();
$sql = "select * from #_product_list where type='quanhuyen1' and com = 1 order by id,stt asc ";
$d->query($sql);
$rs_city = $d->result_array();
?>
<script type="text/javascript">

    function calldist(id){
        $.ajax({
                url: "ajax/xuly.php",
                data: {act:'calldistrict',id:id},
                type: "post",
                success: function (data) {
                    $jdata = $.parseJSON(data);
                    $("#district").html($jdata.quan);
                }
            })
    }
</script>
<style type="text/css">
    .checkoutleft{background:#f2f2f2;padding:30px;width: 100%;float: left;margin-top: 40px;box-sizing: border-box;}   
    .checkoutleft .pad-contact{width:50%;float: left;margin-left: 0px;}
    .inputleft{width: 100%;float: left;margin-bottom: 10px;}
    .inputright{width: 100%;float: left;margin-bottom: 10px;}
    .checkoutleft .form-control{width: 100%;box-sizing: border-box;padding:0px 10px;}
    @media (max-width: 770px){
        .checkoutleft .pad-contact{width: 100% !important;}
    }
</style>
<div class="checkoutleft">
    <div class="pad-contact">
        <div style="padding:0px 10px;">
            <div class="inputleft"><?= change_lang('Họ và tên', 'Full name') ?> (*) : </div>
            <div class="inputright">
                <?php if(isset($_SESSION['payc']['fullname'])){?>
                    <input type="text" class="form-control" name="fullname" value="<?=$_SESSION['payc']['fullname']?>" id="fullname" placeholder="" >
                <?php }else{ ?>    
                    <input type="text" class="form-control" name="fullname" value="<?=$result_info_mem['name']?>" id="fullname" placeholder="" >
                <?php } ?>
            </div>
            <div class="clear"></div>
            <div class="inputleft" ><?= change_lang('Điện thoại', 'Phone') ?> (*) : </div>
            <div class="inputright">
                <?php if(isset($_SESSION['payc']['phone'])){?>
                    <input type="tel" pattern="[0][0-9]{9,10}" min="10" max="13" class="form-control" name="phone" id="phone" placeholder="" value="<?=$_SESSION['payc']['phone']?>" >
                <?php }else{ ?>
                <input type="tel" pattern="[0][0-9]{9,10}" min="10" max="13" class="form-control" name="phone" id="phone" placeholder="" value="<?=$result_info_mem['dienthoai']?>" >
                <?php } ?>
            </div>
            <div class="clear"></div>
            <div class="inputleft" >Email : </div>
            <div class="inputright">
                <?php if(isset($_SESSION['payc']['email'])){?>
                    <input type="email" class="form-control" name="email" id="email" placeholder="" value="<?=$_SESSION['payc']['email']?>" >
                <?php }else{ ?>
                <input type="email" class="form-control" name="email" id="email" placeholder="" value="<?=$result_info_mem['user']?>" >
                <?php } ?>
            </div>
        </div>
    </div>
    <div class="pad-contact">
        <div style="padding:0px 10px;">
            <div class="inputleft"><?= change_lang('Địa chỉ', 'Adress') ?> (*) : </div>
            <div class="inputright">
                <?php if(isset($_SESSION['payc']['address'])){?>
                    <input type="text"  class="form-control" name="address" id="address" placeholder="" value="<?=$_SESSION['payc']['address']?>">
                <?php }else{ ?>
                <input type="text"  class="form-control" name="address" id="address" placeholder="" value="<?=$result_info_mem['diachi']?>">
                <?php } ?>
            </div>
            <div class="inputleft" ><?= change_lang('Ghi chú đơn hàng', 'Note') ?> : </div>
            <div class="inputright">
                <textarea name="noidung" class="form-control" rows="5" id="noidung" style="height: 120px;width: 100%;box-sizing: border-box;resize: none;padding: 10px;box-sizing: border-box;font-family: Arial;"><?=$_SESSION['payc']['noidung']?></textarea>
            </div>
            <!-- <div class="inputleft"><?= change_lang('Tỉnh / Thành phố', 'Province / City') ?> (*) : </div>
            <div class="inputright">
                <select name="city" id="city" class="form-control" style="width: 100%;" onchange="calldist(this.value)">
                    <option value=""><?= change_lang('Chọn tỉnh/thành phố', 'Select province / City') ?></option>
                    <?php foreach ($rs_city as $kc => $vc) { ?>
                        <option value="<?=$vc['id']?>" ><?=$vc['ten_'.$lang]?></option>
                    <?php } ?> 
                </select>
            </div>
            <div style="width: 49%;float: left;">
                <div class="inputleft"><?= change_lang('Quận / Huyện', 'District') ?> (*) : </div>
                <div class="inputright">
                    <select name="district" id="district" class="form-control" style="width: 100%;">
                        <option value=""><?= change_lang('Chọn quận/huyện', 'Select district') ?></option>
                    </select>
                </div>
            </div>
            <div style="width: 49%;float: right;">
                <div class="inputleft"><?= change_lang('Phường', 'Ward') ?> (*) : </div>
                <div class="inputright">
                    <input type="text"  class="form-control" name="ward" id="ward" placeholder="" value="<?=$_SESSION['payc']['ward']?>">
                </div>
            </div> -->
        </div>
    </div>
    <!-- <div class="pad-contact">
        <div style="padding:0px 10px;">
            <div class="inputleft" ><?= change_lang('Ghi chú đơn hàng', 'Note') ?> : </div>
            <div class="inputright">
                <textarea name="noidung" class="form-control" rows="5" id="noidung" style="height: 198px;width: 100%;box-sizing: border-box;resize: none;padding: 10px;box-sizing: border-box;font-family: Arial;"></textarea>
            </div>
        </div>
    </div> -->
    <div class="clear"></div>
    <p style="margin-top: 10px" id="errcfrm"></p>
    <div class="clear"></div>
    <div style="float: left;width: 100%;text-align: center;margin-top: 10px;">
        <a class="butstep butstepback1"><?=change_lang('Quay lại','Back')?></a>&nbsp;&nbsp;
        <a class="butstep butstep2"><?=change_lang('Thanh toán','Payment')?></a>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('.butstepback1').click(function(){
            $('.colpayment').removeClass('actpay');
            $('.paymentstep1').addClass('actpay');
            $("#frmstep1").show();
            $("#frmstep2").html('<span></span>');
        })  

        $('.butstep2').click(function(){
            var fullname = document.getElementById('fullname').value;
            var phone = document.getElementById('phone').value;
            var address = document.getElementById('address').value;
            //var city = document.getElementById('city').value;
            //var district = document.getElementById('district').value;
            //var ward = document.getElementById('ward').value;
            var email = document.getElementById('email').value;
            var noidung = document.getElementById('noidung').value;
            $.ajax({
                url: "ajax/payment1.php",
                data: {act:'callfrmstep3',fullname:fullname,phone:phone,address:address,email:email,noidung:noidung},
                type: "post",
                success: function (data) {
                    //$jdata = $.parseJSON(data);
                    //alert(data);
                    if(data == 1){
                        $('#errcfrm').html("<span style='color:red;display:inline-block;padding:0px 10px;'>Vui lòng nhập đầy đủ thông tin (*) còn thiếu </span>");
                    }else{
                        $('.colpayment').removeClass('actpay');
                        $('.paymentstep3').addClass('actpay');
                        $("#frmstep2").html('<span></span>');
                        $("#frmstep3").html(data);
                    }
                }
            })
        })      
    });
</script>
<?php } ?>