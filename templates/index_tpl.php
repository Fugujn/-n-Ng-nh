<div class="box_content">
    <div class="content"  id="map">
        <div class="title_sp"><span>Sản phẩm bán chạy</span></div>
        <div class="clear"></div>
        <?php
        if (!empty($rs_list)) {
            foreach ($rs_list as $i => $v) {
                ?>
                <div class="hinhgt">
                    <div class="ten_sp"><a href="san-pham/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html"><?= $v['ten'] ?></a></div>

                    <div class="hinhgt_l">
                        <div class="hinhgt_l_c">
                            <a href="san-pham/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html"><img src="<?= _upload_product_l . $v['photo'] ?>" /></a>
                        </div>
                    </div>
                    <!--  <div style="height: 52px;overflow: hidden;font-size: 11px;padding: 5px 10px;text-align: center;">
                    <?= $v['mota'] ?>
                     </div> -->
                    <div style="padding: 5px 10px">
                        <span style="float: left;font-size: 15px;font-weight: bold;color:#8a0303;"><?= number_format($v['gia'], 0, ',', '.') ?> đ</span>
                        <span style="float: right"><a style="color:#fff;background: #8a0303;padding: 5px 15px;font-size: 11px;border-radius: 5px;" href="san-pham/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html">Chi tiết</a></span>
                    </div>

                </div>                
                <?php
            }
        }
        ?>
        <div class="clear"></div>
        <!-- ################### -->        
        <div class="title_sp" style="margin-top: 20px;"><span>Sản phẩm bán trả góp</span></div>
        <div class="clear"></div>
        <?php
        if (!empty($rs_list_tragop)) {
            foreach ($rs_list_tragop as $i => $v) {
                ?>
                <div class="hinhgt ">
                    <div class="ten_sp"><a href="san-pham/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html"><?= $v['ten'] ?></a></div>

                    <div class="hinhgt_l">
                        <div class="hinhgt_l_c">
                            <a href="san-pham/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html"><img src="<?= _upload_product_l . $v['photo'] ?>" /></a>
                        </div>
                    </div>
                    <!--  <div style="height: 52px;overflow: hidden;font-size: 11px;padding: 5px 10px;text-align: center;">
                    <?= $v['mota'] ?>
                     </div> -->
                    <div style="padding: 5px 10px">
                        <span style="float: left;font-size: 15px;font-weight: bold;color:#8a0303;"><?= number_format($v['gia'], 0, ',', '.') ?> đ</span>
                        <span style="float: right"><a style="color:#fff;background: #8a0303;padding: 5px 15px;font-size: 11px;border-radius: 5px;" href="san-pham/<?= $v['tenkhongdau'] ?>-<?= $v['id'] ?>.html">Chi tiết</a></span>
                    </div>

                </div>                
                <?php
            }
        }
        ?>
        <div class="clear"></div>
        <style type="text/css">
            .tintc1{width:50%;float:left;margin-top:20px;font-family:uvnhongha;}
            .tintc2{width:40%;float:left;margin-top:20px;font-family:uvnhongha;margin-left:20px;}
            .tincontc{width:100%;padding:5px 10px;border-bottom:1px solid #f4f4f4;min-height:20px;overflow:hidden;}
            .tinimg{width:45%;float:left;}
            .tinimg img{width:100%;height:148px;}
            .tinnd{width:50%;float:right;}
        </style>
        <!-- ################### -->  
        <div class="tintc1">
            <div style="background: url('assets/images/xetai/titile_tinnb.png') no-repeat;height: 40px;line-height: 40px;">
                <span style="float: left;font-size: 19px;">TIN TỨC</span>
                <span style="float: right;"><a style="font-size: 11px;color:#515151" href="tin-tuc.html">Xem tất cả</a></span>
            </div>
            <?php foreach ($rs_tt as $vtt) { ?>
                <div class="tincontc">
                    <div class="tinimg"><img src="<?= _upload_tintuc_l . $vtt['photo'] ?>"></div>
                    <div class="tinnd">
                        <div style="height: 51px;overflow: hidden;"><a style="font-size: 18px;color:#8a0303;" href="tin-tuc/<?= $vtt['tenkhongdau'] ?>-<?= $vtt['id'] ?>.html"><?= $vtt['ten_vi'] ?></a></div>
                        <div style="height: 60px;overflow: hidden;margin-top: 20px;"><?= $vtt['mota_vi'] ?></div>
                        <div style="background: url('assets/images/xetai/bg_readmore.png') no-repeat;height: 19px;line-height: 19px;padding-left:10px;width: 70px;float: right"><a style="color:#8a0303" href="tin-tuc/<?= $vtt['tenkhongdau'] ?>-<?= $vtt['id'] ?>.html">Chi tiết...</a></div>
                    </div>
                </div>
                <div class="clear"></div>    
            <?php } ?>    
        </div>  
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(window).bind("load resize", function () {
                    setTimeout(function () {
                        var container_width = $('.tintc2').width();
                        $('.tintc2_c').html('<div class="fb-page" ' +
                                'data-href="<?= $rs_infor['facebook'] ?>"' +
                                ' data-width="' + container_width + '" data-tabs="timeline" data-small-header="true" data-height="300" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"></div></div>');
                        FB.XFBML.parse( );
                    }, 100);
                });
            });

        </script>          
        <div class="tintc2">
            <div style="background: url('assets/images/xetai/titile_tinnb.png') no-repeat;height: 40px;line-height: 40px;">
                <span style="float: left;font-size: 19px;">CHÍNH SÁCH QUY ĐỊNH</span>
            </div>
            <div class="clear"></div>

            <div class="tintc2_c"> 
                <div class="fb-page"  data-href="<?= $rs_infor['facebook'] ?>" data-tabs="timeline" data-height="300"  data-small-header="false" data-adapt-container-width="false" data-hide-cover="false" data-show-facepile="true"><div class="fb-xfbml-parse-ignore"></div></div>

            </div>

        </div>
    </div>
</div>





