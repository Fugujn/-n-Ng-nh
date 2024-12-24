<?php
$d->reset();
$sql = "select * from #_photo where type='photo'";
$d->query($sql);
$bgfooter = $d->fetch_array();

$d->reset();
$sql = "select * from #_setting";
$d->query($sql);
$set = $d->fetch_array();

$d->reset();
$sql = "select * from #_time where type='gioi-thieu'";
$d->query($sql);
$gioithieu = $d->fetch_array();

$d->reset();
$sql = "select * from #_footer";
$d->query($sql);
$foot = $d->fetch_array();

$d->reset();
$sql = "select * from #_icon where type='footer' ";
$d->query($sql);
$result_lk = $d->result_array();

$d->reset();
$sql = "select * from #_product where type='chinhsach' and hienthi = 1 order by stt,id desc ";
$d->query($sql);
$chinhsach = $d->result_array();

$d->reset();
$sql = "select * from #_product where type='duongdan' and hienthi = 1 order by stt,id desc ";
$d->query($sql);
$huongdanmuahang = $d->result_array();

$d->reset();
$sql = "select * from #_product_list where type='san-pham' and hienthi = 1 and com = 1 order by stt,id desc ";
$d->query($sql);
$catfoot = $d->result_array();

$d->reset();
$sql = "select * from #_product where hienthi=1 and type='news' order by stt, id desc limit 5";
$d->query($sql);
$news_footer1 = $d->result_array();
?>
<style>
    .footertop{width:1200px;margin:0 auto}
    .col-content{padding: 0px 10px;}
    .footercon{float:left;box-sizing: border-box;}
    .titlefooter{width:100%;float:left;padding-bottom: 10px}
    .titlefooter p{font-size:20px;color:#fff;text-transform: uppercase;}
    .noidungfootercon{width: 100%;float: left;text-align: justify;font-size:14px;line-height:25px;color: #ededed}
    .noidungfootercon p{font-size:14px;line-height:25px;color: #ededed}
    .noidungfootercon a{font-size:14px;line-height:25px;color: #ededed}
    .noidungfootercon ul{margin:0px;padding: 0px}
    .noidungfootercon li{padding:3px 0px;}
    .noidungfootercon li a{color:#fff;transition: all 0.5s;font-size: 14px;}
    .noidungfootercon li a:hover{color:#f2f2f2;transition: all 0.5s;padding-left: 7px;}
    .footcontent{text-align: center;margin-top: 20px;}
    .footcontent p{line-height: 23px;margin-bottom: 10px;}
    .iconcont {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        border: 1px solid #a7a7a7;
        //background: #161a21;
        color: #a7a7a7;
        text-align: center;
        transition: all .5s ease;
        display: inline-block;
        margin: 0 10px 0px 0px;
    }
    .iconcont i {
        font-size: 14px;
        line-height: 30px;
    }
    .iconcont:hover {
        background: #a7a7a7;
        color: #fff;
    }
    .footer_top{width: 100%;float: left;background: #eea24c;padding: 50px 0px}
</style>
<div class="footer_top">
    <div class="footertop">
        <div class="footercon" style="width:23%;margin-right: 2%;box-sizing: border-box;">
            <div class="col-content">
                <div class="titlefooter">
                    <p>Danh mục</p>
                </div>
                <div class="clear"></div>
                <div class="noidungfootercon" style="margin-top: 5px;">
                    <ul style="list-style: none;line-height: 25px;float: left;">
                        <li><h3 style="font-weight: normal;"><a href="gioi-thieu.html">Giới thiệu</a></h3></li>
                        <?php 
                        $d->reset();
                        $d->query("select ten_$lang as ten, id,tenkhongdau, photo,thumb,photo1 from #_product_list where com=1 and hienthi=1 and type='san-pham' order by stt,id desc limit 8");
                        $catmenu2 = $d->result_array();
                        for($i = 0; $i < count($catmenu2);$i++) { 
                        $d->reset();
                        $sql = "select ten_$lang as ten,tenkhongdau,id from #_product_list where hienthi=1 and com = 2 and id_parent = '".$catmenu2[$i]['id']."' and type = 'san-pham' order by stt, ngaytao desc";
                        $d->query($sql);
                        $menu_cap2 = $d->result_array();
                        ?>
                        <li class="left_menulv1">
                            <h3 style="font-weight: normal;">
                               <a href="<?= $catmenu2[$i]['tenkhongdau'] ?>" class="text_cap1">
                                    <?= $catmenu2[$i]['ten'] ?>  
                                </a>
                            </h3>
                        </li>
                    <?php } ?>
                        <!-- <li><h3 style="font-weight: normal;"><a href="san-pham.html">Sản phẩm</a></h3></li> -->
                        
                        <!-- <li><h3 style="font-weight: normal;"><a href="thong-tin.html">Thông tin</a></h3></li> -->
                        <li><h3 style="font-weight: normal;"><a href="lien-he.html">Liên hệ</a></h3></li>
                    </ul>  
                </div>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="footercon" style="width:23%;margin-right: 2%">
            <div class="col-content">
                <div class="titlefooter">
                    <p>Hướng dẫn mua hàng</p>
                </div>
                <div class="clear"></div>
                <div class="noidungfootercon" style="margin-top: 5px;">
                    <ul style="list-style: none;line-height: 25px;float: left;">
                        <?php foreach ($huongdanmuahang as $kc1 => $vc1) {?>
                            <li><h3 style="font-weight: normal;"><a href="<?=$vc1['tenkhongdau']?>"><?=$vc1['ten_'.$lang]?></a></h3></li>
                        <?php } ?>
                    </ul>  
                </div>
            </div>
        </div>
        <div class="footercon" style="width:23%;margin-right: 2%">
            <div class="col-content">
                <div class="titlefooter">
                    <p>Chính sách mua hàng</p>
                </div>
                <div class="clear"></div>
            
                <div class="noidungfootercon" style="margin-top: 5px;">
                    <ul style="list-style: none;line-height:25px;float: left;">
                        <?php foreach ($chinhsach as $kc => $vc) {?>
                            <li><h3 style="font-weight: normal;"><a href="<?=$vc['tenkhongdau']?>"><?=$vc['ten_'.$lang]?></a></h3></li>
                        <?php } ?>
                    </ul>  
                </div>
            </div>
        </div>
        <div class="footercon" style="width: 23%;">
            <div class="col-content">
                <div class="titlefooter">
                    <p>Thông tin</p>
                </div>
                <div class="clear"></div>
            
                <div class="noidungfootercon" style="margin-top: 5px;">
                    <ul style="list-style: none;line-height:25px;float: left;">
                        <?php foreach ($news_footer1 as $kc2 => $vc2) {?>
                            <li><h3 style="font-weight: normal;"><a href="<?=$vc2['tenkhongdau']?>"><?=$vc2['ten_'.$lang]?></a></h3></li>
                        <?php } ?>
                        <li><h3 style="font-weight: normal;"><a href="thong-tin-tuyen-dung.html">Thông tin tuyển dụng</a></h3></li>
                    </ul>  
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer_c" style="padding:50px 0px;float: left;width: 100%;box-sizing: border-box;background:#bf7828"> 
    <div class="footertop">
        
        
        <div class="footercon" style="width:30%;margin-right: 2%;box-sizing: border-box;padding-top: 0%;">
            <div class="col-content">
                <div class="titlefooter">
                    <p style="color:#fff;font-weight: bold;font-size: 18px;">Kết nối với chúng tôi</p>
                </div>
                <div class="clear"></div>
                <?php foreach ($result_lk as $klk => $vlk) {?>
                    <a class="iconcont1" target="_blank" href="<?=$vlk['url']?>" style="display: inline-block;margin-right: 10px;"> 
                        <img src="<?=_upload_icon_l.$vlk['photo']?>" alt="mxh">
                    </a>
                <?php } ?>
                <div class="clear"></div>
                <a href='http://online.gov.vn/Home/WebDetails/109206'><img alt='' title='' src='assets/images/bct.png' style="width: 160px;margin-top: 5px;" /></a>
                <div class="clear"></div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="footercon" style="width: 68%;">
            <div class="col-content">
                <div class="noidungfootercon" style="margin-top: 5px;">
                    <p><?= $gioithieu['mota_vi'] ?></p>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- <div class="clear"></div>
<div class="bottomfoot" style="color:#a9a9a9;width:100%;float: left;padding:10px;box-sizing: border-box;background:#fff;border-top: 1px solid #EFEFED;">
    <div class="content_home">
        <div class="footbottom" style="width: 100%;float: left;text-align: center;padding-top: 5px;">
            <div class="noidungfootercon" style="margin-top: 20px;">
                &copy; Copyright 2020 <span style="color:#a9a9a9;font-family:'opensans-bold'"><?= $row_setting['title_'.$lang] ?></span> - <a style="color:#a9a9a9" href="https://ivg-web.com" rel="dofollow" target="_blank" alt="Thiết kế website IVG WEB"  title="Thiết kế website IVG WEB"><?=change_lang('Thiết kế website','Design by')?> IVG WEB</a> 
            </div>
        </div>
    </div>
</div>
<div class="clear"></div> -->
<!-- <script type="text/javascript" src="assets/bootstrap-3.2.0/js/bootstrap.js"></script> -->
<!-- <style type="text/css">
        .modal-open {
    overflow: hidden;
}
.modal {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 10500;
    display: none;
    overflow: hidden;
    -webkit-overflow-scrolling: touch;
    outline: 0;
}
.modal.fade .modal-dialog {
    -webkit-transition: -webkit-transform .3s ease-out;
    -o-transition:      -o-transform .3s ease-out;
    transition:         transform .3s ease-out;
    -webkit-transform: translate3d(0, -25%, 0);
    -o-transform: translate3d(0, -25%, 0);
    transform: translate3d(0, -25%, 0);
}
.modal.in .modal-dialog {
    -webkit-transform: translate3d(0, 0, 0);
    -o-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0);
}
.modal-open .modal {
    overflow-x: hidden;
    overflow-y: auto;
}
.modal-dialog {
    position: relative;
    width: auto;
    margin: 10px;
}
.modal-content {
    position: relative;
    background-color:none;
    -webkit-background-clip: padding-box;
    background-clip: padding-box;
    border: 1px solid #999;
    border: 1px solid rgba(0, 0, 0, .2);
    border-radius: 6px;
    outline: 0;
    -webkit-box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
    box-shadow: 0 3px 9px rgba(0, 0, 0, .5);
}
.modal-backdrop {
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    z-index: 1040;
    background-color: #000;
}
.modal-backdrop.fade {
    filter: alpha(opacity=0);
    opacity: 0;
}
.modal-backdrop.in {
    filter: alpha(opacity=50);
    opacity: .5;
}
.modal-header {
    min-height: 16.42857143px;
    padding: 15px;
    border-bottom: 1px solid #e5e5e5;
}
.modal-header .close {
    margin-top: -2px;
}
.modal-title {
    margin: 0;
    line-height: 1.42857143;
}
.modal-body {
    position: relative;
    padding: 15px;
}
.modal-footer {
    padding: 15px;
    text-align: right;
    border-top: 1px solid #e5e5e5;
}
.modal-footer .btn + .btn {
    margin-bottom: 0;
    margin-left: 5px;
}
.modal-footer .btn-group .btn + .btn {
    margin-left: -1px;
}
.modal-footer .btn-block + .btn-block {
    margin-left: 0;
}
.modal-scrollbar-measure {
    position: absolute;
    top: -9999px;
    width: 50px;
    height: 50px;
    overflow: scroll;
}
@media (min-width: 768px) {
    .modal-dialog {
        max-width: 1000px;
        margin: 0 auto;
        margin-top: 13%;
    }
    .modal-content {
        -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
        box-shadow: 0 5px 15px rgba(0, 0, 0, .5);
    }
    .modal-sm {
        width: 300px;
    }
}
@media (max-width: 768px) {
    .modal-dialog {
        margin: 100px auto;
    }
}
</style>
<?php //if ($com == 'index' || $com == '' || $com == 'trang-chu'){?>    
<?php
$d->query("select * from #_photo where type='banner_top'");
$row_photo = $d->fetch_array();
//if($row_photo['hienthi']==1){
?>
    <script type="text/javascript">
        $(document).ready(function() {
        /*if ($.cookie("no_thanks") == null) {*/
          $('#myModal1').appendTo("body");
          function show_modal(){
            $('#myModal1').modal();
          }
          window.setTimeout(show_modal, 1000);
          //}
        //$(".nothanks").click(function() {
          //$.cookie('no_thanks', 'true', { expires: 36500, path: '/' });
        //});
      });
    </script>
<div class="modal fade" id="myModal1">
      <div class="modal-dialog" style="text-align: center;margin-top: 10%;">
        <div class="modal-content" style="min-height: 10px;background-color: transparent !important;box-shadow: none !important;border:none !important;">
          <button type="button" class="close" data-dismiss="modal"  data-target="#myModal1" style="margin-top:-21px;margin-right: 10px;float: right;background:none;border:none;outline: none;"><span aria-hidden="true" style="font-size: 18px;outline: none;cursor:pointer;color:#fff;">&times;</span><span style="color:#fff;cursor:pointer;" class="sr-only">Close</span></button>
 
        <div>
            <a href="<?=$row_photo['text2_en']?>"><img style="max-width: 100%;" src="<?=_upload_hinhanh_l.$row_photo['photo_ft']?>" alt="pop"></a>         
        </div>
        </div>
      </div>
</div> -->
<?php //} } ?>
