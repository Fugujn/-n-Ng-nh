<?php 
include ("configajax.php"); 

$id = $_POST['id'];
$d->reset();
$sql = "select * from #_product where hienthi = 1 and type = 'san-pham' and id='" . $id . "' ";
$d->query($sql);
$prohome = $d->fetch_array();
$_SESSION['pricepro'] = $prohome['gia'];
$_SESSION['pricepromain'] = $prohome['gia'];
?>
<div class="col-sp-6">
    <div style="padding: 0px 15px;text-align: center;">
        <img src="<?=_upload_product_l.$prohome['photo']?>" alt="<?=$prohome['ten_'.$lang]?>" style="max-width: 100%;height: auto;" onerror='this.src="images/no-image.jpg"'>
        <!-- <div class="clear"></div>
        <span style="display: inline-block;font-family:'opensans-bold';color:#b27f12;margin-top: 10px;font-size: 30px;"><?=number_format($prohome['gia'],0,',','.').' đ'?></span> -->
    </div>
</div>
<style type="text/css">
    .detailpro {width: 100%;}
    .detailpro tbody{width: 100%}
    .detailpro td{vertical-align: middle;padding:10px;}
    .titledetailpro{width: 30%;}
    .titledetailcon{width: 70%;}
    .bookpro{display: inline-block;padding:7px 35px;border-radius: 20px;transition: all .4s;color:#fff;background: #F3D18B;font-size: 14px;cursor:pointer;}
    .bookpro:hover{background:#A27311;}

    .boxsizeall{padding:8px;border:1px solid #B3B3B3;color:#333;display:inline-block;margin-bottom:5px;transition:all 0.5s;margin-right:5px;font-size: 14px;font-family: Arial;font-weight: normal;cursor:pointer;border-radius: 3px}
    .boxsizeall:hover{background:#b27f12;transition:all 0.5s;color:white;}
    .acttabsize{background:#b27f12;color:#fff !important;}

    .boxsizeall1{padding:8px;border:1px solid #B3B3B3;color:#333;display:inline-block;margin-bottom:5px;transition:all 0.5s;margin-right:5px;font-size: 14px;font-family: Arial;font-weight: normal;cursor:pointer;border-radius: 3px}
    .boxsizeall1:hover{background:#b27f12;transition:all 0.5s;color:white;}
    .acttabsize1{background:#b27f12;color:#fff !important;}
</style>
<script type="text/javascript">
    function callsize(id){
        var num = $('.boxsize_'+id).attr('data-sta');
        $('.boxsizeall').removeClass('acttabsize');
        $('.boxsize_'+id).addClass('acttabsize');
        //$('.boxsizeall').attr('data-sta','0');
        //$('.boxsize_'+id).attr('data-sta','1');
        var pripro = document.getElementById('priceproduct').value;
        var idpro = document.getElementById('idproduct').value;
        $.ajax({
            type: 'POST',
            url: 'ajax/xuly.php',
            data: {id: id,idpro:idpro,status:num,act:'loadpricesize'},
            success: function (trave) {
                $jdata = $.parseJSON(trave);
                if($jdata.status == 1){
                    $('.boxsizeall').attr('data-sta','0');
                    $('.boxsize_'+id).attr('data-sta','1');
                    $('#frmprice').html($jdata.pricepro);
                }
            }
        })
    }

    function gettag(id){

        var num = $('.boxsize1_'+id).attr('data-sta');
        //alert(num);
        if(num == 0){
            $('.boxsize1_'+id).addClass('acttabsize1');
            $('.boxsize1_'+id).attr('data-sta', '1');
        }
        if(num == 1){
            $('.boxsize1_'+id).removeClass('acttabsize1');
            $('.boxsize1_'+id).attr('data-sta', '0');
        }
        var a = document.getElementsByClassName("boxsizeall1");
        //alert(a.length);
        var giatri = '';

        for(i=0;i<a.length;i++){
            var x = $('.boxsize1_'+i).attr('data-sta');
            var z = $('.boxsize1_'+i).attr('data-id');
            //alert(z);
            if (x == "1"){
                giatri = giatri + ','+z;
                
            }
        }

        $.ajax({
            type: 'POST',
            url: 'ajax/xuly.php',
            data: {act:'loadpricetopping',id:giatri},
            success: function (trave) {
                //alert(trave);
                $jdata = $.parseJSON(trave);
                //alert($jdata.qty);
                $('#frmprice').html($jdata.pricepro);
            }
        })

        //alert(giatri);
        //document.getElementById("arrtagbv").value = giatri;
        
    }

    $(document).ready(function (e) {
        $(".add-item .increase").click(function(){
            //$id = $(this).data("id");
            $input = $(this).parent().find(".quantity");
            $num = parseInt($input.val());
            //alert($num);
            if($num < 101){
                $input.val($num+1);
                $val = parseInt($input.val());
                if (parseInt($val) < 1) {
                    $(this).val(1);
                    $val = 1;
                }
                $.ajax({
                    type: 'POST',
                    url: 'ajax/xuly.php',
                    data: {act:'loadincrease',qty:$num+1},
                    success: function (trave) {
                        //alert(trave);
                        $jdata = $.parseJSON(trave);
                        $('#frmprice').html($jdata.pricepro);
                    }
                })
            }else{    
              
                alert('Nhập số lượng phải nhỏ hơn 100');
                return false;
            }
        })
        $(".add-item .decrease").click(function(){
            //$id = $(this).data("id");
            $input = $(this).parent().find(".quantity")
            $num = parseInt($input.val());
            if($num > 1){
               $input.val($num-1);
               $val = parseInt($input.val());
               if (parseInt($val) < 1) {
                    $(this).val(1);
                    $val = 1;
                }
                $.ajax({
                    type: 'POST',
                    url: 'ajax/xuly.php',
                    data: {act:'loaddecrease',qty:$num-1},
                    success: function (trave) {
                        //alert(trave);
                        $jdata = $.parseJSON(trave);
                        $('#frmprice').html($jdata.pricepro);
                    }
                })
            } else {
                alert('Nhập số lượng phải lớn hơn 0');
                return false;
            }
        })
    });
</script>
<div class="col-sp-6">
    <div style="padding: 0px 15px;">
        <a style="color:#b27f12;font-size: 25px;display: block;width: 100%;padding:0px 10px;"><?=$prohome['ten_'.$lang]?></a>
        <p style="line-height: 23px;margin-top: 15px;color:#969696;margin-bottom: 10px;padding:0px 10px;"><?=$prohome['mota_'.$lang]?></p>
        
        <table class="detailpro">
            <tbody>
                <tr>
                    <td class="titledetailpro" style="vertical-align: top">Kích cỡ :</td>
                    <td class="titledetailcon">
                       <div class="noidung_tag">
                           <?php 
                            $sql="select * from table_product where type='size' and hienthi = 1 order by stt,id asc";
                            $d->query($sql);
                            $tagbv=$d->result_array();
                            foreach ($tagbv as $kv => $vv) {
                            $sql="select id_size,id,gia from table_product where type = 'san-pham' and hienthi = 1 and find_in_set('" . $vv['id'] . "',id_size)>0 ";
                            $d->query($sql);
                            $baiviettag = $d->result_array();
                            $pos = strpos($prohome['id_size'], $vv['id']);
                            if($pos !== false){
                            ?>
                            <a <?php if($kv == 0){ ?> class="boxsizeall acttabsize boxsize_<?=$vv['id']?>" <?php }else{?> class="boxsizeall boxsize_<?=$vv['id']?>"<?php } ?> data-sta="0" onclick="callsize(<?=$vv['id']?>)"><?=$vv['ten_'.$lang]?></a>
                            <?php } } ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="titledetailpro" style="vertical-align: top">Thêm :</td>
                    <td class="titledetailcon">
                        <div class="noidung_tag">
                           <?php 
                            $topping = $prohome['id_topping'];
                            if($prohome['id_topping'] != ''){
                                $tagbv = explode(',', $topping);
                            }
                            /*$sql="select * from table_product where type='topping' and hienthi = 1 order by stt,id asc";
                            $d->query($sql);
                            $tagbv=$d->result_array();*/
                            for ($i=0; $i < count($tagbv); $i++ ) {
                            /*$sql="select id_topping,id from table_product where type = 'san-pham' and hienthi = 1 and find_in_set('" . $tagbv[$i]['id'] . "',id_topping)>0 ";
                            $d->query($sql);
                            $baiviettag = $d->result_array();*/

                            $pos = strpos($prohome['id_topping'], $tagbv[$i]);
                            if($pos !== false){
                                $sql="select id,gia,ten_$lang as ten from table_product where type='topping' and id = ".$tagbv[$i]."";
                                $d->query($sql);
                                $topsimple=$d->fetch_array();
                            ?>
                            <a class="boxsizeall1 boxsize1_<?=$i?>" data-sta="0"  data-id="<?=$topsimple['id']?>" onclick="gettag(<?=$i?>)"><?=$topsimple['ten']?> + <?=number_format($topsimple['gia'],0,',','.').' đ'?></a>
                            <?php } } ?>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td class="titledetailpro">Số lượng :</td>
                    <td class="titledetailcon">
                        <div class="add-item">
                            <span class="change-qty decrease">-</span>
                            <!-- <span class="quantity ng-binding">1</span> -->
                            <input type="text" class="quantity" value="1" readonly style="outline: none;width:20px;height:34px;border:none;padding:0 7px;">
                            <span class="change-qty increase">+</span>
                        </div>
                    </td>
                </tr>
                <tr>    
                    <td class="titledetailpro">Giá :</td>
                    <td class="titledetailcon">
                       <input type="hidden" name="priceproduct" id="priceproduct" value="<?=$prohome['gia']?>">
                       <input type="hidden" name="idproduct" id="idproduct" value="<?=$prohome['id']?>">
                       <span id="frmprice" style="display: inline-block;font-family:'opensans-bold';color:#b27f12;font-size: 20px;"><?=number_format($prohome['gia'],0,',','.').' đ'?></span>
                    </td>
                </tr>   
                <tr> 
                    <td class="titledetailpro">Ghi chú :</td>
                    <td class="titledetailcon">
                       <textarea style="width: 100%;height: 80px;padding:10px;box-sizing: border-box;resize: none;outline: none;border:1px solid #f2f2f2;"></textarea>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="clear"></div>
        <div style="float: left;width: 100%;margin-top: 20px;text-align: center;">
            <a class="bookpro">Đặt hàng</a>
        </div>
    </div>
</div>

