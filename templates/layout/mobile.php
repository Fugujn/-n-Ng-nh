<style type="text/css">
    .topfixmobile{
        top:0px;
        left: 0px; 
        position: fixed;
        width: 100%;
        z-index: 999;
        background:#fff;
        box-shadow: 0px 0px 3px #ccc;
    }
    .khungsdt{color:white !important;}
    .khungsdt a{color:white !important;}

    .bottom_index{width: 100%;float:left;background:rgba(178,127,18,0.8);position: fixed;bottom: 0px;left:0px;z-index: 9999;height: 50px;display: none;}
    .left_bottom{width: 33.33%;float:left;text-align: center;}
    .left_bottom i{color:white;font-size: 18px;margin-top:8px;}
    .left_bottom a{color:white;font-size: 13px;margin-top:4px;}

    .heightmobilt{width: 100%;float:left;height: 60px;}
    .showinfomo{float:right;}
    .showinfomo a{display: inline-block;margin-bottom: 5px}
</style>        
<script type="text/javascript">
    var num = 0;
    var xxx = $(window).width();
    $(window).bind('scroll', function () {
        if (xxx < 1150) {
            if ($(window).scrollTop() > num) {
                $('.headmobile').addClass('topfixmobile');
            } else {
                $('.headmobile').removeClass('topfixmobile');
            }
        }
    });
</script> 
<!-- <div class="header_mobile" style="width: 100%; text-align: center;padding-bottom:10px;display: none;background: white"> -->
    <!-- <div class="khungsdt" style="width:100%;float:left;border-bottom:1px solid silver;padding-bottom: 10px;background:#8bd100;">
        <p style="float:left;margin-left:2%;margin-top:8px">
            <a style="font-size:15px" href="tel:<?= $rs_setting['hotline'] ?>"><?= $rs_setting['hotline'] ?></a>
        </p>
        
        <div style="clear:both"></div>
    </div>
    <div style="clear:both"></div> -->
    <!-- <a href="https://<?= $config_url ?>" >
        <img src="<?= _upload_hinhanh_l . $row_photo['logo'] ?>"  style="max-width: 100%;margin-top:10px" />
    </a>
    <div style="clear:both"></div> -->
<!-- </div> -->

<div class="pagemenu" style="width: 100%;display:block;position: relative;float: left;background:#fff;margin-bottom: 50px;">
    <a href="#menu" class="menuprint" style="display:inline-block;position: absolute;top:5px;left: 10px;padding:8px 10px;background:#e6a458;z-index: 900;box-sizing: border-box;"><i class="fa fa-bars" aria-hidden="true" style="font-size: 22px;color:#fff;"></i></a>
    <a href="./" style="position: absolute;left: 50%;top:3px;transform: translate(-50%,0);z-index: 999;"><img src="<?= _upload_hinhanh_l . $row_photo['logo'] ?>"  style="max-width: 190px;max-height: 45px;" /></a>
    <a href="gio-hang.html" class="menuprint" style="display:inline-block;position: absolute;right:48px;top:10px;"><img src="images/cart.png" style="width: 25px;float: left;margin-right: -5px;">
        <span style="color:#fff;background:#FAC72E;font-family:'roboto-b';font-size: 14px;display:inline-block;float: left;padding:3px 8px;border-radius: 50%;margin-top: 5px;"><?=count($_SESSION['cart'])?></span>
    </a>
    <a href="#small-dialog-search" class="search_pro menuprint" style="color:#fff;"><i class="fa fa-search" aria-hidden="true" style="position: absolute;right:5px;top:8px;color:#515151;font-size: 17px;padding: 8px 15px;"></i></a>
    <!-- <p class="showprint showinfomo">
        <a style="font-weight: bold;"><?=$row_setting['ten_vi']?></a></br>
        <a><?=$row_setting['hotline']?></a></br>
        <a><?=$row_setting['diachi_vi']?></a>
    </p> -->
</div>


<!-- <div class="bottom_index">
        <div class="left_bottom">
            <a href="tel:<?=$row_setting['hotline']?>"><i class="fa fa-phone" aria-hidden="true"></i></a>
            <p><a href="tel:<?=$row_setting['hotline']?>"><?= change_lang('Gọi điện', 'Hotline') ?></a></p>
        </div>
        <div class="left_bottom">
            <a href="thanh-toan.html"><i class="fa fa-shopping-cart" aria-hidden="true"></i>&nbsp;<span style="display:inline-block;color:#fff;background:#B27F12;padding:3px 8px;border-radius: 15px;font-size: 14px;font-family:'opensans-bold'"><?= count($_SESSION['cart']) ?></span></a>
            <p><a href="thanh-toan.html"><?= change_lang('Giỏ hàng', 'Cart') ?></a></p>
        </div>
        <?php if($_SESSION['mem_login']['email'] == '' && !isset($_SESSION['mem_login']['email'])){?> 
            <div class="left_bottom">
                <a href="#small-dialog" class="dk loginhover"><i class="fa fa-user" aria-hidden="true"></i></a>
                <p><a href="#small-dialog" class="dk loginhover"><?= change_lang('Tài khoản', 'Account','Cuenta') ?></a></p>
            </div>
        <?php } else { ?>
            <div class="left_bottom">
                <a href="user.html&act=update"><i class="fa fa-user" aria-hidden="true"></i></a>
                <p><a href="user.html&act=update"><?=catchuoi($_SESSION['mem_login']['phone'],13) ?>
                </p>
            </div>
        <?php } ?>
    </div> -->
<div id="page" style="display:none;">
	
    <!-- <div class="header">
        <div class="searchmobile" style="width: 96%;float:left;margin:2%;background:white;">
            <div class="iconsearch" style="width: 10%;float: left;">
                    <i class="fa fa-search" aria-hidden="true" style="color: black"></i>
                </div>
                <input name="txtkey" id="txtkey1" style="border:none;width: 86%;float:left;padding:2.5% 2% 2% 2%;outline: none;color:black" type="text"  border="0" placeholder="<?= change_lang('Tìm kiếm ...', 'Search ...','Buscar ...') ?>" />
            </div>
    </div> -->
    
    <nav id="menu">
        <ul>
                <li><a href="./"><?=change_lang('Trang chủ','Home')?></a></li>
                <li><a href="gioi-thieu.html">Giới thiệu</a></li>
                <?php foreach ($catmenu as $kc => $vc) {
                    $d->reset();
                    $d->query("select ten_$lang as ten, id,tenkhongdau,photo from #_product_list where hienthi=1 and com='2' and id_parent = ".$vc['id']." and type='san-pham' order by stt asc");
                    $catmenu1 = $d->result_array();
                  ?>
                <li><a href="<?=$vc['tenkhongdau']?>"><?=$vc['ten']?></a>
                  <?php if(count($catmenu1)>0){?>
                    <ul>
                      <?php foreach ($catmenu1 as $kc1 => $vc1) { 
                            $d->reset();
                            $d->query("select ten_$lang as ten, id,tenkhongdau,photo from #_product_list where hienthi=1 and com='3' and id_parent = ".$vc1['id']." and type='san-pham' order by stt asc");
                            $catmenu2 = $d->result_array();
                        ?>
                        <li><a href="<?=$vc1['tenkhongdau']?>"><?=$vc1['ten']?></a>
                            <?php if(count($catmenu2)>0){?>
                                <ul>
                                    <?php foreach ($catmenu2 as $kc2 => $vc2) { ?>
                                    <li><a href="<?=$vc2['tenkhongdau']?>"><?=$vc2['ten']?></a></li>
                                    <?php } ?>
                                </ul>
                            <?php } ?>
                        </li>
                      <?php } ?>
                    </ul>
                  <?php } ?>  
                </li>
                <?php } ?>
                
                
                <li><a href="tin-tuc.html">Tin tức</a>
                    <ul>
                        <?php foreach ($news as $kb => $vb) {?>
                            <li><a href="<?=$vb['tenkhongdau']?>"><?=$vb['ten']?></a></li>
                        <?php } ?>
                    </ul>
                </li>
                <li><a  href="du-an-da-thi-cong.html">Dự án đã thi công</a></li>
                <li><a  href="lien-he.html">Liên hệ</a></li>
        </ul>
    </nav>
</div>


