<!-- <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-562451347ab9bcb0"></script> -->
<style type="text/css">
    .left_tintuc{width: 25%;float:left;margin-top:95px;}
    .right_tintuc{width: 70%;float:right;border-left:1px solid #d9d9d9;padding-left: 2%}

    .tincon{width: 100%;float:left;}
    .tincon p{line-height: 20px}
    .tincon a{color:#464646;transition: all 0.5s;font-size:16px;font-weight: bold}
    .tincon a:hover{color:#8bd100;transition: all 0.5s}

    .active_news{color:#3c8287 !important}

    .right_noidung{color:#767676;line-height: 23px;width: 100%;float:left;text-align: left;}
    .right_noidung p{color:#767676;line-height: 23px;margin-top: 10px;}
    .right_noidung a{color:#767676;line-height: 23px;}
    .right_noidung img{max-width: 100% !important;height: auto !important;margin:10px 0px;}
    .right_noidung ul li{margin-left: 2%}
    .right_noidung iframe{width: 100%;}
    .right_noidung table,.right_noidung tbody{width: 100% !important}
    .othernews ul li{width: 100%;margin-top:10px;list-style: none}
    .othernews ul li a{color:#464646;transition: all 0.5s;text-decoration: none;font-size: 14px;}
    .othernews ul li a:hover{color:#f64a5f;transition: all 0.5s;text-decoration: none}

    .form_baogia{width: 100%;float:left;margin-top:20px;}
    .form_baogia input{width:100%;height:40px;margin-bottom:10px;padding-left:5px;border:1px solid #ecebeb;background: #fbfbfb;}
    .form_baogia textarea{width:100%;height:90px;margin-bottom:10px;padding-left:5px;border:1px solid #ecebeb;background: #fbfbfb; font-family: Arial; padding-top:9px;}

    .btn-success{background: #ab0000;color:white;padding: 10px 25px;border:none}
    .btn-primary{background: #ab0000;color:white;border:none !important;width:100px !important;border:none;padding-left:0px !important}
    .btn-success:hover{ background: #D22929; transition: all 0.4s;}

    .ghinoidung p{line-height:25px;font-size: 13px}
    .pad-contact{margin-bottom: 10px;}

    .leftdetail_noidung{width: 73%;float:left;}
    .rightdetail_noidung{width: 23%;float:right;}

    /*rate& comment*/
    .noidung_rate{width: 100%;float:left;margin-top:15px;}
    .traloi_rate{width: 100%;float:left;margin-top:15px;}
    #rateit-reset-2{display: none !important}
    div.bigstars div.rateit-range{background: url(assets/js/rateit/scripts/star-white35.png);height: 35px;}  
    div.bigstars div.rateit-hover{background: url(assets/js/rateit/scripts/star-gold35.png);} 
    div.bigstars div.rateit-selected{background: url(assets/js/rateit/scripts/star-red35.png);} 
    div.bigstars div.rateit-reset{background: url(assets/js/rateit/scripts/star-black35.png);width: 35px;height: 35px;} 
    div.bigstars div.rateit-reset:hover{background: url(assets/js/rateit/scripts/star-white35.png)}

    .pad-detailsp{width: 100%;float:left;margin-top:10px;}
    .noidung_rate input{width:30%;height:32px;margin-bottom:10px;padding-left:2%;border:1px solid #dcdcdc;background: white}
    .noidung_rate textarea{width:50%;height:25px;margin-bottom:10px;padding-left:2%;border:1px solid #dcdcdc;background: white;padding-top: 1%;float:left;}
    .tieude_formdetail{width: 20%;float:left;}
    .tieude_formdetail p{line-height: 32px}

    .traloi_ratecon{width: 100%;float:left;margin-bottom: 15px;border:1px solid #eeeeee;}
    .hinhanh_rate{width: 5%;float:left;margin-right:3%;}
    .info_user{width: 100%;float:left;}

    .thongtintren_rate{width: 98%;float:left;padding: 1%;background: #d7f0fb}
    .noidung_traloi{width: 98%;float:left;padding: 1%}
    .noidung_traloi p{font-size:13px;color:#5f5f5f;float:left;line-height: 20px}

    .line_thongtin{width: 96%;float:left;margin-top:15px;background: #efefef;padding:0px 2%;}
    .line_thongtin p{line-height: 40px;transition: all 0.5s}
    .line_thongtin a{color:#545454;transition: all 0.5s}
    .line_thongtin i{color:#545454;transition: all 0.5s}
    .binhluan:hover a{color:#179fd5;transition: all 0.5s}
    .binhluan:hover i{color:#179fd5;transition: all 0.5s}
    .form-control{width: 100% !important;box-sizing: border-box;}
</style> 
<script type="text/javascript">
    function valuerate(rateid) {
        var tenkh_rate = document.getElementById("tenkh_rate").value;
        var id_user = document.getElementById("id_user").value;
        var noidungkh_rate = document.getElementById("noidungkh_rate").value;
        var product_id = document.getElementById("product_id").value;
        
        if(tenkh_rate == ''){
            alert('Tên không được để trống.');
        } else if(noidungkh_rate == '') {
            alert('Nội dung không được để trống');
        } else {
            $.ajax({
                url: "ajax/ajax_ratenews.php",
                data: {product_id: product_id, tenkh_rate: tenkh_rate, noidungkh_rate: noidungkh_rate, id_user:id_user},
                type: "post",
                success: function (trave) {
                    alert('Thanks you for rate');
                    $('.traloi_rate').html(trave);
                    document.getElementById("noidungkh_rate").value = '';
                    
                }
            })
        }
    }
</script>

<?php if($tenkhongdau_p != '' && $type == 'tin-tuc1'){?>
<div class="box_content" style="width:100%;float:left;margin-top:40px;margin-bottom: 40px">
    <div class="leftdetail_noidung" style="width: 100%;float: left;box-sizing: border-box;">
        <div class="titleindex" style="padding-bottom: 4px;border-bottom: 1px solid #2b2a2a;margin-bottom: 30px;">
            <p><a><?= $row_detail['ten'] ?></a></p>
        </div>
        <div style="clear:both"></div>
        <div class="right_noidung">
            <p><?= $row_detail['noidung'] ?></p>
        </div>
        <div class="clear" style="height: 20px"></div>
        <div class="addthis_native_toolbox"></div>
        <div style="clear: both;height: 20px"></div>
        <p style="color:#6b6b6b;font-size: 13px;font-weight: bold;margin-bottom: 20px;width: 100%;float:left">Bài viết khác</p>
        <div style="clear: both;"></div>
        <div id="owl-demotab-newsdetail">
        <?php for($i = 0; $i < count($sanpham_khac);$i++) { ?>
            <div class="item" style="text-align: center;">
                <div style="padding:0px 10px;">
                    <div class="baoanhsp">
                        <a href="<?= $sanpham_khac[$i]['tenkhongdau'] ?>">
                            <img src="upload/thumb/<?= $sanpham_khac[$i]['thumb'] ?>" style="width: 100%;height:auto;">
                        </a>
                    </div>
                    <div class="baotensp" style="text-align: center">
                        <p>
                            <a href="<?= $sanpham_khac[$i]['tenkhongdau'] ?>" style="font-size: 14px"><?= $sanpham_khac[$i]['ten'] ?></a>
                        </p>
                    </div>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>
    <script type="text/javascript">
$(document).ready(function() {
 
  $("#owl-demotab-newsdetail").owlCarousel({
 
      autoPlay: 5000, //Set AutoPlay to 3 seconds
      items : 4,
      itemsCustom : false,
      itemsDesktop : [1259,4],
      itemsDesktopSmall : [999,3],
      itemsTablet : [770, 2],
      itemsTabletSmall : [550, 2],
      itemsMobile : [420, 1],
      navigation : false,
      navigationText : ["<img src='images/prev.png' >","<img src='images/next.png' >"],
      rewindNav : true,
      scrollPerPage : false,
      pagination : false,  
  });
});
</script>
</div>
<?php }else{?>    
<div class="box_content" style="width:100%;float:left;margin-top:40px;margin-bottom: 40px">
    <div class="leftdetail_noidung">
        <!-- <div class="titleindex">
            <p><a><?= $tintuc_detail[0]['ten'] ?></a></p>
        </div>
        <div style="clear:both"></div> -->
    <div style="width: 100%;float: left;padding:0px 10px;box-sizing: border-box;">    
        <?php if($loai_type == 'tintuc'){?> 
            
            <div class="section-heading"><h2><?= $tintuc_detail[0]['ten']?></h2> </div>
            <div class="clear" ></div>
            <div class="right_noidung">
                <?= $tintuc_detail[0]['noidung'] ?>
            </div>
        <?php }else{?>    
             <div class="section-heading"><h2><?= $tintuc_detail[0]['ten']?></h2> </div>
            <div class="clear" ></div>
            <div class="right_noidung">
                <?= $row_detail['noidung'] ?>
            </div>
        <?php } ?>   
    </div>
    <div class="clear" style="height: 20px"></div>
        <div class="addthis_native_toolbox"></div>
    <div class="clear" style="margin-top: 40px;"></div> 
    <!-- <div style="width: 100%;float: left;padding:0px 10px;box-sizing: border-box;">   
    <h2 class="section-heading" style="margin-top: 40px;"><a style="color:#515151"><?= change_lang('Đăng ký tư vấn', 'Register now','Regístrese ahora') ?></a></h2>
        <form method="post" name="frm" class="forms" action="lien-he.html">    
            <div class="tbl-contacts">
                <div class="pad-contact pad-contact1" style="width: 49%;float: left;">
                    <input type="text" style="box-sizing: border-box;" class="form-control" name="ten" id="ten" placeholder="<?= change_lang('Họ và tên', 'Full name','Nombre') ?>" required oninvalid="this.setCustomValidity('Vui lòng nhập họ và tên')" oninput="setCustomValidity('')">
                </div>                        
    
                <div class="pad-contact pad-contact1" style="width: 49%;float: right;">
                    <input style="box-sizing: border-box;" class="form-control" name="dienthoai" id="dienthoai" placeholder="<?= change_lang('Điện thoại', 'Phone','Teléfono') ?>" type="tel" required oninvalid="this.setCustomValidity('Vui lòng nhập SĐT')" oninput="setCustomValidity('')">
                </div>
                <div class="pad-contact">
                    <input style="box-sizing: border-box;" class="form-control" name="email" id="email" placeholder="<?= change_lang('Email','Email','Email') ?>" type="tel" required oninvalid="this.setCustomValidity('Vui lòng nhập email')" oninput="setCustomValidity('')">
                </div>
                <div class="pad-contact" style="margin-bottom: 5px;">
                    <textarea style="padding:5px;width:100%;font-family: Arial;box-sizing: border-box;float: left;height:100px;margin-bottom: 10px;" name="noidung" id="noidung" class="form-control" rows="5" required oninvalid="this.setCustomValidity('Vui lòng nhập nội dung')" oninput="setCustomValidity('')" placeholder="<?= change_lang('Nội dung', 'Content','Contenido') ?>"></textarea>
                </div>    
                <input type="hidden" name="checkpro" value="popup">
                <?php if($loai_type == 'tintuc'){?>
                    <input type="hidden" name="linkpro" value="<?= $tintuc_detail[0]["tenkhongdau"] ?>">
                    <input type="hidden" name="namepro" value="<?= $tintuc_detail[0]["ten"] ?>">
                <?php }elseif($loai_type == 'product'){?>    
                    <input type="hidden" name="linkpro" value="<?= $row_detail["tenkhongdau"] ?>">
                    <input type="hidden" name="namepro" value="<?= $row_detail["ten"] ?>">
                <?php } ?>
                <div class="pad-contact">
                    <input style="width: 170px;float: left;" type="text" class="form-control" name="security" id="security" placeholder="Mã bảo mật" required oninvalid="this.setCustomValidity('Vui lòng nhập mã bảo mật')" oninput="setCustomValidity('')">
                    <img style="vertical-align: middle;" src="captcha_image.php" alt="security">
                    <button type="submit" class="butall">
                        <?= change_lang('Gửi thông tin tư vấn', 'Send information','Enviar información') ?>
                    </button>
                </div>
            </div>
        </form>
        </div> -->
        
        <div style="clear: both;height: 20px"></div>
        <?php if ($_SESSION['mem_login']['email'] != '') { ?>
           <!--  <div class="khungbinhluan">
               <div class="title_rate">
                   <p style="line-height: 30px;font-size: 13px">
                       Bình luận
                   </p>
               </div>
               <div style="clear: both;"></div>
               <?php
               $d->reset();
               $sql = "select * from #_member where user = '" . $_SESSION['mem_login']['email'] . "' order by id desc ";
               $d->query($sql);
               $taikhoan = $d->fetch_array();
               ?>
               <div class="noidung_rate">
                   <div class="pad-detailsp">
                       <div class="tieude_formdetail">
                           <p>Tài khoản</p>
                       </div>
                       <input type="text" class="form-control" name="tenkh_rate" id="tenkh_rate" value="<?= $taikhoan['name'] ?>" readonly style="border:none;box-shadow: none;padding-left: 0px;font-weight: bold;margin-bottom: 0px">
                       <input type="hidden" class="form-control" name="product_id" id="product_id" value="<?= $tintuc_detail[0]['id'] ?>" readonly>
                       <input type="hidden" class="form-control" name="id_user" id="id_user" value="<?= $taikhoan['id'] ?>">
                   </div>   
                   <div class="pad-detailsp">
                       <div class="tieude_formdetail">
                           <p>Đánh giá</p>
                       </div>
                       <textarea name="noidungkh_rate" id="noidungkh_rate" class="form-control" rows="3" ></textarea>
                       <a style="display: inline-block;cursor: pointer;padding:8px 20px;background: #940e29;color:white;font-weight: bold;float:right;margin-right:7.5%" onclick="valuerate(<?= $row_detail['id'] ?>);">
                           SEND NOW
                       </a>
                   </div>   
               </div>
               <div style="clear:both"></div>
           </div>
           <div style="clear:both;height: 20px"></div> -->
        <?php } ?>
        <!-- <div class="clear"></div>
        <div class="khungcomment">
            <div class="title_rate">
                <p style="line-height: 30px;font-size: 13px">
                    Nhận xét về sản phẩm
                </p>
            </div>
            <div class="traloi_rate fixkichthuocrate">
                <?php 
                $d->reset();
                $sql = "select * from #_comment where type = 'rate-news' and product_id = '".$tintuc_detail[0]["id"]."' and hienthi = 1 order by ngaytao desc";
                $d->query($sql);
                $showform_detail = $d->result_array();
                for($i = 0 ; $i < count($showform_detail);$i++) { 
                    $d->reset();
                    $sql = "select * from #_member where hienthi = 1 and id = '".$showform_detail[$i]['id_user']."' order by ngaytao desc";
                    $d->query($sql);
                    $member_comment = $d->fetch_array();
                    ?>
                    <div class="traloi_ratecon">
                        <div class="thongtintren_rate">
                            <div class="info_user">
                                <p style="font-size:13px;color:#6d6d6d;float:left;margin-right: 10px;font-weight: bold">
                                    <?= $member_comment['name'] ?> 
                                </p>
                                <p style="font-size:12px;color:#6d6d6d;float:right;margin-right: 10px;">
                                    Ngày : <?= date('h:i:m d/m/Y',$showform_detail[$i]['ngaytao']) ?>
                                </p>
                                <div style="clear:both;"></div>
                            </div>
                        </div>
                        <div style="clear:both"></div>
                        <div class="noidung_traloi">
                            <p style="">
                                <?= $showform_detail[$i]['noidung_vi'] ?>
                            </p>
                        </div>
                    </div>
                    <div style="clear:both"></div>
                    <div class="listreply" id="r34639436">
                        <div class="reply " id="34639607" data-parent="34639436">    <div class="rowuser"><a>
                                <div class="c">
                                    <i class="iconcom-avactv"></i>
                                </div>
                                <strong onclick="selCmt(34639607)">Thanh Tâm</strong>
                                <b class="qtv">Quản trị viên</b></a>
                            </div>
                            <div class="cont"><?= $showform_detail[$i]['mota_vi'] ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>   
            <div style="clear:both"></div>
        </div> -->
    </div><!--left-->
    <div class="rightdetail_noidung">
        
        <div class="section-heading" style="margin-bottom: 20px;"><h2><?=change_lang('Bài viết khác','Orther Acticle')?></h2> </div>
        <div class="clear" ></div>
        <?php for($i = 0; $i < count($sanpham_khac);$i++) { ?>
            <div style="border-bottom:1px solid #f2f2f2;width: 100%;float: left;box-sizing: border-box;padding-bottom: 10px;margin-bottom: 10px;">    
                    <a href="<?=$sanpham_khac[$i]['tenkhongdau']?>" style="width:35%;float: left;display:inline-block;"><img src="<?=_upload_thumb_l.$sanpham_khac[$i]['thumb']?>" alt="<?=$sanpham_khac[$i]['ten']?>" style="width: 100%;height:auto;"></a>
                    <div style="float: right;width:60%;">
                        <a class="namepromore" href="<?=$sanpham_khac[$i]['tenkhongdau']?>"><?=$sanpham_khac[$i]['ten']?></a>
                        <!-- <a class="detailbut" style="margin-top: 10px;" href="<?=$sanpham_khac[$i]['tenkhongdau']?>"><?=change_lang('Xem chi tiết','View detail','Ver detalles')?>&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a> -->
                    </div>
                </div>
        <?php } ?>
    </div>
</div>
<?php } ?>