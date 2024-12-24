<?php
session_start();
$session = session_id();
error_reporting(0);

@define('_lib', './ivgpanel/lib/');
@define(_upload_folder, './media/upload/');
@define('_template', './templates/');
@define('_source', './sources/');

if ($_SESSION['language'] == 'en') {
    $_SESSION['language'] = "en";
    $lang = 'en'; 
} else {
    $_SESSION['language'] = "vi";
    $lang = 'vi';
}


include_once _lib . "config.php";
include_once _lib . "class.database.php";
include_once _lib . "constant.php";
include_once _lib . "functions.php";
include_once _lib . "functions_giohang.php";
include_once _lib . "file_requick.php";
?>
<!DOCTYPE html >
<html lang="vi">
    <head>   	
    <!-- xuất mã google analytics -->
    <?= $row_setting['livechat'] ?>
    <!-- end xuất mã google analytics -->

    <base href="https://<?= $config_url ?>/"  />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width initial-scale=1.0 maximum-scale=1.0 user-scalable=yes">
    <link href="<?= _upload_hinhanh_l . $row_setting['fav'] ?>" rel="shortcut icon" type="image/x-icon" />
    
    <meta name="keywords" content="<?= ($keywords_custom != '') ? $keywords_custom : $row_setting['keywords_' . $lang] ?>" />
    <meta name="description" content="<?= ($description_custom != '') ? $description_custom : $row_setting['description_' . $lang] ?>" />
    <meta name="author" content="<?= $row_setting["ten_vi"] ?>" />
    <meta name="copyright" content="<?= $row_setting["ten_vi"] ?>" />

    <title><?= ($title_custom != '') ? $title_custom : $title_bar . $row_setting['title_' . $lang] ?></title>
    <meta name="DC.title" content="<?= ($title_custom != '') ? $title_custom : $title_bar . $row_setting['title_' . $lang] ?>" />
    <meta name="DC.language" scheme="utf-8" content="vi" />
    <meta name="DC.identifier" content="<?= $row_setting['website'] ?>" />
    <meta name="robots" content="index,follow" />
    <meta name='revisit-after' content='1 days' />
    <meta property="og:site_name" content="<?= ($title_custom != '') ? $title_custom : $title_bar . $row_setting['title_' . $lang] ?>" />
    <meta property="og:url" content="<?= getCurrentPageUrl() ?>" />
    <meta type="og:url" content="<?= getCurrentPageUrl(); ?>" >
    <meta property="og:type" content="Website" />
    <meta property="og:title" content="<?= ($title_custom != '') ? $title_custom : $title_bar . $row_setting['title_' . $lang] ?>" />
    <meta property="og:image" content="<?= $image_share ?>" />
    <meta property="og:image:width" content="500" />
    <meta property="og:description" content="<?= ($description_custom != '') ? $description_custom : $row_setting['description_' . $lang] ?>" />
    
    <!--linkframework-->
    <link rel="stylesheet" type="text/css" href="assets/font/font-awesome-4.7.0/css/font-awesome.css"/>

    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/script.js"></script>

    <!-- <script type="text/javascript" src="assets/js/wow.min.js"></script> -->
    <link rel="stylesheet" type="text/css" href="assets/js/sweet-alert/sweet-alert.css"/>
    <script type="text/javascript" src="assets/js/sweet-alert/sweet-alert.js"></script>
    <script src="assets/js/plugin-scroll/plugins-scroll.js" type="text/javascript" ></script>
    <link rel="stylesheet" href="assets/js/magnific-popup/magnific-popup.css">
    <script src="assets/js/magnific-popup/jquery.magnific-popup.js"></script>
    <link rel="stylesheet" href="assets/js/magnific-popup/ma-popup.css">
    <!--end-->

    <!--css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/manhinh.css"/>
    <!--end-->
    <link type="text/css" rel="stylesheet" href="assets/js/master/demo/css/demo.css" />
    <link type="text/css" rel="stylesheet" href="assets/js/master/dist/css/jquery.mmenu.all.css" />
    <script type="text/javascript" src="assets/js/master/dist/js/jquery.mmenu.min.all.js"></script>

    <script src="plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
    <link rel="stylesheet" href="plugins/OwlCarousel2-2.3.4/owl.carousel.min.css">
    <link rel="stylesheet" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.min.css">
    <link rel="stylesheet" href="plugins/OwlCarousel2-2.3.4/animate.css">


    <script type="text/javascript">
        $(function () {
            $('nav#menu').mmenu();
        });
    </script>

    <!-- <script>
        $(document).ready(function (e) {
            $('img').attr('alt', '<?= $alt ?>');
        });

    </script> -->
	<div class="vcard" style="display: none;">
        <div class="fn org"><?= $row_setting['ten_'.$lang] ?></div>
        <div class="adr">
            <div class="street-address"><?= $row_setting['diachi_'.$lang] ?></div>
            <div> <span class="locality">Quận Gò Vấp</span>, <abbr class="region" title="Hồ Chí Minh">Hồ Chí Minh</abbr> <span class="postal-code"></span></div>
            <div class="country-name">Việt Nam</div>
        </div>
        <div>Phone: <span class="tel"><?= $row_setting['dienthoai_'.$lang] ?></span></div>
        <div>Email: <span class="email"><?= $row_setting['google'] ?></span></div>
        <div class="tel">
            <span class="type">Tel</span>:
            <span class="value"><?= $row_setting['dienthoai_'.$lang] ?></span>
        </div>
    </div>
    <script type="application/ld+json">
        {
          "@context": "http://schema.org",
          "@type": "Organization",
          "url": "https://<?= $config_url ?>/",
          "contactPoint": [
            { "@type": "ContactPoint",
              "telephone": "<?= $row_setting['dienthoai_vi'] ?>",
              "contactType": "customer service"
            }
          ]
        }
    </script>

    <?php
    if($com != 'tim-kiem'){
    	// unset($_SESSION['searchf']);
        // unset( $_SESSION['searchf']['list']);
        unset($_SESSION['savenamesearch']);
        //unset($_SESSION['cart']);
    }
    if($com != 'thanh-toan'){unset($_SESSION['payc']);}
    ?>
</head>
<body>
<?= $row_setting['gg'] ?>
    <div class="container">
        <article class="heading">
            <h1><?= ($h1_custom != '') ? $h1_custom : $row_setting['h1_' . $lang] ?></h1>
            <h2><?= ($h2_custom != '') ? $h2_custom : $row_setting['h2_' . $lang] ?></h2>
        </article>
        <article class="heading">
            <h3><?= ($h3_custom != '') ? $h3_custom : $row_setting['h3_' . $lang] ?></h3>
            <h4><?= $row_setting['h4_' . $lang] ?></h4>
            <h5><?= $row_setting['h5_' . $lang] ?></h5>
            <h6><?= $row_setting['h6_' . $lang] ?></h6>
        </article> 

            
            <header>
                <article class="banner">
                    <?php include _template . "layout/banner.php"; ?>
                    <div class="clear"></div>
                </article>
                
            </header><!-- End header --> 
            <div class="clear"></div>
            
            <div class="headmobile" style="display: none;box-shadow: 0px 0px 3px #ccc;width: 100%;float: left;height:56px;padding-top:5px;"> 
                <?php include _template . "layout/mobile.php"; ?>
            </div>
            <div class="slidermobile" style="display: none;">
                <?php include _template . "layout/slideranh.php"; ?>
            </div>

            <div class="clear"></div>
            <?php if ($com != 'index' && $com != '') { ?>
            <div class="break_thumb">
                <div class="content_home">
                    <p><?= $breakcrumb ?></p>
                </div>
            </div>

            <?php } ?>
            <div class="clear"></div>
            <div class="wrapper">

                    <?php if ($com == 'index' || $com == '') { ?>
                        <script type="text/javascript">
                            $(window).bind('scroll', function () {
                                if (($(window).scrollTop() < 250) && ($(window).scrollTop() > 150)) {
                                    $('.menufix').addClass('topfixdesk');
                                    $('.menufix').removeClass('topfixdesk1');
                                    $('.left_menu1').hide();
                                }else if($(window).scrollTop() >= 250){   
                                    $('.left_menu1').hide();
                                    $('.menufix').addClass('topfixdesk1');
                                    $('.menufix').removeClass('topfixdesk');
                                } else if($(window).scrollTop() <= 150){
                                    $('.left_menu1').show();
                                    $('.menufix').removeClass('topfixdesk');
                                    $('.menufix').removeClass('topfixdesk1');
                                }

                            });
                        </script>
                        <?php include _template . "layout/center.php"; ?>
                    <?php } else { ?> 
                        <script type="text/javascript">
                                $(window).bind('scroll', function () {
                                    if (($(window).scrollTop() < 250) && ($(window).scrollTop() > 150)) {
                                        $('.menufix').addClass('topfixdesk');
                                        $('.menufix').removeClass('topfixdesk1');
                                        $('.left_menu1').hide();
                                    }else if($(window).scrollTop() >= 250){   
                                        $('.menufix').addClass('topfixdesk1');
                                        $('.menufix').removeClass('topfixdesk');
                                        $('.left_menu1').hide();
                                        $('.menuin').attr('data-sta', '0');
                                    } else if($(window).scrollTop() <= 150){
                                        $('.menufix').removeClass('topfixdesk');
                                        $('.menufix').removeClass('topfixdesk1');
                                        $('.left_menu1').hide();
                                        $('.menuin').attr('data-sta', '1');
                                    }

                                });
                        </script>
                        <div class="container_mid">
                            
                            <?php if($com == 'san-pham' || $com == 'thanh-toan' || $com == 'checkout' || ($tenkhongdau_p != '' && $type == 'san-pham')){?>
                                <div class="content_home">
                                    <?php include _template . $template . "_tpl.php"; ?> 
                                </div>
                            <?php }else{ ?>    
                                <div class="content_home">
                                    <div class="leftmid" style="margin-top: 30px;">
                                        <?php include _template . "layout/left.php"; ?>
                                    </div>
                                    <div class="rightmid">
                                        <?php include _template . $template . "_tpl.php"; ?>
                                    </div>
                                </div>
                            <?php } ?>

                        </div><!-- End container right -->   
                    <?php } ?>
                    
                    <div class="clear"></div>
                    <footer>
                        <?php include _template . "layout/footer.php"; ?>  
                        <?php include _template . "layout/backtotop.php"; ?>           
                    </footer>
                    <!-- End footer -->
                <div class="clear"></div>
            </div>
        <div class="clear"></div>
    </div>

	<!--popup-->
    <style>
        #boxproductall{
            width:100%;
            height: 100%;
            position: fixed;
            background: rgba(0,0,0,0.8);
            z-index: 9998;
            top:0px;
            left:0px;
            opacity: 0;
            visibility:hidden;
            transition: all .5s;

        }
        #boxproductdetail{
            width: 850px;
            max-height: 500px;
            background: url('images/bg_popup.jpg') no-repeat;
            background-size: cover;
            padding:30px;
            z-index: 9999;
            position: fixed;
            left: 50%; 
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
            -webkit-transform: translateX(-50%) translateY(-50%);
            /* border-radius: 10px;
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px; */
            box-sizing: border-box;
            opacity: 0;
            visibility:hidden;
            transition: all .5s;
            overflow-x:hidden;
            overflow-y: auto;
        }
        #boxproductdetail::-webkit-scrollbar {
          width: 5px;
        }
         
        #boxproductdetail::-webkit-scrollbar-track {
          box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }
         
        #boxproductdetail::-webkit-scrollbar-thumb {
          background-color: darkgrey;
          outline: 1px solid slategrey;
        }
        .btn-closefrm{
            display: inline-block;
            padding: 0px 15px;
            position: absolute;
            color: #000;
            font-size: 30px;
            right: 0px;
            top: 0px;
            cursor: pointer;
        }
        .add-item span {
            //border: 1px solid #F3D18B;
            width: 34px;
            height: 34px;
            display: inline-block;
            line-height: 33px;
            text-align: center;
            cursor: pointer;
            background: #fff;
        }

        .add-item span.quantity {
            border-left: none;
            border-right: none;
        }
        .add-item span.change-qty.increase {
            //border-radius: 0 4px 4px 0;
            background: #F3D18B;
            color:#fff;
        }
        .add-item span.change-qty.decrease {
            //border-radius: 4px 0 0 4px;
            background: #F3D18B;
            color:#fff;
        }
        @media(max-width: 770px){
            #boxproductdetail{width: 95% !important}
        }

    </style>
    <div id="boxproductall"></div>
    <div id="boxproductdetail">
        <span class="btn-closefrm">×</span>
        <div id="frmshow" style="float:left;width:100%"></div>
    </div>
    <script>

        $(document).ready(function() {
            
            widthdivimg = $('.productcon').width();
            $('.imgbox1').css("height", widthdivimg);
            // $('.imgname').css("max-height", widthdivimg);
            $('.imgname').css("max-width", widthdivimg);
           
            setTimeout(function () {
                heightimg = $('.listcap2_con').height();
                $('.ten_listcap2').css("height", heightimg);
            }, 500);
            $('.btn-closefrm').click(function(event){
                $("#boxproductall").css({
                    opacity: '0',
                    visibility: 'hidden',
                });
                $("#boxproductdetail").css({
                    opacity: '0',
                    visibility: 'hidden',
                });
                $.ajax({
                    type: 'POST',
                    url: 'ajax/xuly.php',
                    data: {act:'resetpro'},
                    success: function (trave) {}
                })
            });

            $('#boxproductall').click(function(event){
                $("#boxproductall").css({
                    opacity: '0',
                    visibility: 'hidden',
                });
                $("#boxproductdetail").css({
                    opacity: '0',
                    visibility: 'hidden',
                });
                $.ajax({
                    type: 'POST',
                    url: 'ajax/xuly.php',
                    data: {act:'resetpro'},
                    success: function (trave) {}
                })
            });
        });
        /*function closebox(){

            $("#boxproductall").css({
                opacity: '0',
                visibility: 'hidden',
            });

        }*/
        function click_popup(id) {
            $("#boxproductall").css({
                opacity: '1',
                visibility: 'visible',
            });
            $("#boxproductdetail").css({
                opacity: '1',
                visibility: 'visible',
            });
            
            $.ajax({
                type: 'POST',
                url: 'ajax/ajaxdetail.php',
                data: {id: id},
                success: function (trave) {
                    $('#frmshow').html(trave);
                }
            })
        }
        
        function loadcart(id) {

            var price = document.getElementById('checkprice').value;
            addtocart(id, 1, price);

            document.getElementById('textchange').innerHTML = 'Đang xử lý...';
            // location.reload();
            setTimeout(function () {
                $(".hidedone").css({
                    display: 'none',
                });
                $(".showdone").css({
                    display: 'block',
                });
                // window.location = "gio-hang.html";

            }, 500);
        }
        
    </script>
    
    <script type="text/javascript">
        function changeth(){
            var brands = $('.checkth').val() + ',';
            var danhmuc = $('.checkdm').val();
            // alert(danhmuc);
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

        function changestt(){
            var sapxepstt = $('.checkstt').val();
            var danhmuc = $('.checkdm').val();
            $.ajax({
                type: 'POST',
                url: 'ajax/ajax_sxstt.php',
                data: {danhmuc: danhmuc,sapxepstt: sapxepstt},
                success: function (trave) {
                    location.reload();
                }
            })
        }

        function changestt1(){
            var sapxepstt = $('.checkstt1').val();
            var danhmuc = $('.checkdm1').val();
            $.ajax({
                type: 'POST',
                url: 'ajax/ajax_sxstt.php',
                data: {danhmuc: danhmuc,sapxepstt: sapxepstt},
                success: function (trave) {
                    location.reload();
                }
            })
        }

        function changestt2(){
            var sapxepstt = $('.checkstt2').val();
            var danhmuc = $('.checkdm2').val();
            $.ajax({
                type: 'POST',
                url: 'ajax/ajax_sxstt.php',
                data: {danhmuc: danhmuc,sapxepstt: sapxepstt},
                success: function (trave) {
                    location.reload();
                }
            })
        }

    </script>

    <style type="text/css">
    
        .input-group {
            position: relative;
            display: table;
            border-collapse: separate;
            width: 100%;
        }
        .input-group-addon:first-child {
            border-right: 0;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
        }
        .input-group-addon {
            padding: 6px 0px 6px 0px;
            font-size: 14px;
            font-weight: normal;
            line-height: 1;
            color: #c3bebe;
            text-align: left;
            width: 26px !important;
            //background-color: #eee;
            border-bottom: 1px solid #ccc;
            //border-radius: 4px;
        }
        .input-group-addon, .input-group-btn {
            width: 1%;
            white-space: nowrap;
            vertical-align: middle;
        }
        .input-group-addon, .input-group-btn, .input-group .form-control {
            display: table-cell;
        }
        .glyphicon {
            position: relative;
            top: 1px;
            display: inline-block;
            font-family: 'Glyphicons Halflings';
            font-style: normal;
            font-weight: normal;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        .input-group .form-control {
            position: relative;
            z-index: 2;
            float: left;
            margin-bottom: 0;
        }
        .form-control {
            display: block;
            height: 40px;
            width: 100%;
            padding: 0px 0px;
            font-size: 14px;
            line-height: 1.42857143;
            color: #555;
            background-color: #fff;
            background-image: none;
            border:none;
            border-bottom: 1px solid #ccc;
            outline: none;
            border-radius: 0px;
            /* border-radius: 4px; */
            /* -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, .075);
            -webkit-transition: border-color ease-in-out .15s, -webkit-box-shadow ease-in-out .15s;
            -o-transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s;
            transition: border-color ease-in-out .15s, box-shadow ease-in-out .15s; */
            box-sizing:border-box;
        }
        .col-inp{float: left;position: relative;margin-bottom: 20px;width: 100%;box-sizing: border-box;}
        </style>

        <!-- #################################### -->
        <div id="small-dialog" class="zoom-anim-dialog mfp-hide">
            <span style="padding: 15px;box-sizing: border-box;background: #fff;text-transform: uppercase;font-size: 20px;color: #515151;text-align: center;display: block;font-family:'opensans-bold'">
            <?=change_lang('Đăng nhập','Login Account')?>
                <div class="clear"></div>
                <img src="images/slogo.png" style="margin-top: 20px;">
            </span>
            <div class="clear"></div>
            <div style="padding: 10px;float: left;">

            <div class="col-inp">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                  <input type="text" placeholder="<?=change_lang('Nhập Email','Input Email')?>" name="emaillogin" id="emaillogin"  class="form-control txtlogin" autocomplete="off">
                </div>
            </div>

            <div class="col-inp">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                  <input type="password" placeholder="<?=change_lang('Nhập mật khẩu','Password')?>" name="passwordlogin" id="passwordlogin"  class="form-control txtlogin" autocomplete="off">
                </div>
            </div>
            <div class="clear"></div>
            <p class="errorlogin" style="margin-bottom:10px;"></p> 
            <div class="clear"></div>
            <a class="checklogin" id="checklogin"  onclick="CheckLoginForm()" style="padding: 10px 15px;background: url(images/bg2.png) no-repeat;background-size: cover;color:#fff;font-size: 16px;cursor: pointer;display: block;text-align: center;margin-top: 20px;border-radius: 20px;"><?=change_lang('Đăng nhập','Login')?></a>
            <div class="clear"></div>
            <p style="padding:10px 0px;margin-top: 30px;text-align: center;font-size: 12px;color:#515151"><?=change_lang('Bạn chưa có tài khoản ?','Don’t have an account ?')?> <a href="#small-dialog1" class="dk1" style="color:#F7971C"> <?=change_lang('Đăng ký','Sign Up')?> </a></p>
            <div class="clear"></div>
            <p style="text-align: center;margin-top: 5px;font-size: 12px;"><a href="#small-dialog2" class="dk2" style="color:#F7971C;"><?=change_lang('Quên mật khẩu','Forgot password')?></a></p>

            </div>
        </div>
        <!-- ################################### -->


        <!-- #################################### -->
        <div id="small-dialog1" class="zoom-anim-dialog mfp-hide">
          <span style="padding: 15px;box-sizing: border-box;background: #fff;text-transform: uppercase;font-size: 20px;color: #515151;text-align: center;display: block;font-family:'opensans-bold'">
            <?=change_lang('Đăng ký tài khoản','Sign Up')?>
                <!-- <div class="clear"></div>
                <img src="images/slogo.png" style="margin-top: 20px;"> -->
            </span>
            <div class="clear"></div>
          
          <div style="padding: 10px;float: left;">
            <div class="col-inp">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                  <input type="text" placeholder="<?=change_lang('Nhập Email','Input Email')?>" name="email" id="email" value="<?= $email ?>"  class="form-control" autocomplete="off">
                </div>
                
                <p class="erroremail"></p>
            </div>
            <div class="col-inp">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                  <input type="password" placeholder="<?=change_lang('Nhập mật khẩu','Password')?>" name="password" id="password" value="<?= $password ?>"  class="form-control">
                </div>
            </div>

            <div class="col-inp">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                  <input type="password" placeholder="<?=change_lang('Nhập lại mật khẩu','Password repeat')?>" name="re-password" id="re-password" value="<?= $repassword ?>"  class="form-control">
                </div>
            </div>

            <div class="col-inp">  
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                  <input type="text" id="name" type="text" class="form-control txtregister" name="name"  placeholder="<?=change_lang('Nhập họ tên','Input your name')?>">
                </div>
            </div>  

            <div class="col-inp">
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                  <input type="tel" id="phone" class="form-control txtregister" name="phone"  placeholder="<?=change_lang('Điện thoại','Your Phone')?>">
                </div>

                <p class="errorphone"></p>
            </div>
            <div class="col-inp">
                <div class="input-group">
                    <input class="input form-control inputcss_contact" style="width: 150px;float:left;margin-right: 5px" type="text" name="captcha" id="captcha" placeholder="Mã bảo mật" required oninvalid="this.setCustomValidity('Vui lòng nhập mã bảo mật')" oninput="setCustomValidity('')">
                    <img style="vertical-align: middle;" src="captcha_image1.php" alt="security">
                </div>
                <p class="errorcode"></p>
            </div>
            <div class="clear"></div>
                <a class="checkregister" id="checkregister" onclick="CheckRegisterForm()" style="padding: 10px 15px;background: url(images/bg2.png) no-repeat;background-size: cover;color:#fff;font-size: 16px;cursor: pointer;display: block;text-align: center;margin-top: 20px;border-radius: 20px;"><?=change_lang('Đăng ký','Sign Up')?></a>
                <div class="clear"></div>
                

                <p style="padding:10px 0px;margin-top: 30px;text-align: center;font-size: 12px;color:#515151"><?=change_lang('Bạn đã có tài khoản ?','You have an account ?')?> <a href="#small-dialog" class="dk" style="color:#F7971C"> <?=change_lang('Đăng nhập','Sign In')?> </a></p>
           
          </div> 
        </div>
        <!-- ################################### -->
        <!-- #################################### -->
        <div id="small-dialog2" class="zoom-anim-dialog mfp-hide">
          <span style="padding: 15px;box-sizing: border-box;background: #fff;text-transform: uppercase;font-size: 20px;color: #515151;text-align: center;display: block;font-family:'opensans-bold'">
                <?=change_lang('Khôi phục mật khẩu','Password recovery')?>
                <div class="clear"></div>
                <img src="images/slogo.png" style="margin-top: 20px;">
            </span>
            <div class="clear"></div>

        <div style="padding: 10px;float: left;">
            <div class="box_lostpass" style="padding: 10px;float: left;">
                <div class="col-inp">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                      <input type="text" placeholder="<?=change_lang('Nhập Email','Input Email')?>" name="emaillost" id="emaillost"  class="form-control checklostpass" autocomplete="off">
                    </div>
                </div>
                <div class="col-inp">
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-unlock-alt" aria-hidden="true"></i></span>
                      <input type="text" placeholder="<?=change_lang('Nhập mã bên dưới','Enter the code below')?>" name="captcha" id="captcha"  class="form-control" autocomplete="off">
                    </div>
                </div>
                <div style="text-align: center;"><img src="captcha_image.php" alt="captcha"></div>
                <div class="clear"></div>
                <p class="errorlostpass" style="margin-top: 10px;"></p>
                <div class="clear"></div>
                <a class="checklostpass" id="checklostpass" onclick="CheckLostpassForm()" style="padding: 10px 15px;background: url(images/bg2.png) no-repeat;background-size: cover;color:#fff;font-size: 16px;cursor: pointer;display: block;text-align: center;margin-top: 20px;border-radius: 20px;"><?=change_lang('Lấy mật khẩu','Get the password')?></a>
                <div class="clear"></div>
                

                <p style="padding:10px 0px;margin-top: 30px;text-align: center;font-size: 12px;color:#515151"><?=change_lang('Bạn chưa có tài khoản ?','Don’t have an account ?')?> <a href="#small-dialog1" class="dk1" style="color:#F7971C"> <?=change_lang('Đăng ký','Sign Up')?> </a></p>
                 
            </div>  
        </div>
        <!-- ################################### -->
        <script type="text/javascript">
        $(document).ready(function() {
          $('.dk').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,
            
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          })
        });

        $(document).ready(function() {
          $('.dk1').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,
            
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          })
        });

        $(document).ready(function() {
          $('.dk2').magnificPopup({
            type: 'inline',

            fixedContentPos: false,
            fixedBgPos: true,

            overflowY: 'auto',

            closeBtnInside: true,
            preloader: false,
            
            midClick: true,
            removalDelay: 300,
            mainClass: 'my-mfp-zoom-in'
          })
        });

        function validateEmail(email) {
          var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
          return re.test(email);
        }

        $('.txtregister').keypress(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                //alert('Bạn vừa nhấn phím "enter" trong thẻ input');    
                CheckRegisterForm();
            }
        });

        function CheckRegisterForm()
            {


                var email = document.getElementById('email');
                var matkhau = document.getElementById('password');
                var golaimatkhau = document.getElementById('re-password');
                var ten = document.getElementById('name');
                var dienthoai = document.getElementById('phone');
                var captcha = document.getElementById('captcha');

                var $err = false;

                if (captcha.value == "")
                {
                    alert("Vui lòng nhập mã bảo mật - Please enter your captcha!");
                    captcha.focus();
                    $err = true;
                    return false;
                }
                if (email.value == "")
                {
                    alert("Vui lòng nhập email - Please enter your email!");
                    email.focus();
                    $err = true;
                    return false;
                }else{
                    if(validateEmail(email.value) == false){
                        alert("Sai định dạng Email - Please enter your email!");
                        email.focus();
                        $err = true;
                        return false;
                    }
                }    
                if (matkhau.value == "")
                {
                    alert("Vui lòng nhập mật khẩu - Please enter your password!");
                    matkhau.focus();
                    $err = true;
                    return false;
                }
                if (golaimatkhau.value != matkhau.value)
                {
                    alert("Mật khẩu không đúng! Xác nhận lại mật khẩu - Password is not correct! Confirm password");
                    golaimatkhau.focus();
                    $err = true;
                    return false;
                }

                if (ten.value == "")
                {
                    alert("Vui lòng nhập tên  - Please enter your last name!");
                    ten.focus();
                    $err = true;
                    return false;
                }
                if (dienthoai.value == "")
                {
                    alert("Vui lòng nhập số điện thoại! - Please enter your phone number");
                    dienthoai.focus();
                    $err = true;
                    return false;
                }
                if (isNaN(dienthoai.value))
                {
                    alert("Số điện thoại là số và không khoảng trắng ! - Phone number is number and not space !");
                    dienthoai.focus();
                    $err = true;
                    return false;
                }

        //        if (t.captcha.value == "")
        //        {
        //            alert("Vui lòng nhập mã ! - Please enter your code");
        //            t.captcha.focus();
        //            return false;
        //        }
        		
                if($err == false){
                    $('.checkregister').css({"opacity":"0.5","cursor":"not-allowed"});
                    $('.checkregister').html("<?=change_lang('Đang xử lý ...','Loading ...')?>");
                    $('#checkregister').removeAttr('onclick');
                    setTimeout(function(){
                    $.ajax({
                        type:'POST',
                        url:'ajax/login.php',
                        data:{act:'register',email:email.value,pass:matkhau.value,name:ten.value,phone:dienthoai.value,captchadk:captcha.value},
                        /*beforeSend: function(){
                           
                            $('.checkregister').css({"opacity":"0.5","cursor":"not-allowed"});
                            $('.checkregister').html("Đang xử lý...");
                            
                        },*/
                       
                        success: function(data){
                            //alert(data);
                            $jdata = $.parseJSON(data);
                            if($jdata.loai=='1'){
                                email.value = '';
                                matkhau.value = '';
                                golaimatkhau.value = '';
                                ten.value = '';
                                dienthoai.value ='';
                                $('.checkregister').css({"opacity":"1","cursor":"pointer"});
                                $('#checkregister').attr('onclick', 'CheckRegisterForm()');
                                $('.checkregister').html('<?=change_lang('Đăng ký','Sign Up')?>');
                                alert('Đăng ký thành công');
                                location.reload();
                                //window.location = "emailregister";
                            }else{
                                $('.checkregister').css({"opacity":"1","cursor":"pointer"});
                                $('#checkregister').attr('onclick', 'CheckRegisterForm()');
                                $('.checkregister').html('<?=change_lang('Đăng ký','Sign Up')?>');
                                $('.erroremail').html($jdata.giaodien);
                                $('.errorphone').html($jdata.giaodien2);
                                $('.errorcode').html($jdata.giaodien1);
                                //window.location = "emailregister";
                            } 
                        }
                    })

                },1000); /*set time out*/
                    return true;
                } /* kiem tra err*/
            }
        </script>
        <script type="text/javascript">
        $('.txtlogin').keypress(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                //alert('Bạn vừa nhấn phím "enter" trong thẻ input');    
                CheckLoginForm();
            }
        });
        function CheckLoginForm()
            {
                var email = document.getElementById('emaillogin');
                var matkhau = document.getElementById('passwordlogin');
                var $err = false;
                if (email.value == "")
                {
                    alert("Vui lòng nhập email - Please enter your email!");
                    email.focus();
                    $err = true;
                    return false;
                }else{
                    /*if(validateEmail(email.value) == false){
                        alert("Sai định dạng Email - Please enter your email!");
                        email.focus();
                        $err = true;
                        return false;
                    }*/
                }    
                if (matkhau.value == "")
                {
                    alert("Vui lòng nhập mật khẩu - Please enter your password!");
                    matkhau.focus();
                    $err = true;
                    return false;
                }
                
                if($err == false){
                    $('.checklogin').css({"opacity":"0.5","cursor":"not-allowed"});
                    $('.checklogin').html("<?=change_lang('Đang xử lý ...','Loading ...')?>");
                    $('#checklogin').removeAttr('onclick');
                    setTimeout(function(){
                    $.ajax({
                        type:'POST',
                        url:'ajax/login.php',
                        data:{act:'login',emaillogin:email.value,passlogin:matkhau.value},
                        success: function(data){
                            
                            $jdata = $.parseJSON(data);
                            if($jdata.loai=='1'){
                                location.reload(true);
                            }else{
                                $('.checklogin').css({"opacity":"1","cursor":"pointer"});
                                $('.checklogin').html('<?=change_lang('Đăng nhập','Sign In')?>');
                                $('#checklogin').attr('onclick', 'CheckLoginForm()');
                                $('.errorlogin').html($jdata.giaodien);
                            } 
                        }
                    })

                },1000); /*set time out*/
                    return true;
                } /* kiem tra err*/
            }
        </script>
        <script type="text/javascript">
        $('.checklostpass').keypress(function (event) {
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if (keycode == '13') {
                //alert('Bạn vừa nhấn phím "enter" trong thẻ input');    
                CheckLostpassForm();
            }
        });
        function CheckLostpassForm()
            {
                var email = document.getElementById('emaillost');
                var captcha = document.getElementById('captcha');
                var $err = false;
                if (email.value == "")
                {
                    alert("Vui lòng nhập email - Please enter your email!");
                    email.focus();
                    $err = true;
                    return false;
                }else{
                    if(validateEmail(email.value) == false){
                        alert("Sai định dạng Email - Please enter your email!");
                        email.focus();
                        $err = true;
                        return false;
                    }
                }    
                 if (captcha.value == "")
                 {
                     alert("Vui lòng nhập mã - Please enter your code!");
                     captcha.focus();
                     $err = true;
                     return false;
                 }
                if($err == false){
                    $('.checklostpass').css({"opacity":"0.5","cursor":"not-allowed"});
                    $('.checklostpass').html("<?=change_lang('Đang xử lý ...','Loading ...')?>");
                    $('#checklostpass').removeAttr('onclick');
                    setTimeout(function(){
                        $.ajax({
                            type:'POST',
                            url:'ajax/login.php',
                            data:{act:'lostpass',emaillost:email.value,captcha:captcha.value},
                            success: function(data){
                                $jdata = $.parseJSON(data);
                                if($jdata.loai=='1'){
                                    email.value = '';
                                    captcha.value = '';
                                    $('.checklostpass').css({"opacity":"1","cursor":"pointer"});
                                    $('.checklostpass').html('<?=change_lang('Lấy mật khẩu','Get the password')?>');
                                    //alert('Vui lòng kiểm tra Email của bạn.');
                                    //location.reload();
                                    //window.location = "losspass";
                                    $('#checklostpass').attr('onclick','CheckLostpassForm()');
                                     $('.box_lostpass').html($jdata.giaodien);
                                }else{
                                    $('.checklostpass').css({"opacity":"1","cursor":"pointer"});
                                    $('.checklostpass').html('<?=change_lang('Lấy mật khẩu','Get the password')?>');
                                    $('#checklostpass').attr('onclick','CheckLostpassForm()');
                                    $('.box_lostpass').html($jdata.giaodien);
                                    //window.location = "losspass";
                                } 
                            }
                        })

                    },1000); /*set time out*/
                        return true;
                } /* kiem tra err*/
            }
        </script>

        <style type="text/css">
        #small-dialog {
          background: #fff;
          text-align: left;
          max-width: 380px;
          margin: 40px auto;
          position: relative;
          min-height:200px;
          overflow:hidden;
          padding:20px;
          box-sizing:border-box;
          border-radius: 8px;
        }

        #small-dialog1 {
          background: #fff;
          text-align: left;
          max-width: 380px;
          margin: 40px auto;
          position: relative;
          min-height:200px;
          overflow:hidden;
          padding:20px;
          box-sizing:border-box;
          border-radius: 8px;

        }
        #small-dialog2 {
          background: #fff;
          text-align: left;
          max-width: 380px;
          margin: 40px auto;
          position: relative;
          min-height:200px;
          overflow:hidden;
          padding:20px;
          box-sizing:border-box;
          border-radius: 8px;
        }

        .mfp-close-btn-in .mfp-close {
            color: #ccc;
        }
        .fb_dialog{bottom: 50px !important;}
        </style>
<style type="text/css">
#small-dialog-search {
  background: none;
  text-align: left;
  max-width: 400px;
  margin: 40px auto;
  position: relative;
  min-height:70px;
  z-index: 999999;
}
#small-dialog-search .mfp-close {
    color: #fff;
    margin-top: -50px;
    right:-15px;
}
.searchtop{width:100%;box-sizing: border-box;background: #fff;}
</style>
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
  $('.search_pro').magnificPopup({
    type: 'inline',

    fixedContentPos: false,
    fixedBgPos: true,

    overflowY: 'auto',

    closeBtnInside: true,
    preloader: false,
    
    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-zoom-in'
  })
});  
    
$(document).ready(function() {
    $('#txtkey1').keypress(function (event) {
        var keycode = (event.keyCode ? event.keyCode : event.which);
        if (keycode == '13') {
            //alert('Bạn vừa nhấn phím "enter" trong thẻ input');    
            searchProduct1();
        }
    });
});
    
    function searchProduct2() {
        var name_search = $('#txtkey_pro1').val();
        $.ajax({
            type:'POST',
            url:'ajax/savenamesearch.php',
            data:{name_search:name_search},
            success: function(data){
                window.location = 'tim-kiem.html/k=' + name_search;
            }
        })
    }
</script>
<div id="small-dialog-search" class="zoom-anim-dialog mfp-hide">
    <div class="searchtop">
        <div class="boxsearch" style="position: relative;width: 100%;height: 50px;border:1px solid #f2f2f2;padding:0px 0px 0px 15px;box-sizing: border-box;">
            <input type="text" name="txtkey_pro1" id="txtkey_pro1"  placeholder="Nhập mã đơn hàng bạn cần tìm..." style="border: none;padding: 15px 0px;position: absolute;width: 70%;bottom: 0px;left: 5%;background: none;outline: none;font-size: 16px;">
            <a onclick="searchProduct2()" style="cursor: pointer;"><i class="fa fa-search" aria-hidden="true" style="position: absolute;right:0px;top:0px;color:#515151;font-size: 15px;padding: 16px 25px;background: #fff;"></i></a>
        </div>
    </div>
</div>
</body>
</html>
