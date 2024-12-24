<?php
$d->reset();
$sql = "select * from #_product_list where hienthi=1 and type='san-pham' and com = 1 order by stt, id desc";
$d->query($sql);
$list_pro = $d->result_array();

$d->reset();
$sql = "select * from #_product_list where hienthi=1 and type='san-pham' and com = 1 and noibat = 1 order by stt, id asc";
$d->query($sql);
$list_pronb = $d->result_array();

$d->reset();
$sql = "select ten_$lang as ten,mota_$lang as mota,tenkhongdau,id,thumb,photo,luotxem,gia,giakm,phantramgiam from #_product where hienthi=1 and type='san-pham' and noibat = 1 order by stt, id desc";
$d->query($sql);
$prodb = $d->result_array();

$d->reset();
$sql = "select ten_$lang as ten,mota_$lang as mota,tenkhongdau,id,thumb,photo,luotxem,gia,giakm,phantramgiam from #_product where hienthi=1 and type='san-pham' and noibat = 1 order by stt, id desc";
$d->query($sql);
$promoi = $d->result_array();

$d->reset();
$sql = "select * from #_time where type='gioi-thieu'";
$d->query($sql);
$gioithieu = $d->fetch_array();

$d->reset();
$sql = "select ten_$lang as ten,mota_$lang as mota,tenkhongdau,id,thumb,photo,ngaytao from #_product where hienthi=1 and type='news' and noibat > 0 order by stt, ngaytao desc";
$d->query($sql);
$news = $d->result_array();

$d->reset();
$d->query("select ten_$lang as ten,mota_$lang as mota,tenkhongdau,id,thumb,photo,ngaytao from #_product where hienthi=1 and type='thicong' and noibat > 0 order by stt, ngaytao desc");
$thicong = $d->result_array();

$d->reset();
$d->query("select * from #_icon where hienthi=1 and type='hotro' order by stt,id desc");
$hotroicon = $d->result_array();

$d->reset();
$sql_slider = "select * from #_icon where type = 'slider' and hienthi = 1 order by stt,id asc";
$d->query($sql_slider);
$result_slidermo = $d->result_array();

$d->reset();
$sql = "select * from #_time where type='trang-chu'";
$d->query($sql);
$trangchuindex = $d->fetch_array();
?>
<div class="mobilehienlen">
    <div style="width:100%;float: left;position: relative;">
        <div id="owl-demomobile" class="owl-carousel owl-theme">
            <?php foreach ($result_slidermo as $v) { ?>
                <div class="item">
                    <div class="anhslider1">
                        <a href="<?=$v['url']?>">
                            <img class="img-res" src="<?= _upload_thumb_l.$v['thumb'] ?>" alt="<?= $v['ten_vi'] ?>"  />
                        </a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <script>
        $(document).ready(function () {

            $("#owl-demomobile").owlCarousel({
                items: 1,
                slideSpeed : 1500,
                itemsDesktop : [1259, 1],
                itemsDesktopSmall : [999, 1],
                itemsTablet : [770, 1],
                itemsTabletSmall : false,
                itemsMobile : [600, 1],
                lazyLoad: true,
                navigation: true,
                autoPlay: 10000,
                autoHeight:false
            });
        });
    </script>
</div>
<style type="text/css">
    .hotrocon{width: 19.5%;float: left;margin-right: 2%;background: #eea24c;padding: 2%}
    .hotrocon:nth-child(4n){margin-right: 0px;}
    .left_hotro{width: 15%;float: left;line-height: 0px;}
    .left_hotro img{width: 100%;}
    .right_hotro{width: 80%;float: right}
    .ten_hotro{width: 100%;float: left;}
    .ten_hotro p{font-size: 18px;font-weight: bold;color: white}
    .mota_hotro{width: 100%;float: left;margin-top: 10px;height: 66px;overflow: hidden;}
    .mota_hotro p{color: white;line-height: 22px;font-size: 16px;}
</style>
<div style="width:100%;float: left;">
    <div class="content_home">
        <?php for($i = 0; $i < count($hotroicon);$i++) { ?>
            <div class="hotrocon">
                <div class="left_hotro">
                    <img src="upload/icon/<?= $hotroicon[$i]['photo'] ?>">
                </div>
                <div class="right_hotro">
                    <div class="ten_hotro">
                        <p><?= $hotroicon[$i]['ten_vi'] ?></p>
                    </div>
                    <div class="mota_hotro">
                        <p><?= $hotroicon[$i]['mota_vi'] ?></p>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
            </div>
        <?php } ?>
    </div>
</div>

<div class="clear"></div>
<!------------ #################### ---------------->
<style type="text/css">
    .showlist{width: 100%;float: left;padding-bottom: 60px;}
    .listcon{width: 100%;float: left;padding-top: 60px}
    .title_list{width: 100%;float: left;text-align: center;;}
    .title_list a{font-size: 18px;font-weight: bold;color: #050601;text-transform: uppercase;display: inline-block;padding: 15px 20px;border: 1px solid #e1e1e1;position: relative;z-index: 2;background: white}
    .linelist{width: 100%;float: left;height: 1px;background: #e1e1e1;margin-top: -30px;position: relative;z-index: 1;}

    .showlistcap2{width: 100%;float: left;margin-top: 40px;}
    .leftlist_cap2{width:23.5%;margin-right: 2%;float: left;line-height: 0px;}
    .leftlist_cap2 img{width: 100%;}
    .rightlist_cap2{width:74.5%;float: left}
    .listcap2_con{width: 32%;margin-right: 2%;float: left;position: relative;margin-bottom: 2%;overflow: hidden;}
    .listcap2_con:nth-child(3n){margin-right: 0%;float: left;}
    .listcap2_con:hover .anh_listcap2 img{transform:scale(1.2);transition: all .5s;}
    .photolistcap2{width: 100%;float: left;position: relative;}
    .anh_listcap2{width: 100%;float: left;line-height: 0px;position: relative;}
    .anh_listcap2 img{width: 100%;transition: all .5s;}
    .ten_listcap2{width: 55%;position: absolute;top: 0px;left: 0px;background: rgba(255,255,255,0.6);height: 400px;text-align: center;transition: all .5s;}
    .ten_listcap2 p{
        width: 100%;
        position: absolute;
        left: 50%; 
        top: 50%;
        transform: translateX(-50%) translateY(-50%);
        -webkit-transform: translateX(-50%) translateY(-50%);
    }
    .ten_listcap2 a{
        font-size: 22px;
        color: black;
    }
    .listcap2_con:hover .ten_listcap2{background: rgba(255,255,255,0.8);transition: all .5s;}

    .showlist_brand{width: 100%;float: left;margin-top: 30px;}
    .thongtinbrand{width: 15%;float: left;margin-right: 2%;}
    .thongtinbrand:nth-child(6n){margin-right: 0px;}
    .thongtinbrand img{max-width: 100%;text-align: center;}
</style>
<div class="showlist">
    <?php for($i = 0; $i < count($list_pronb);$i++) { ?>
        <div class="listcon">
            <div class="content_home" style="position: relative;">
                <div class="title_list">
                    <p>
                        <a>
                            <img src="images/cart_list.jpg" style="vertical-align: middle;margin-right: 10px;">
                            <?= $list_pronb[$i]['ten_vi'] ?>
                        </a>
                    </p>
                </div>
                <div style="clear:both;"></div>
                <div class="linelist"></div>
                <div style="clear:both;"></div>
                <div class="showlistcap2">
                    <div class="leftlist_cap2">
                        <a href="<?= $list_pronb[$i]['tenkhongdau'] ?>">
                            <img src="upload/thumb/<?= $list_pronb[$i]['thumb'] ?>">
                        </a>
                    </div>
                    <div class="rightlist_cap2">
                        <?php 
                        $d->reset();
                        $sql = "select * from #_product where hienthi=1 and type='san-pham' and id_list = '".$list_pronb[$i]['id']."' and noibat > 0 order by stt, id desc limit 0,8";
                        $d->query($sql);
                        $listcap2 = $d->result_array();
                        for($k = 0; $k < count($listcap2);$k++) { 
                            ?>
                            <div class="productcon" style="">
                                <?php if($listcap2[$k]['giakm'] > 0) { ?>
                                    <div class="showphantram">
                                        <p>- <?= 100 - round($listcap2[$k]['gia'] * 100 / $listcap2[$k]['giakm']) ?> %</p>
                                    </div>
                                <?php } ?>
                                <div class="colpad" style="" > 
                                    <div class="colpro">
                                        <div class="imgbox1">
                                            <a href="<?=$listcap2[$k]['tenkhongdau']?>" style="box-sizing: border-box;display: block;width: 100%;">
                                                <img class="imgname " src="<?=_upload_product1_l.$listcap2[$k]['photo']?>" alt="<?=$listcap2[$k]['ten']?>" onerror='this.src="images/no-image.svg"'>
                                            </a>
                                        </div>
                                        <a href="<?=$listcap2[$k]['tenkhongdau']?>" class="homecathover"><?=$listcap2[$k]['ten_vi']?></a>
                                        <div class="clear"></div>
                                        <p style="margin-left:15px;margin-top:10px;color:#959595;font-size:12px" class="heightms"><?=$listcap2[$k]['masp']?></p>
                                        <div class="clear"></div>
                                        <div class="baogia">
                                            <p style="padding: 0px 15px;">
                                                <?php if($listcap2[$k]['gia'] == 0) { ?>
                                                    <a>Liên hệ</a>
                                                <?php } else { ?>
                                                    <a style="text-decoration: line-through;font-size: 14px;color:silver"><?= price_sp($listcap2[$k]['giakm']) ?></a></br>
                                                    <a style="font-weight: bold;"><?= price_sp($listcap2[$k]['gia']) ?></a>
                                                <?php } ?>
                                                
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <div style="clear:both;"></div>
                </div>
                <div style="clear:both;"></div>
                <div class="showlist_brand">
                    <?php 
                    $d->reset();
                    $sql = "select * from #_product_list where hienthi=1 and type='thuong-hieu' and com = 2 and id_parent = '".$list_pronb[$i]['id']."' order by stt, id desc limit 0,6";
                    $d->query($sql);
                    $list_brandcap2 = $d->result_array();
                    for($k = 0; $k < count($list_brandcap2);$k++) { 
                        ?>
                        <div class="thongtinbrand">
                            <a href="tim-kiem?danhmuc=<?= $list_pronb[$i]['id'] ?>&brand=<?= $list_brandcap2[$k]['id'] ?>,">
                                <img class="img-res" src="<?= _upload_product_l.$list_brandcap2[$k]['photo'] ?>" alt="<?= $list_brandcap2[$k]['ten_vi'] ?>" />
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div>
    <?php } ?>
</div>

<!------------ #################### ---------------->
<style type="text/css">
    .thicongcon{width: 49%;float:left;margin-right: 2%;margin-top: 2%;position: relative;transition: all .5s;overflow: hidden}
    .thicongcon:nth-child(2n){margin-right: 0px}
    .imgthicong{width: 100%;float:left;transition: all .5s;}
    .imgthicong img{width: 100%;float:left;transition: all .5s;}
    .info_thicong{width: 96%;float:left;position: absolute;bottom: 0px;left:0px;padding:2%;background: rgba(238, 162, 76, 0.6);text-align: center}
    .info_thicong p{color:white;font-size: 16px}
    .thicongcon:hover .imgthicong img{transform:scale(1.1);transition: all .5s;}
</style>
<div style="width:100%;float: left;position: relative;background:#fff3f3;padding:40px 0px">
    <div class="content_home" style="position: relative;">
        <div class="title_list2">
            <p>
                <a style="font-size: 28px;font-weight: bold;text-transform: uppercase;">
                    <img alt="<?= $row_setting['title_'.$lang]?>" src="<?= _upload_hinhanh_l . $row_setting['fav'] ?>" style="vertical-align: middle;margin-right: 10px;width: 60px;"/>
                    DỰ ÁN ĐÃ THI CÔNG
                </a>
            </p>
        </div>
        <div style="clear:both;"></div>
        <div class="chinhanh_center">
            <?php for($i = 0; $i < count($thicong);$i++){ ?>
                <div class="thicongcon">
                    <div class="imgthicong">
                        <a href="<?=$thicong[$i]['tenkhongdau']?>"><img  src="<?=_upload_thumb_l.$thicong[$i]['thumb']?>" alt="<?=$thicong[$i]['ten']?>"></a>
                    </div>
                    <div class="info_thicong">
                        <p><?=$thicong[$i]['ten']?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div style="clear:both;"></div>
    </div>
</div>
<!------------ #################### ---------------->
<div class="clear"></div>
<div style="width:100%;float: left;position: relative;padding:40px 0px">
    <div class="content_home" style="position: relative;">
        <div class="title_list">
            <p>
                <a>
                    <img src="images/cart_list.jpg" style="vertical-align: middle;margin-right: 10px;">
                    Chia sẻ hôm nay
                </a>
            </p>
        </div>
        <div style="clear:both;"></div>
        <div class="linelist"></div>
        <div style="clear:both;"></div>
        <div style="padding:0px 10px;">
            <div class="owl-demotab-news owl-carousel owl-theme" style="margin-top: 40px;">
                <?php foreach ($news as $kp => $vp) {?>
                    <div class="item">
                        <div class="imgbox1" style="border-radius: 10px 10px 0px 0px">
                            <a href="<?=$vp['tenkhongdau']?>"><img  src="<?=_upload_thumb_l.$vp['thumb']?>" alt="<?=$vp['ten']?>"></a>
                            <a style="position:absolute;display: inline-block;padding: 10px;box-sizing: border-box;top: 20px;left:20px;background:rgba(255,255,255,1);line-height: 22px;text-align: center;color:#fff;border: 2px solid rgba(154,73,72,1)">
                                <span style="display: block;font-size: 18px;color: rgba(154,73,72,1);"><?=date("d",$vp['ngaytao'])?></span>
                                <span style="display: block;font-size: 18px;border-top:1px solid #fff;margin-top: 2px;color: rgba(154,73,72,1);"><?=date("M",$vp['ngaytao'])?></span>
                            </a>
                        </div>
                        <div style="width:100%;float: left;padding:0px 20px;box-sizing: border-box;">
                            <h2><a href="<?=$vp['tenkhongdau']?>" class="homecathover3"><?=$vp['ten']?></a></h2>
                            <div style="clear:both;"></div>
                            <div style="width: 100px;height: 2px;background: #e8e8e8;margin:20px auto 0px auto"></div>
                            <div style="clear:both;"></div>
                            <p style="color:#8d8d8d;line-height: 23px;height: 69px;overflow: hidden;margin-top:15px;text-align: center;"><?=$vp['mota']?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<div style="clear: both;"></div>
<style type="text/css">
    .noidungdetail1{text-align: justify;width:100%;float:left;margin-top:20px;line-height: 23px;font-size: 15px}
    .noidungdetail1 p{margin-bottom: 10px;font-size: 15px}
    .noidungdetail1 a{font-size: 15px}
    .noidungdetail1 img{max-width: 100%;margin:10px 0px;height:auto !important;font-size: 15px}
    .noidungdetail1 ul{padding-left: 20px;}
</style>
<div class="noidungdetail1">
    <div class="content_home" style="position: relative;">
        <?= $trangchuindex['noidung_vi'] ?>
    </div>
</div>
<style type="text/css">
    .owl-theme .owl-nav [class*=owl-]:hover {background: none;color: #FFF;text-decoration: none;outline: none}
    .owl-theme .owl-nav [class*=owl-]:active{outline: none}
    .owl-theme .owl-nav [class*=owl-]:focus{outline: none}
    .owl-theme .owl-nav{position: absolute;top:-60px;right: 20px;}
</style>
<script type="text/javascript">

$(document).ready(function() {
    $('.owl-demotab-sp').owlCarousel({
        loop:false,
        margin:5,
        autoplay:true,
        items: 5,
        //animateOut: 'fadeOut',
        dots: false,
        //startPosition: <?=$dem?>,
        //autoplayTimeout:5000,
        responsiveClass:true,
        nav: true,
        navText: ["<img src='images/prevh1.png'>","<img src='images/nexth1.png'>"],
        responsive:{
            0:{
                items:2,
                nav:false
            },
            470:{
                items:2,
                nav:false
            },
            700:{
                items:3,
                nav:false
            },
            1000:{
                items:4,
                nav:false,
            },
            1200:{
                items:5,
                nav:false,
                
            }
          
        }
    })
});

$(document).ready(function() {
    $('.owl-demotab-sp1').owlCarousel({
        loop:false,
        margin:5,
        autoplay:true,
        items: 5,
        //animateOut: 'fadeOut',
        dots: false,
        //startPosition: <?=$dem?>,
        //autoplayTimeout:5000,
        responsiveClass:true,
        nav: true,
        navText: ["<img src='images/prevh1.png'>","<img src='images/nexth1.png'>"],
        responsive:{
            0:{
                items:2,
                nav:false
            },
            470:{
                items:2,
                nav:false
            },
            700:{
                items:3,
                nav:false
            },
            1000:{
                items:4,
                nav:false,
            },
            1200:{
                items:5,
                nav:false,
                
            }
          
        }
    })
});

$(document).ready(function() {
    $('.owl-demotab-news').owlCarousel({
        loop:false,
        margin:15,
        autoplay:true,
        items: 3,
        //animateOut: 'fadeOut',
        dots: false,
        //startPosition: <?=$dem?>,
        //autoplayTimeout:5000,
        responsiveClass:true,
        nav: true,
        navText: ["<img src='images/prevh1.png'>","<img src='images/nexth1.png'>"],
        responsive:{
            0:{
                items:1,
                nav:false
            },
            470:{
                items:2,
                nav:false
            },
            700:{
                items:2,
                nav:false
            },
            1000:{
                items:3,
                nav:false,
            },
            1200:{
                items:3,
                nav:false,
                
            }
          
        }
    })
});
</script>