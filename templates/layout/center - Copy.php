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
$sql = "select ten_$lang as ten,mota_$lang as mota,tenkhongdau,id,thumb,photo,luotxem,gia,giakm,phantramgiam from #_product where hienthi=1 and type='san-pham' and spkm = 1 order by stt, id desc";
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
$sql = "select ten_$lang as ten,mota_$lang as mota,tenkhongdau,id,thumb,photo from #_product where hienthi=1 and type='news' order by stt, id desc limit 3";
$d->query($sql);
$news = $d->result_array();

?>
<div style="width:100%;float: left;">
    <div class="content_home">
        <a class="adsimg" href="<?=$row_photo['link2'] ?>" style="display: block;width:49%;float: left;"><img src="<?= _upload_hinhanh_l . $row_photo['photo2'] ?>" alt="banner" style="width:100%;height: auto"></a>
        <a class="adsimg" href="<?=$row_photo['link3'] ?>" style="display: block;width:49%;float: right;"><img src="<?= _upload_hinhanh_l . $row_photo['photo3'] ?>" alt="banner" style="width:100%;height: auto"></a>
    </div>
</div>

<div class="clear"></div>

<style type="text/css">
    .txt_name_level{display: inline-block;position: absolute;bottom: 10%;left: 50%;transform: translate(-50%,0);text-align:center;color:#fff;font-family:'opensans-bold';font-size: 18px;}
    @media(max-width: 700px){
        .txt_name_level{width: 95%}
        .txt_name_level img{width: 30%}
    }
</style>
<!------------ #################### ---------------->
<!-- <div style="width:100%;float: left;margin-top: 20px;margin-bottom: 40px;">
    <div class="content_home">
        <p style="font-size: 30px;color:#363636;font-family:'opensans-bold';margin-top: 20px;padding-left: 15px;">Danh mục nổi bật</p>
        <p style="font-size: 13px;color:#9c9c9c;margin-top:10px;margin-bottom: 30px;padding-left: 15px;">Tổng hợp một số danh mục sản phẩm nổi bật Dược Mỹ Phẩm Rose</p>
        <?php foreach ($list_pronb as $kl => $vl) {?>
            <div class="col-sp-4" style="margin-bottom: 30px;">
                <div class="colpad" style="padding:0px 20px;">
                    <div class="imgbox1" style="border-radius: 10px;">
                        <a href="<?=$vl['tenkhongdau']?>">
                            <img class="imgname" src="<?=_upload_thumb_l.$vl['thumb']?>" alt="<?=$vl['ten_vi']?>">
                            <div style="background:rgba(0,0,0,0.2);width:100%;height: 100%;position: absolute;top:0px;left: 0px;"></div>
                            <span class="txt_name_level">
                                <img src="<?=_upload_thumb_l.$vl['thumb1']?>" alt="<?=$vl['ten_vi']?>"><br>
                                <?=$vl['ten_vi']?>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        <?php } ?>
        <div class="clear"></div>
        <div style="text-align: center;">
            <a class="viewdetail" href="san-pham.html">Xem tất cả</a>
        </div>
    </div>
</div> -->
<div class="clear"></div>
<style type="text/css">
    .tabsp{font-family:'chakrapetch-bold';font-size: 15px;display: inline-block;text-transform: uppercase;padding-top: 3px;color:#898989;cursor: pointer;transition: all .3s;}
    .tabsp:hover{color:#FCDF00;transition: all .3s;}
    .actsp{color:#FCDF00;transition: all .3s;}
</style>
<script type="text/javascript">
    function calltabsp(id){
        $('.tabsp').removeClass('actsp');
        $('.tabsp_'+id).addClass('actsp');
        $('.spht').hide();
        $('.spht_'+id).show();
    }
</script>
<div style="width:100%;float: left;margin-top:50px">
    <div class="content_home">
        <div style="box-shadow: 0px 0px 10px #ddd;width:100%;float: left;">
            <div style="width:100%;float: left;border-bottom: 1px solid #F3F3F3;padding:15px 20px 12px;box-sizing: border-box;margin-bottom:10px;">
                <img src="images/fav.png" alt="icon" style="float: left;vertical-align: middle;margin-right: 10px;width:25px;">
                <a class="tabsp tabsp_1 actsp" onclick="calltabsp(1)">Sản phẩm khuyến mãi</a>
                <span class="tabsp" style="padding:0px 15px;">| </span>
                <a class="tabsp tabsp_2" onclick="calltabsp(2)">Sản phẩm mới</a>
            </div>
            <div class="clear"></div>

            <div class="spht spht_1">
            <div class="owl-demotab-sp owl-carousel owl-theme" style="margin-bottom: 10px;">
                <?php for ($i = 0; $i < count($prodb); $i++) { ?>
                    <div class="item">
                        <div class="colpro">
                            <div class="imgbox1">
                                <a href="<?=$prodb[$i]['tenkhongdau']?>" style="padding:15px;box-sizing: border-box;display: block;width: 100%;"><img class="imgname" src="<?=_upload_thumb_l.$prodb[$i]['thumb']?>" alt="<?=$prodb[$i]['ten']?>" onerror='this.src="images/no-image.svg"'></a>
                                <?php if($prodb[$i]['phantramgiam'] > 0) { ?>
                                <span class="tinhtrangicon">-<?=$prodb[$i]['phantramgiam']?>%</span>
                                <?php } ?>
                            </div>
                            <a href="<?=$prodb[$i]['tenkhongdau']?>" class="homecathover"><?=$prodb[$i]['ten']?></a>
                            <div class="clear"></div>
                            <div class="baogia">
                                <p style="padding: 0px 15px;">
                                    <a><?= price_sp($prodb[$i]['gia']) ?></a>&nbsp;
                                    <?php if($prodb[$i]['phantramgiam'] > 0) { ?>&nbsp;&nbsp;&nbsp;
                                    <span class="hienmobile_be"><?= price_sp($prodb[$i]['giakm']) ?></span>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
            </div>
            </div>
            <div class="spht spht_2" style="display: none">
            <div class="owl-demotab-sp1 owl-carousel owl-theme" style="margin-bottom: 10px;">
                <?php for ($i = 0; $i < count($promoi); $i++) { ?>
                    <div class="item">
                        <div class="colpro">
                            <div class="imgbox1">
                                <a href="<?=$promoi[$i]['tenkhongdau']?>" style="padding:15px;box-sizing: border-box;display: block;width: 100%;"><img class="imgname" src="<?=_upload_thumb_l.$promoi[$i]['thumb']?>" alt="<?=$promoi[$i]['ten']?>" onerror='this.src="images/no-image.svg"'></a>
                                <?php if($promoi[$i]['phantramgiam'] > 0) { ?>
                                <span class="tinhtrangicon">-<?=$promoi[$i]['phantramgiam']?>%</span>
                                <?php } ?>
                            </div>
                            <a href="<?=$promoi[$i]['tenkhongdau']?>" class="homecathover"><?=$promoi[$i]['ten']?></a>
                            <div class="clear"></div>
                            <div class="baogia">
                                <p style="padding: 0px 15px;">
                                    <a><?= price_sp($promoi[$i]['gia']) ?></a>&nbsp;
                                    <?php if($promoi[$i]['phantramgiam'] > 0) { ?>&nbsp;&nbsp;&nbsp;
                                    <span class="hienmobile_be"><?= price_sp($promoi[$i]['giakm']) ?></span>
                                    <?php } ?>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php } ?> 
            </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="clear"></div>
<!------------ #################### ---------------->
<style type="text/css">
    .tabdm{display: inline-block;padding:2px 10px 0px;color:#333334;text-transform: uppercase;font-size:15px;transition: all .3s;cursor: pointer;}
    .tabdm:hover{color:#FCDF00;transition: all .3s;}
    .acttabdm{color:#FCDF00;}
    .dmsp{width:81%;float: left;box-sizing: border-box;}
</style>
<script type="text/javascript">
    function caltabdm(idc,id){
        $('.tabdmlv1_'+idc).removeClass('acttabdm');
        $('.tabdmlv2_'+id).addClass('acttabdm');
        $('.boxdmlv1_'+idc).hide();
        $('.boxdmlv2_'+id).show();
    }
</script>
<?php for ($i=0; $i < count($list_pronb) ; $i++) { 
    $d->reset();
    $sql = "select * from #_product_list where hienthi=1 and type='san-pham' and com = 2 and id_parent = ".$list_pronb[$i]['id']." order by stt, id asc";
    $d->query($sql);
    $list_pronblv2 = $d->result_array();
?>
<div style="width:100%;float: left;margin-top:50px;">
    <div class="content_home">
        <div style="box-shadow: 0px 0px 10px #ddd;width:100%;float: left;">
            <div style="width:100%;float: left;box-sizing: border-box;"> 
                <a style="display: inline-block;color:#FCDF00;background:#333333;padding:12px 20px 10px;font-family:'chakrapetch-bold';text-transform: uppercase;font-size:15px;"><img src="images/fav.png" alt="icon" style="float: left;vertical-align: middle;margin-right: 10px;width:21px;"><?=$list_pronb[$i]['ten_'.$lang]?></a>
                <?php for ($j=0; $j < count($list_pronblv2) ; $j++) { ?>
                    <a class="tabdm tabdmlv1_<?=$list_pronb[$i]['id']?> tabdmlv2_<?=$list_pronblv2[$j]['id']?> <?php if($j == 0){?> acttabdm <?php } ?> " onclick="caltabdm(<?=$list_pronb[$i]['id']?>,<?=$list_pronblv2[$j]['id']?>)" ><?=$list_pronblv2[$j]['ten_'.$lang]?></a>
                <?php } ?>
                <a href="<?=$list_pronb[$i]['tenkhongdau']?>" style="color:#FCDF00;display: inline-block;float: right;padding:12px 10px 10px;"><i class="fa fa-caret-right" aria-hidden="true"></i>&nbsp;Xem tất cả</a>
            </div>
            <div class="clear"></div>
            <img src="<?=_upload_thumb_l.$list_pronb[$i]['thumb1']?>" alt="<?=$list_pronb[$i]['ten_'.$lang]?>" style="width:100%;height: auto;">
            <div class="clear"></div>
            <div style="width:100%;float: left;margin:10px 15px;">
                <a href="<?=$list_pronb[$i]['tenkhongdau']?>" style="display: inline-block;width:19%;float: left;">
                    <img src="<?=_upload_thumb_l.$list_pronb[$i]['thumb']?>" alt="<?=$list_pronb[$i]['ten_'.$lang]?>" style="width:100%;height: auto;">
                </a>
                <div class="dmsp">
                    <?php for ($j=0; $j < count($list_pronblv2) ; $j++) { ?>
                    <div class="boxflex boxdmlist boxdmlv1_<?=$list_pronb[$i]['id']?> boxdmlv2_<?=$list_pronblv2[$j]['id']?>" <?php if($j!=0){?> style="display: none" <?php } ?> >
                        <?php 
                        $sql = "select * from #_product where hienthi=1 and type ='san-pham' and find_in_set('" . $list_pronblv2[$j]['id'] . "',list_id)>0 order by stt,id desc";
                        $d->query($sql);
                        $product = $d->result_array();
                        
                        for ($k = 0; $k < count($product); $k++) { ?>
                        <div class="col-sp-3">
                            <div class="colpad" style="padding:0px 10px;"> 
                                <div class="colpro">
                                    <div class="imgbox1">
                                        <a href="<?=$product[$k]['tenkhongdau']?>" style="padding:15px;box-sizing: border-box;display: block;width: 100%;"><img class="imgname" src="<?=_upload_thumb_l.$product[$k]['thumb']?>" alt="<?=$product[$k]['ten']?>" onerror='this.src="images/no-image.svg"'></a>
                                        <?php if($product[$k]['phantramgiam'] > 0) { ?>
                                        <span class="tinhtrangicon">-<?=$product[$k]['phantramgiam']?>%</span>
                                        <?php } ?>
                                    </div>
                                    <a href="<?=$product[$k]['tenkhongdau']?>" class="homecathover"><?=$product[$k]['ten_'.$lang]?></a>
                                    <div class="clear"></div>
                                    <div class="baogia">
                                        <p style="padding: 0px 15px;">
                                            <a><?= price_sp($product[$k]['gia']) ?></a>&nbsp;
                                            <?php if($product[$k]['phantramgiam'] > 0) { ?>&nbsp;&nbsp;&nbsp;
                                            <span class="hienmobile_be"><?= price_sp($product[$k]['giakm']) ?></span>
                                            <?php } ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>        
                    </div>
                    <?php } ?>
                </div>


            </div>
        </div>
    </div>
</div>    
<?php } ?>



<!-- <div style="width:100%;float: left;background:url('images/sl.jpg') no-repeat;background-size: cover;margin-top: 40px;">
    <div class="content_home" style="width:1100px;">
        <div class="col-nd-6" style="padding:30px;box-sizing: border-box;width:60%;float: left;">
            <div class="col-content" style="padding:0px 30px">
                <p style="font-family:'opensans-bold';font-size: 30px;color:#fff;">Tham vấn bác sĩ</p>
                <p style="color:#fff;font-size: 13px;margin-top: 10px;margin-bottom: 30px;">Hãy để lại thông tin của bạn để được Bác sĩ tư vấn</p>
                <form method="post" name="frm" class="forms" action="lien-he.html">    
                    <div class="pad-contact">
                        <input type="text" class="form-control" name="ten" id="ten" placeholder="<?= change_lang('Họ & tên (*)', 'Full name') ?>" required oninvalid="this.setCustomValidity('Vui lòng nhập họ và tên')" oninput="setCustomValidity('')" style="width: 80%;box-sizing: border-box;padding-left: 10px;border: 1px solid #EBEBEB;box-shadow: none;outline: none;height:47px;border-radius:10px;margin-bottom: 20px;">
                    </div>                        

                    <div class="pad-contact">
                        <input class="form-control" name="dienthoai" id="dienthoai" placeholder="<?= change_lang('Số Điện thoại (*)', 'Phone') ?>" type="tel" required oninvalid="this.setCustomValidity('Vui lòng nhập SĐT')" oninput="setCustomValidity('')" style="width: 80%;box-sizing: border-box;padding-left: 10px;border: 1px solid #EBEBEB;box-shadow: none;outline: none;height:47px;border-radius:10px;margin-bottom: 20px;"></div>

                    <div class="pad-contact">
                        <textarea style="padding: 10px;width: 100%;font-family: Arial;box-sizing: border-box;height:110px;border: 1px solid #EBEBEB;box-shadow: none;outline: none;resize: none;border-radius:10px;" name="noidung" id="noidung" class="form-control"  required oninvalid="this.setCustomValidity('Vui lòng nhập nội dung')" oninput="setCustomValidity('')" placeholder="<?= change_lang('Nội dung cần bác sĩ tư vấn (*)', 'Content') ?>"></textarea>
                    </div>
                    <input type="hidden" name="idpro" value="Tư vấn">
                    <div class="clear"></div>
                    <div class="pad-contact" style="margin-top: 20px;">
                        <button type="submit" class="btn detailbut" style="border:none;">
                            Đăng ký tư vấn ngay
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-nd-6 col-nd-6x" style="margin-top:30px;width:40%;float: left;text-align:center;">
            <div class="col-content">
                <img src="<?=_upload_hinhanh_l.$row_photo['photo2']?>" alt="liên hệ" style="max-width: 100%;height:auto;margin-top: -62px;">
            </div>
        </div>
    </div>
</div> -->
<div class="clear"></div>
<!-- <section style="width:100%;float: left;background: url('images/bgnews.png') repeat-x;padding-top: 40px;position: relative;">
    <div class="content_home">
        <div style="padding:0px 10px;">
        <a style="font-family:'opensans-bold';font-size: 20px;"><img src="images/linesmall.png" alt="icon" style="color:#252323">&nbsp;&nbsp;Góc tư vấn - <span style="color:#6f6f6f;font-size: 14px;font-family:'opensans-regular'">Tổng hợp bài tư vấn mới nhất</span></a>
        <div class="clear"></div>
        <div class="owl-demotab-news owl-carousel owl-theme" style="margin-top: 40px;">
            <?php foreach ($news as $kp => $vp) {?>
                <div class="item">
                    <div class="imgbox1">
                        <a href="<?=$vp['tenkhongdau']?>"><img class="imgname" src="<?=_upload_thumb_l.$vp['thumb']?>" alt="<?=$vp['ten']?>"></a>
                    </div>
                    <div style="width: 100%;float: left;background:url('images/linecolors.png') no-repeat;background-size: cover;height: 6px;"></div>
                    <h2><a href="<?=$vp['tenkhongdau']?>" class="homecathover3"><?=$vp['ten']?></a></h2>
                    <p style="color:#8d8d8d;line-height: 23px;height: 69px;overflow: hidden;margin-top: 20px;"><?=$vp['mota']?></p>
                </div>
            <?php } ?>
        </div>
        </div>
    </div>
</section> -->

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
                items:1,
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
                items:1,
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
</script>