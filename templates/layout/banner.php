<?php
$d->query("select * from #_photo where type='photo'");
$row_photo = $d->fetch_array();

$d->query("select * from #_icon where hienthi=1 and type='header' order by stt,id desc");
$headericon = $d->result_array();

$d->reset();
$d->query("select ten_$lang as ten, id,tenkhongdau, photo,thumb,photo1 from #_product_list where com=1 and hienthi=1 and type='san-pham' order by stt,id desc limit 8");
$catmenu = $d->result_array();

$d->reset();
$d->query("select ten_$lang as ten, id,tenkhongdau, photo from #_product_list where com=1 and hienthi=1 and type='bangmau' order by stt,id desc");
$bangmau = $d->result_array();

$d->reset();
$d->query("select ten_$lang as ten, id,tenkhongdau, photo from #_product_list where com=1 and hienthi=1 and type='dich-vu' order by stt,id desc");
$dichvu = $d->result_array();

$d->reset();
$d->query("select ten_$lang as ten, id,tenkhongdau, photo from #_product where hienthi=1 and type='news' and noibat > 0 order by stt,id desc limit 5");
$newlist = $d->result_array();

$d->reset();
$d->query("select ten_$lang as ten, id,tenkhongdau, photo from #_product_list where com=1 and hienthi=1 and type='goctuvan' order by stt,id desc");
$goctuvan = $d->result_array();

$d->reset();
$d->query("select ten_$lang as ten, id,tenkhongdau, photo from #_product_list where com=1 and hienthi=1 and type='news' order by stt,id desc");
$news = $d->result_array();
?>

<style type="text/css">
	.imglogo{max-width: 100%;max-height:110px;transition: all .5s; height:65px}
    .headertop{width: 100%;float: left;box-sizing: border-box;transition: all 1s;background:#fff;border-top: 1px solid #EEEEEE}
    .headtopleft{width:50%;float:left;padding-top:9px;padding-bottom:7px;transition: all .5s;}
    .headtopright{width: 50%;float:right;padding-top:6px;padding-bottom:6px;transition: all .5s;}
    .headtopleft1{width:19%;float:left;transition: all .5s;margin-right: 6%;}
    .headtopmid1{width:27%;float:left;margin-right: 5%;}
    .headtopright1{width: 45%;float:right;padding-top:13px;padding-bottom:13px;transition: all .5s;}
    .boxsearch{position: relative;width: 435px;height:36px;border:1px solid #ddd;padding:0px 0px 0px 10px;border-radius: 5px;box-shadow: 0px 0px 10px #ddd;background:#fff;}

  .ulmenudesk{margin: 0px;padding:0px !important;float: right;}
  .ulmenudesk li{display: inline-block;padding:2px 10px 2px;transition: all .2s;position: relative;}

  .ulmenudesk li:hover {}
  .ulmenudesk > li:hover > a{color:#00923F;}
  .ulmenudesk li a{color:#5e5e5e;cursor: pointer;font-size: 13px;}
  .actlidesk {}
  .actlidesk a.catlv1{color:#00923F!important;}
  .ulmenudesk ul.ullv1{position: absolute;top:45px;left: 0px;width: 230px;background: #fff;z-index: -1;transition: all .3s;background:#F4F4F4;padding:0px;opacity: 0;visibility: hidden;}
  .ulmenudesk li:hover > ul.ullv1{top:29px;z-index: 1001 !important;visibility: visible !important;transition:all .3s;opacity: 1 !important;}
  .ulmenudesk ul li{display: block;width:100%;text-align:left;position: relative;background:#F4F4F4;box-sizing:border-box;padding:10px 11px 10px;}
  .ulmenudesk ul > li > a{font-size: 13px;color:#5e5e5e;transition: all .3s}
  .ulmenudesk ul > li:hover > a{color:#C51D1D;transition: all .3s}
  .ulmenudesk ul ul{position: absolute;top:0px;left:230px;width: 230px;z-index: 900;transition: all .3s;padding:0px;border-left:3px solid #C51D1D;display: none;}
  .ulmenudesk ul > li:hover > ul{display: block;top:0px;}

  .menutophead{width: 100%;float: left;margin-top: 10px;background:url('images/bgmenu.png') repeat-x;}
    
    .ulmenudesk1{}
    .ulmenudesk1 li{display: inline-block;padding:15px 25px;position: relative;transition: all .3s;}
    .ulmenudesk1 li.m2lv1 a{color:#fff;cursor: pointer;font-size: 15px;transition: all .3s;}
    .ulmenudesk1 li.m2lv1:hover{}
    .ulmenudesk1 li.m2lv1:hover a{text-decoration:underline !important;}
    .ulmenudesk1 .actm2{}
    .ulmenudesk1 .actm2 a{text-decoration:underline !important;}
    .ulmenudesk1 ul.ullv1{position: absolute;top:70px;left: 0px;width: 250px;z-index: -1;transition: all .3s;background:rgb(50 50 50 / 90%);padding:0px;opacity: 0;visibility: hidden;}
    .ulmenudesk1 li:hover > ul.ullv1{top:49px;z-index: 1001 !important;visibility: visible !important;transition:all .3s;opacity: 1 !important;;}
    .ulmenudesk1 ul li{display: block;width:100%;text-align:left;position: relative;box-sizing:border-box;padding:15px 11px 15px;border-bottom: 1px solid #315842}
    .ulmenudesk1 ul > li > a{font-size: 14px;color:#fff !important;transition: all .3s;}
    .ulmenudesk1 ul > li:hover {transition: all .3s;padding-left: 20px;}
    .ulmenudesk1 ul > li:hover a{transition: all .3s;color:#97CADF !important;}
    .ulmenudesk1 ul ul{position: absolute;top:0px;left:250px;width: 250px;z-index: 900;transition: all .3s;padding:0px;border-left:3px solid #00923F;display: none;}
    .ulmenudesk1 ul > li:hover > ul{display: block;top:0px;}


.topfixdesk{
    position: fixed !important;
    top:-80px !important;
    left:0px;
    z-index: 999;
    width:100%;
    background: #fff;
    transition: all 1s;
    box-shadow: 0 0 5px #515151;
}
.topfixdesk1{
    position: fixed !important;
    top:0px;
    left:0px;
    z-index: 999;
    width:100%;
    background: #fff;
    transition: all 1s;
    box-shadow: 0 0 5px #515151;
}

.cart_top:hover .boxcart{opacity: 1;visibility: visible;}
.boxcart{
    position: absolute;width: 350px;max-height: 430px;background:#fff;box-shadow:0px 0px 2px #ccc;right: 0px;top:45px;z-index: 1000;padding:15px;box-sizing:border-box;opacity: 0;visibility: hidden;transition: all .4s;
}
.boxcart:after {
    border-bottom: 8px solid #ccc;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    content: "";
    display: inline-block;
    right: 20px;
    position: absolute;
    top: -8px;
}    
.boxcarts{width: 100%;max-height: 300px;overflow: auto;}
.boxcarts::-webkit-scrollbar {
  width: 5px;
}
 
.boxcarts::-webkit-scrollbar-track {
  box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
}
 
.boxcarts::-webkit-scrollbar-thumb {
  background-color: #ccc;
  outline: 1px solid slategrey;
}
.butpayment{display: inline-block;border:1px solid #AE7900;color:#AE7900;transition: all .3s;padding:10px 30px;margin-top: 10px;}
.butpayment:hover{background:#AE7900;color:#fff;}
.delcart{color:#B3B3B3;font-size: 15px;cursor: pointer;display: inline-block;padding:5px 10px;transition: all .3s;border:1px solid transparent;margin-top: 30px;}
.delcart:hover{border:1px solid #B3B3B3;}
.boxcartchild{border-bottom: 1px solid #F5F5F5;width: 100%;float: left;padding:10px 0px;}
/*.boxsearch_order{display: none}*/
</style>        
<script type="text/javascript">

    function del(pid,size,$color,$obj) {
        var $x = $obj;
        $.ajax({
            url: "ajax/cart.php?type=remove_order",
            data: {id: pid,size:size,color:$color},
            type: "post",
            success: function (data) {
                $jdata = $.parseJSON(data);
                $("#" + $obj).fadeOut(500);
                setTimeout(function () {
                    $("#" + $obj).remove();
                }, 800)
                $('#totalcarttop').html($jdata.total);
                $('#cartnumber').html($jdata.num);
                //updatePrice();
                //location.reload();
            }
        })             
    }
</script>

<div style="width: 100%;float: left;background: #F5F5F5;padding-bottom: 3px;">
    <div class="content_home">
        <div class="headtopleft">
            <a style="font-size: 13px;color:#a4a4a4;display: inline-block;"><i class="fa fa-map-marker" aria-hidden="true" style="color:#eea24c"></i>&nbsp;
            <?= $row_setting['diachi_vi'] ?></a>
        </div>
        <div class="headtopright" style="text-align: right;">

            <?php foreach ($headericon as $kh => $vh) {?>
                <a href="<?=$vh['url']?>" target="_blank" style="display: inline-block;float: right;color:#C1FFDD;margin-left: 15px;padding-top: 5px;">
                   <img src="<?=_upload_icon_l.$vh['photo']?>" alt="mxh">
                </a>
            <?php } ?>
        </div>
    </div>
</div>
<div style="width: 100%;float: left;background:#fff;padding-bottom: 10px;">
        <div class="content_home">
            <div class="headtopleft1" style="padding-top: 17px;">
                <a href="./"><img alt="<?= $row_setting['title_'.$lang]?>" class="imglogo" src="<?= _upload_hinhanh_l . $row_photo['logo'] ?>"/>
                </a>
            </div>
            <div class="headtopmid1" style="padding-top: 32px;margin-right: 3%;">
                <?php if($_REQUEST['com'] != 'search-check') { ?>
                    <div class="boxsearch" style="position: relative;width: 100%;height:36px;border:1px solid #ddd;padding:0px 0px 0px 10px;border-radius: 5px;box-shadow: 0px 0px 10px #ddd;background:#fff;">
                        <input type="text" name="txtkey_pro" id="txtkey_pro" value="<?= $_SESSION['savenamesearch'] ?>" placeholder="Nhập mã sản phẩm bạn cần tìm..." style="border: none;padding: 10px 0px 9px;padding-left:15px;position: absolute;width: 70%;bottom: 0px;left: 0;background: none;outline: none;font-size: 13px;" autocomplete="off">
                        <a onclick="searchProduct()" style="cursor: pointer;position: absolute;right: -1px;top:-1px;display: inline-block;padding:10px 20px;color:#fff;color:#333"><i style="color:#29AAE1" class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                <?php } ?>
                <?php if($_REQUEST['com'] == 'search-check') { ?>
                    <div class="boxsearch_order" style="position: relative;width: 100%;height:36px;border:1px solid #ddd;padding:0px 0px 0px 10px;border-radius: 5px;box-shadow: 0px 0px 10px #ddd;background:#fff;">
                        <input type="text" name="txtkey" id="txtkey"  placeholder="Nhập mã đơn hàng bạn cần tìm..." style="border: none;padding: 10px 0px 9px;padding-left:15px;position: absolute;width: 70%;bottom: 0px;left: 0;background: none;outline: none;font-size: 13px;" autocomplete="off">
                        <a onclick="searchorder()" style="cursor: pointer;position: absolute;right: -1px;top:-1px;display: inline-block;padding:10px 20px;color:#fff;color:#333"><i style="color:#29AAE1" class="fa fa-search" aria-hidden="true"></i></a>
                    </div>
                <?php } ?>
                <!-- <p style="margin-top: 10px;font-size: 12px;margin-left: 16px;color: #8d8d8d;cursor: pointer;" class="showorder" onclick="changeorder()">Tìm kiếm theo mã đơn hàng</p> -->
                <!-- <p style="margin-top: 10px;font-size: 12px;margin-left: 16px;color: #8d8d8d;cursor: pointer;display: none;" class="showproduct" onclick="changeproduct()">Tìm kiếm theo mã sản phẩm</p> -->

                <div style="clear:both;"></div>
            </div>
            <div class="headtopright1" style="padding-top:30px;">
                <a style="float: right;display: block;">
                    <span style="color:#999999;display: block;font-size: 12px;margin-top: 3px;">Email</span>
                    <span style="color:#bf7828;font-size:14px;display: block;font-weight: bold;"><?= $row_setting['google'] ?></span>
                </a>
                <img src="images/email.jpg" style="float: right;margin-right: 10px;margin-top:5px;margin-left: 10%;" alt="icon">
                <a style="float: right;display: block;">
                    <span style="color:#999999;display: block;font-size: 12px;margin-top: 3px;">Hỗ trợ trực tuyến</span>
                    <span style="color:#bf7828;font-size:17px;display: block;font-weight: bold;"><?= $row_setting['hotline'] ?></span>
                </a>
                <img src="images/phone.jpg" style="float: right;margin-right: 10px;margin-top:5px;" alt="icon">
                
            </div> 
    </div>
</div>
<!-- ############################# MENU ########################## -->

<style type="text/css">
    .left_menu1{box-sizing: border-box;box-shadow: 0 0 8px #ddd;position: absolute;width: 240px;top:51px;left: 0px;background:#fff;z-index: 500;}
    .left_menu1 ul li{width:100%;float:left;list-style: none;padding:4px 15px 10px;transition: all 0.3s;box-sizing: border-box;}
    .left_menu1 ul li:last-child{border:none;}
    .left_menu1 ul li h2{font-weight: normal;}
    .left_menu1 ul li a{color:#000;transition: all 0.3s;font-size: 14px}
    .left_menu1 ul li i.i_cap1{transition: all 0.3s;color:white;float:right}
    .left_menu1 ul li.left_menulv1{border-bottom: 1px solid #F3F3F3}
    .left_menu1 ul li.left_menulv1:hover{background:#fff;transition: all 0.3s}
    .left_menu1 ul li.left_menulv1:hover .text_cap1{color:#050602;transition: all 0.3s}
    .left_menu1 ul li .i_cap1{color:#FFEB5E;transition: all 0.3s;position: absolute;top:5px;right: -10px;opacity: 0}
    .left_menu1 ul li:hover .menucap2{display: block;transition: all 0.2s}
    .left_menu1 ul li:hover .i_cap1{color:#fff;transition: all 0.3s;position: absolute;top:5px;right: -10px;opacity: 1}
    .menucap2{width: 960px;height: 325px;position: absolute;top:0px;left:240px;background:#fff;display: none;z-index:999;transition: all 0.2s;box-shadow: 0 0 2px #ccc;min-height:auto;}
    .menucap2::-webkit-scrollbar {
    width: 5px;
    }

    .menucap2::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    .menucap2::-webkit-scrollbar-thumb {
    background-color: darkgrey;
    outline: 1px solid slategrey;
    }
    .left_cap2{width: 100%;display: flex;flex-flow: row wrap;float: left;box-sizing: border-box;}
 
    .left_cap2_c2{width: 24%;margin-right:1%;float:left;padding:10px 10px;transition: all .3s;}
    .left_cap2_c2:hover{}
    .left_cap2_c2 h3{}
    .left_cap2_c2 h3:hover a{color:#050602 !important;}
    .left_cap2_c3{width: 100%;flex-basis: 100%;box-sizing: border-box;padding:11px 10px 12px;transition: all .3s;border-bottom: 1px solid #f3f3f3}
    .left_cap2_c3 a:hover{color:#050602 !important;}

    .left_menu1 ul li:hover .menucap2{display: block;transition: all 0.2s}
    .menucap3{width: 240px;position: absolute;top:0px;left:240px;background:#fff;display: none;z-index:999;transition: all 0.2s;box-shadow: 0 0 2px #ccc;min-height:378px;}
    .menucap3::-webkit-scrollbar {
    width: 5px;
    }

    .menucap3::-webkit-scrollbar-track {
    box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
    }

    .menucap3::-webkit-scrollbar-thumb {
    background-color: darkgrey;
    outline: 1px solid slategrey;
    }

    .left_menu1 .menucap2 .left_cap2_c2:hover .menucap3{display: block;transition: all 0.2s}
    .tabmenu li{display:inline-block;padding:15px 25px;transition: all .3s;position: relative;}
    .tabmenu li a{color: #fff;font-size: 14px;}
    .tabmenu li:hover a{color:#f2f2f2;}
    .tabmenu .acttabli a{color:#f2f2f2 !important;}
    .tabmenu li:hover ul{width:240px;}
</style> 
<script type="text/javascript">
    $(document).ready(function() {
        $('.clickmenubut').click(function(){

            var num = $('.menuin').attr('data-sta');
            $('.left_menu1').slideToggle('slow');
            if(num == 1){
                $('.menuin').attr('data-sta', '0');
                
            }
            if(num == 0){
                $('.menuin').attr('data-sta', '1');
               
            }
        })
    });
</script>  
<div class="menufix" style="float: left;width: 100%;padding:0px;background:#eea24c">
    <div class="content_home">       
    <div class="menuin" data-sta="0" style="width: 20%;float: left;padding:12px 0px 12px;box-sizing: border-box;position: relative;transition: all .3s;background:#050602">
        <a class="clickmenubut" style="display:block;float: left;color:#fff;text-align: left;width: 100%;cursor: pointer;">
            <span style="font-size: 16px;display: inline-block;text-transform: uppercase;padding-top: 3px;"><?=change_lang('Danh mục sản phẩm','Product Categories','Categorías de Producto')?></span>
            <img src="images/fav.png" alt="icon" style="float: left;vertical-align: middle;margin-right: 10px;width:25px;margin-left: 10px;">
            <i class="fa fa-angle-down" aria-hidden="true" style="display: inline-block;margin-left: 10px;"></i>
        </a>
        <div class="clear"></div>

        <div class="left_menu1" <?php if($com == 'index' || $com == '') { ?> <?php } else { ?> style="display: none" <?php } ?> >
                <ul class="">
                <?php for($i = 0; $i < count($catmenu);$i++) { 
                    $d->reset();
                    $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and com = 2 and id_parent = '".$catmenu[$i]['id']."' and type = 'san-pham' order by stt, ngaytao desc";
                    $d->query($sql);
                    $menu_cap2 = $d->result_array();
                    ?>
                    <li class="left_menulv1">
                        <h2 style="position: relative;padding-left: 25px">
                        <a href="<?= $catmenu[$i]['tenkhongdau'] ?>" class="text_cap1">
                            <i class="fa fa-angle-right" aria-hidden="true" style="position: absolute;left:-2px;top:9px;" ></i><?= $catmenu[$i]['ten'] ?></a>
                        <?php if(count($menu_cap2) > 0) { ?>
                            <i class="fa fa-angle-right i_cap1" aria-hidden="true" style=""></i>
                        </h2>
                            <div class="menucap2">
                                <div class="left_cap2">
                                    
                                    <?php for($k = 0; $k < count($menu_cap2);$k++) { 
                                        $d->reset();
                                        $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and com = 3 and id_parent = '".$menu_cap2[$k]['id']."' order by stt, ngaytao desc limit 5";
                                        $d->query($sql);
                                        $menu_cap3 = $d->result_array();
                                        ?>
                                        <div class="left_cap2_c2">
                                            <h3 style="font-weight: normal">
                                            
                                            <a href="<?= $menu_cap2[$k]['tenkhongdau'] ?>" class="text_cap2"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<?= $menu_cap2[$k]['ten'] ?></a>
                                            </h3>
                                            <?php if(count($menu_cap3) > 0) { ?>
                                            <div class="menucap3">
                                                <?php for($z = 0; $z < count($menu_cap3);$z++) {?>
                                                    <div class="left_cap2_c3">
                                                        <h4 style="font-weight: normal">
                                                            <a href="<?= $menu_cap3[$z]['tenkhongdau'] ?>"><i class="fa fa-angle-right" aria-hidden="true"></i>&nbsp;&nbsp;<?= $menu_cap3[$z]['ten'] ?></a>
                                                        </h4>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>
                                
                            </div>
                        <?php } ?>
                    </li>
                <?php } ?>
                <!-- <li class="left_menulv1">
                    <h2 style="position: relative;text-align:left;"><i class="fa fa-area-chart" aria-hidden="true" style="color: #fff;font-size: 15px;margin-right: 12px;"></i><a href="san-pham-noi-bat.html" class="text_cap1">Tất cả sản phẩm</a></h2></li> -->
                <!-- <li class="left_menulv1">
                    <h2 style="position: relative;text-align:left;"><i class="fa fa-angle-right" aria-hidden="true" style="color: #050602;font-size: 15px;margin-right: 12px;"></i><a href="san-pham.html" class="text_cap1" style="color:#050602;font-style: italic;">&nbsp;&nbsp;Xem tất cả danh mục</a></h2></li> -->
            </ul>
        </div>
    </div>
    <ul class="ulmenudesk1" style="margin-left: 300px;">
        <li <?php if($com == ''){?>class="actm2 m2lv1"<?php }else{?>class="m2lv1"<?php } ?>><a href="./">Trang chủ</a></li>
        <li <?php if($com == 'gioi-thieu'){?>class="actm2 m2lv1"<?php }else{?>class="m2lv1"<?php } ?>><a href="gioi-thieu.html">Giới thiệu</a></li>
        <!-- <li <?php if($com == 'dich-vu'){?>class="actm2 m2lv1"<?php }else{?>class="m2lv1"<?php } ?>><a href="dich-vu.html">Dịch vụ</a>
             <?php if(count($dichvu)>0){?>
                 <ul class="ullv1">
                     <?php foreach ($dichvu as $kb => $vb) {?>
                         <li><a href="<?=$vb['tenkhongdau']?>" style="font-family:'chakrapetch-regular'"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;<?=$vb['ten']?></a></li>
                     <?php } ?>
                 </ul>
             <?php } ?>
        </li> -->
        <li <?php if($com == 'thong-tin'){?>class="actm2 m2lv1"<?php }else{?>class="m2lv1"<?php } ?>><a href="thong-tin.html">Chia sẻ</a>
             <?php if(count($news)>0){?>
                 <ul class="ullv1">
                     <?php foreach ($news as $kb => $vb) {?>
                         <li><a href="<?=$vb['tenkhongdau']?>" style="font-family:'chakrapetch-regular'"><i class="fa fa-arrow-right" aria-hidden="true"></i>&nbsp;&nbsp;<?=$vb['ten']?></a></li>
                     <?php } ?>
                 </ul>
             <?php } ?>
        </li>
        <li <?php if($com == 'thong-tin-tuyen-dung'){?>class="actm2 m2lv1"<?php }else{?>class="m2lv1"<?php } ?>>
            <a href="du-an-da-thi-cong.html">Dự án đã thi công</a>
        </li>
        <!-- <li <?php if($com == 'hoi-dap'){?>class="actm2 m2lv1"<?php }else{?>class="m2lv1"<?php } ?>><a href="hoi-dap.html">Hỏi đáp</a></li> -->
        <li <?php if($com == 'lien-he'){?>class="actm2 m2lv1"<?php }else{?>class="m2lv1"<?php } ?>><a href="lien-he.html">Liên hệ</a></li>
        <a href="gio-hang.html" style="display:inline-block;float: right;margin-top: 7px;padding:5px 10px;background:#F6F6F6;border-radius: 5px;">
            <span style="position: relative;display: inline-block;"> 
                <img src="images/cart.png" style="vertical-align: middle;">
                <span id="cartnumber" style="display: inline-block;color: #fff;background: #FA0B20;padding:1px 5px;border-radius:5px;font-size: 12px;position: absolute;right: -11px;top: -11px;border: 1px solid #fff;"><?= count($_SESSION['cart']) ?></span>
            </span>
            
            <span style="color:#333;display: inline-block;">&nbsp;&nbsp;Giỏ hàng</span>
        </a>
    </ul>
</div>
</div>

<style type="text/css">
    .slider_0{width: 260px;flex-basis: 260px;}
    .slider_1{width: 940px;flex-basis: 940px;}
    /*.slider_2{width: 255px;flex-basis: 255px;background:#fff;box-shadow: 0px 0px 6px #ddd;}*/
    .adsabig img{transition: all .3s;}
    .adsabig:hover img{opacity: 0.6;transition: .3s;}
    .newtop{border-bottom: 1px solid #f2f2f2;width: 100%;float: left;padding:10px;box-sizing: border-box;}
    .newtop a{color:#000;transition: all .2s;}
    .newtop a:hover{color:#eea24c;transition: all .2s;}
</style>
<?php if ($com == 'index' || $com == '') { ?>
    <div style="width: 100%;float: left;padding:15px 10px 30px;box-sizing: border-box;">
<?php }else{ ?>
    <div style="width: 100%;float: left;padding:15px 10px 30px;box-sizing: border-box;display: none">
<?php } ?>
    <div class="content_home" style="display: flex;flex-flow: row wrap;">
        <div class="slider_0">&nbsp;</div>
        <div class="slider_1">
            <?php include _template . "layout/slideranh.php"; ?>
        </div>
        <!-- <div class="slider_2" style="box-sizing: border-box;">
            <div style="width:100%;float: left;padding:10px;text-align: center;box-sizing: border-box;border-bottom: 1px solid #eea24c;">
                <img src="images/fav1.png" alt="icon" style="vertical-align: middle; width:25px;">
                <span style="font-size: 16px;display: inline-block;text-transform: uppercase;padding-top: 3px;">Tin tức nổi bật</span>
            </div>
            <?php for($i = 0; $i < count($newlist);$i++) {?>
                <div class="newtop" <?php if($i == 4) { ?> style="border-bottom: 0px " <?php } ?>>
                    <a href="<?=$newlist[$i]['tenkhongdau']?>"><?=$newlist[$i]['ten']?></a>
                </div>
            <?php } ?>
        </div> -->
    </div>
</div>

<div class="clear"></div>
<script type="text/javascript">
    function locdau(str) {
        str = str.toLowerCase();
        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
        str = str.replace(/đ/g, "d");
        str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'| |\"|\&|\#|\[|\]|~|$|_/g, "-");
        /* tìm và thay thế các kí tự đặc biệt trong chuỗi sang kí tự - */
        str = str.replace(/-+-/g, "-"); //thay thế 2- thành 1- 
        str = str.replace(/^\-+|\-+$/g, "");
        //cắt bỏ ký tự - ở đầu và cuối chuỗi  
        return str;
    }

    $(document).ready(function() {

        $('#txtkey').keypress(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                //alert('Bạn vừa nhấn phím "enter" trong thẻ input');    
                searchorder();
            }
        });

        $('#txtkey_pro').keypress(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                //alert('Bạn vừa nhấn phím "enter" trong thẻ input');    
                searchProduct();
            }
        });


    });
    
    function searchorder() {
        var name_search = locdau($('#txtkey').val());
        //alert(name_search);
        if (name_search == '')
        {
            alert('Vui lòng nhập thông tin tìm kiếm.');
            document.getElementById('txtkey').value = '';
            document.getElementById('txtkey').focus();

        } else if (($('#txtkey').val()).trim() != '')
            window.location = 'checkout.html/k=' + name_search;
        else
            alert('Vui lòng nhập thông tin tìm kiếm.');
    }


    function searchProduct() {
        var name_search = $('#txtkey_pro').val();
        $.ajax({
            type:'POST',
            url:'ajax/savenamesearch.php',
            data:{name_search:name_search},
            success: function(data){
                window.location = 'tim-kiem.html/k=' + name_search;
            }
        })
    }

    // function changeorder() {
    //     $('.boxsearch').hide();
    //     $('.boxsearch_order').show();
    //     $('.showproduct').show();
    //     $('.showorder').hide();
    // }

    // function changeproduct() {
    //     $('.boxsearch').show();
    //     $('.boxsearch_order').hide();
    //     $('.showproduct').hide();
    //     $('.showorder').show();
    // }
</script>