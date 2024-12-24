<style type="text/css">
    .leftproduct1{float:left;width:100%;margin-bottom: 20px;background: #fff;}
    .leftproduct1 ul li{list-style: none;border-bottom: 1px solid #e5e5e5;width:100%;float:left;position: relative;}
    /*.contentproduct ul li:last-child{border-bottom: 2px solid #028549;}*/
    .leftproduct1 ul li a{line-height: 35px;font-size: 15px;color:#474747;text-decoration: none;transition: all .3s;}
    /*.contentproduct ul li:hover{background: #028549}*/
    .leftproduct1 ul li a:hover{padding-left: 5px;transition: all .3s;color: #713131;}
    /*.contentproduct ul li ul{display:none}*/
    .leftproduct1 ul ul li{width: 92%;float:left;padding-left:8%;border-bottom: 1px dotted silver}
    .leftproduct1 ul ul ul li{width: 87%;float:left;padding-left:13%;border-bottom: 1px dotted silver}
    .leftproduct1 ul li ul li a{color:#a59f9f;font-weight: normal}
    .leftproduct1 ul li ul li a:hover{color:#C51D1D;padding-left: 5px;transition: all .3s;}
    .activeleft a{color:#713131 !important;font-weight: bold;}

    .baoanhspleft{width:35%;float:left;}
    .baoanhspleft img{width:100%;float:left; transition: all .5s;}
    .baoanhspleft img:hover{opacity: .6; transition: all .5s;}
    .motaspright{width:62%;float:right}
    .ui-widget-header{background:#C51D1D !important;}

    .aprohot{transition: all .3s;color:#777;}
    .aprohot:hover{color:#713131;}
    .btn-submit{padding:10px 20px;height: 35px;border:none;color:#fff;background:#C51D1D;cursor: pointer;}

    .ui-state-default, .ui-widget-content .ui-state-default{border-radius: 50%;}
</style>
<script type="text/javascript">
    function callbox(id){
        $('.boxcatlv2_'+id).slideToggle('slow');
    }

    function callbox1(id){
        $('.boxcatlv2_'+id).slideToggle('slow');
    }
</script>
<?php

?>
<div class="leftproduct1" >
    <div class="section-heading"><h2>Danh mục sản phẩm</h2> </div>
    <div class="clear"></div>
    <?php
    if($_SESSION['searchf']['brands'] != ''){
        $ganchuoi = '?brand='.$_SESSION['searchf']['brands'];
    }
    ?>
    <ul style="box-sizing: border-box;">
        <?php
        $d->reset();
        $sql = "select * from #_product_list where hienthi = 1 and type = 'san-pham' and id = '".$_SESSION['searchf']['list']."' ";
        $d->query($sql);
        $testlist = $d->fetch_array();
        if($testlist['com'] == 2){
            $d->reset();
            $sql = "select * from #_product_list where hienthi = 1 and type = 'san-pham' and id = '".$testlist['id_parent']."' ";
            $d->query($sql);
            $checklistcom2 = $d->fetch_array();
        }

        if($type == 'san-pham'){
            $d->reset();
            $sql = "select * from #_product_list where hienthi = 1 and type = 'san-pham' and tenkhongdau = '".$_REQUEST['com']."' ";
            $d->query($sql);
            $checkcap = $d->fetch_array();
            
            
            // alert($_SESSION['searchf']['brands']);
            if($checkcap['com'] == 1){
                $showcap3 = $checkcap['id'];
            } elseif($checkcap['com'] == 2){
                $showcap3 = $checkcap['id_parent'];
            } elseif($checkcap['com'] == 3){
                $tachlevel = explode('|',$rs_menu['set_level']);
                $showcap3 = $tachlevel[0];
            } 
        } 

        if($_REQUEST['com'] == 'tim-kiem'){
            $d->reset();
            $sql = "select * from #_product_list where hienthi = 1 and type = 'san-pham' and id = '".$_SESSION['searchf']['list']."' ";
            $d->query($sql);
            $checkcap1 = $d->fetch_array();

            if($checkcap1['com'] == 1){
                $showcap3 = $checkcap1['id'];
            } elseif($checkcap1['com'] == 2){
                $showcap3 = $checkcap1['id_parent'];
                $showdanhmuc = $showcap3;
            } elseif($checkcap1['com'] == 3){
                $tachlevel = explode('|',$checkcap1['set_level']);
                $showcap3 = $tachlevel[0];
                $showdanhmuc = $tachlevel[1];
            } 

        }


        $d->reset();
        $sql = "select * from #_product_list where hienthi = 1 and type = 'san-pham' and com = 1 order by stt, id asc";
        $d->query($sql);
        $menuleft = $d->result_array();
        for ($i = 0; $i < count($menuleft); $i++) {
            ?>
            <li <?php if ($_REQUEST['com'] == $menuleft[$i]['tenkhongdau'] || $_SESSION['searchf']['list'] == $menuleft[$i]['id']) { ?> class="activeleft" <?php } ?> style="padding-right: 10px;box-sizing: border-box;cursor: pointer;">
                <i class="fa fa-angle-right" aria-hidden="true" style="float:left;position: absolute;top:11px;color:#a0a0a0;font-size:12px"></i>
                <a href="<?php echo $menuleft[$i]['tenkhongdau'] ?>" style="float:left;width:80%;cursor: pointer; margin-left: 10px;" >
                    <?php echo $menuleft[$i]['ten_' . $lang] ?>
                </a>
                
                <?php
                $d->reset();
                $sql = "select * from #_product_list where hienthi = 1 and type = 'san-pham' and id_parent = '" . $menuleft[$i]['id'] . "' order by stt, ngaytao desc";
                $d->query($sql);
                $menuleft1 = $d->result_array();
                if (count($menuleft1)> 0) { ?>
                    <i class="fa fa-angle-down" aria-hidden="true" style="float:right;width:10%;margin-left: 30px;position: absolute;top:9px;color:#004e24;font-size:17px" onclick="callbox(<?=$menuleft[$i]['id']?>)"></i>
                <?php } ?>
            </li>
            <div style="clear:both"></div>
            
                <ul class="boxcatlv2 boxcatlv2_<?=$menuleft[$i]['id']?>" 
                    <?php if ($_REQUEST['com'] == $menuleft[$i]['tenkhongdau'] || $rs_menu['id_parent'] == $menuleft[$i]['id'] || $showcap3 == $menuleft[$i]['id'] || $checklistcom2['id']  == $menuleft[$i]['id'] || $_REQUEST['com'] == $menuleft1[$j]['tenkhongdau']) { ?>  
                        style="display: block"  
                    <?php } else { ?> 
                        style="display: none"  
                    <?php } ?> 
                    >
                    <?php for ($j = 0; $j < count($menuleft1); $j++) {
                        $d->reset();
                        $sql = "select * from #_product_list where hienthi = 1 and type = 'san-pham' and id_parent = '" . $menuleft1[$j]['id'] . "' order by stt, ngaytao desc";
                        $d->query($sql);
                        $menuleft2 = $d->result_array();
                        ?>
                        <li <?php if ($_REQUEST['com'] == $menuleft1[$j]['tenkhongdau'] || $testlist['tenkhongdau']  == $menuleft1[$j]['tenkhongdau'] || $_SESSION['searchf']['list']  == $menuleft1[$j]['id']) { ?> class="activeleft" <?php } ?>>
                            <i class="fa fa-angle-right" aria-hidden="true" style="position: absolute;top:11px;color:#004e24;font-size:12px"></i>
                            <a style="font-size:14px;margin-left: 10px;" href="<?php echo $menuleft1[$j]['tenkhongdau'] ?>"><?php echo $menuleft1[$j]['ten_' . $lang] ?></a>
                            <?php if (count($menuleft2)> 0) { ?>
                                <i class="fa fa-angle-down" aria-hidden="true" style="float:right;width:10%;right: -3px;position: absolute;top:9px;color:#004e24;font-size:17px;cursor: pointer;" onclick="callbox1(<?=$menuleft1[$j]['id']?>)"></i>
                            <?php } ?>
                        </li>
                        <div style="clear:both"></div>
                        <ul class="boxcatlv2 boxcatlv2_<?=$menuleft1[$j]['id']?>" <?= $menuleft1[$j]['id'] ?><?php if($_REQUEST['com'] == $menuleft1[$j]['tenkhongdau'] || $_SESSION['searchf']['list']  == $menuleft1[$j]['id'] || $rs_menu['id_parent']  == $menuleft1[$j]['id'] || $tachlevel[1] == $menuleft1[$j]['id']){?> style="display: block" <?php }else{?> style="display: none" <?php } ?> >
                            <?php for ($k = 0; $k < count($menuleft2); $k++) {
                                ?>
                                <li <?php if ($_REQUEST['com'] == $menuleft2[$k]['tenkhongdau'] || $_SESSION['searchf']['list']  == $menuleft2[$k]['id']) { ?> class="activeleft" <?php } ?>>
                                    <i class="fa fa-angle-right" aria-hidden="true" style="position: absolute;top:11px;color:#004e24;font-size:12px"></i>
                                    <a style="font-size:14px;margin-left: 10px;" href="<?php echo $menuleft2[$k]['tenkhongdau'] ?>"><?php echo $menuleft2[$k]['ten_' . $lang] ?></a>
                                </li>
                                <div style="clear:both"></div>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </ul>
            
        <?php } ?>
    </ul>

</div>
<?php
if($_REQUEST['com'] == 'tim-kiem' || $type == 'san-pham') { ?>

    <div class="leftproduct1">
        <select class="checkstt1" onchange="changestt1()" style="width: 100%;float:left;height: 40px;">
            <option value="" <?php if($_SESSION['sapxep']['sapxepstt'] == ''){ ?> selected="selected" <?php } ?>>Sắp xếp sản phẩm</option>
            <option value="sx1" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx1'){ ?> selected="selected" <?php } ?>>Sản phẩm Bán chạy</option>
            <option value="sx2" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx2'){ ?> selected="selected" <?php } ?>>Sản phẩm Mới nhất</option>
            <option value="sx3" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx3'){ ?> selected="selected" <?php } ?>>Giá từ Thấp đến cao</option>
            <option value="sx4" <?php if($_SESSION['sapxep']['sapxepstt'] == 'sx4'){ ?> selected="selected" <?php } ?>>Giá từ Cao đến thấp</option>
        </select>
        <input type="hidden" name="checkdm1" class="checkdm1" value="<?= $rs_menu['id'] ?>">
    </div>
    <div class="leftproduct1">
        <div class="titleindex">
            <p><a>Thương hiệu</a></p>
        </div>
        <div class="clear"></div>

        <!-- <form method="post" action="tim-kiem.html"> -->
            <?php 
                $addchuoi = explode(',',$_SESSION['searchf']['brands']);
                $searchf = implode(',',$addchuoi);
                // alert($searchf[0]);
                $d->reset();
                $sql = "select * from #_product_list where hienthi=1 and type='thuong-hieu' and id_parent = '".$showcap3."' order by stt,id desc";
                $d->query($sql);
                $brandleft = $d->result_array();
                for ($i = 0; $i < count($brandleft); $i++) {
                ?>
                <div style="margin-top: 10px;">
                    <input type="checkbox" name="brands" class="brands" value="<?=$brandleft[$i]['id']?>" <?php $pos = strpos($searchf,$brandleft[$i]['id']); if($pos !== false){?> checked <?php }else{?>  <?php } ?> ><?=$brandleft[$i]['ten_'.$lang]?>
                </div>
            <?php } ?>
            <?php if($_REQUEST['com'] == 'tim-kiem') { ?>
                <input type="hidden" name="danhmuc" class="danhmuc" value="<?=$_SESSION['searchf']['list']?>"/>
            <?php } elseif($tenkhongdau != '') { ?>
                <input type="hidden" name="danhmuc" class="danhmuc" value="<?=$checkcap['id']?>"/>
            <?php } ?>
            
            <div style="margin-top: 20px;">
                <a style="display: inline-block;padding:10px 25px;background: #713131;color:white;font-size: 14px;cursor: pointer;" onclick="checksearch()">
                    Lọc sản phẩm
                </a>
                <!-- <input type="submit" name="submit_range" value="Lọc sản phẩm" class="btn-submit"> -->
            </div>
        <!-- </form> -->
    </div>
    <script type="text/javascript">
        function checksearch(){
            var danhmuc = $('.danhmuc').val();
            // Khai báo tham số
            var checkbox = document.getElementsByName('brands');
            var brands = "";
             
            // Lặp qua từng checkbox để lấy giá trị
            for (var i = 0; i < checkbox.length; i++){
                if (checkbox[i].checked === true){
                    brands += checkbox[i].value + ',';
                }
            }
            
            $.ajax({
                type: 'POST',
                url: 'ajax/ajax_search.php',
                data: {danhmuc: danhmuc,brands: brands},
                success: function (trave) {
                    setTimeout(function () {
                        window.location = "tim-kiem?danhmuc="+ danhmuc +"&brand="+brands;
                    }, 500);
                }
            })
        }
    </script>
<?php } ?>
<div class="leftproduct1" style="margin-top:20px">
    
        <div class="section-heading"><h2>Sản phẩm nổi bật</h2> </div>
        <div class="clear"></div>
        <div class="danhmucleft" style="margin-top: 30px;">
            <?php
            $d->reset();
            $sql = "select * from #_product where hienthi=1 and type='san-pham' order by rand() limit 0,12";
            $d->query($sql);
            $result_spbc1 = $d->result_array();
            if (count($result_spbc1) > 0) {
                for ($i = 0; $i < count($result_spbc1); $i++) {
                    ?>
                    <div class="productleft" style="margin-bottom: 10px;width: 100%;float: left;">
                        <div class="baoanhspleft" >
                            <a href="<?= $result_spbc1[$i]['tenkhongdau'] ?>">
                                <img src="<?=_upload_product1_l.$result_spbc1[$i]['photo'] ?>" alt="<?= $result_spbc1[$i]['ten_vi'] ?>" onerror='this.src="images/no-image.svg"' style="padding: 5px;box-sizing: border-box;">
                            </a>
                        </div>
                        <div class="motaspright">
                            
                            <p style="max-height: 68px; overflow: hidden;">
                                <a class="aprohot" href="<?= $result_spbc1[$i]['tenkhongdau'] ?>">
                                    <?= $result_spbc1[$i]['ten_' . $lang] ?>
                                </a>
                            </p>
                            
                            <div class="baogia" style="margin-top: 5px;">
                                <p style="float:left">
                                    <?php if($result_spbc1[$i]['gia'] == 0) { ?>
                                        <a>Liên hệ</a>
                                    <?php } else { ?>
                                        <a style="color:silver;font-size:14px;text-decoration: line-through;"><?= price_sp($result_spbc1[$i]['giakm']) ?></a></br>
                                        <a style="color:#D13A1E;font-size:15px;font-weight: bold;"><?= price_sp($result_spbc1[$i]['gia']) ?></a>
                                    <?php }  ?>
                                </p>
                            </div>
                            <div class="clear"></div>
                            
                        </div>
                    </div>
                    <div class="clear"></div>
                <?php } ?>
            <?php }  ?>
                
        </div>
</div>
<!-- <style type="text/css">
    .thongtintk{width: 100%;float:left;border: 1px solid #f4f4f4;}
    .thongtintk li {padding: 10px;border-bottom: 1px solid #f4f4f4;transition: .2s all;list-style: none}
    .thongtintk li:hover{background:#d2effb;padding-left: 15px;}
    .thongtintk li:last-child{border-bottom: none;}
    .thongtintk li a{color:#515151;font-size: 15px;}
    .acttk{background: #d2effb;}
</style>
<div class="col-cont" style="padding:0px">
<div class="titleaccount" style="margin-bottom: 20px">
    <p style="font-size: 16px;color:#CDA53D;">
        <i class="fa fa-info-circle" aria-hidden="true" style="margin-right: 5px"></i>
        Thông tin khách hàng
    </p>
</div>
<div style="clear:both"></div>
<ul class="thongtintk">
    
    <li>
        <i class="fa fa-pencil" aria-hidden="true" style="margin-right:5px"></i>
        <a href="user.html&act=update"><?= change_lang('Cập nhật tài khoản','Update Acount') ?></a>
    </li>
    <li>
        <i class="fa fa-unlock-alt" aria-hidden="true" style="margin-right:5px"></i>
        <a href="user.html&act=changepassword"><?= change_lang('Đổi mật khẩu','Change Password') ?></a>
    </li>
    <li>
        <i class="fa fa-line-chart" aria-hidden="true" style="margin-right:5px"></i>
        <a href="user.html&act=profile"><?= change_lang('Quản lý đơn hàng','Order Management') ?></a>
    </li>
    <li>
        <i class="fa fa-gift" aria-hidden="true" style="margin-right:5px"></i>
        <a href="user.html&act=quanlydoithuong"><?= change_lang('Quản lý tích điểm','User Point Management') ?></a>
    </li>
</ul>
</div> -->