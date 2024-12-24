<?php
$d->reset();
$d->query("select * from #_icon where hienthi=1 and type='chinhanh' order by stt,id desc");
$chinhanhcon = $d->result_array();
?>
<style>
    .baogioithieu{width:100%;float:left;box-sizing: border-box;}
    .noidunggioithieu{width:100%;float:left;margin:20px 0px}
    .noidunggioithieu p{line-height:23px;margin-bottom: 10px;}
    .noidunggioithieu img{max-width: 100%;height:auto !important;margin:15px 0px;}
    .noidunggioithieu a{text-decoration: none;color:#3f3f3f;}
    .leftmid{display: none;}
    .rightmid{width:100%;float:left}
</style>
<div style="margin-top: 20px;">
    <div class="baogioithieu">
        <div style="padding:0px">
            <div class="section-heading"><h2><?= $title_tcat ?></h2> </div>
        </div>
        <div class="clear" ></div>
        <div class="noidunggioithieu">
            <p><?= $tintuc_detail[0]['noidung'] ?></p>
        </div>
        <div class="clear" ></div>
        <!-- <div style="width:100%;float: left;position: relative;padding:40px 0px;border-top:1px solid silver;margin-top: 40px;">
            <div class="content_home" style="position: relative;">
                <div class="title_list2">
                    <p>
                        <a style="font-size: 28px;font-weight: bold;text-transform: uppercase;">
                            <img alt="<?= $row_setting['title_'.$lang]?>" src="<?= _upload_hinhanh_l . $row_setting['fav'] ?>" style="vertical-align: middle;margin-right: 10px;width: 60px;"/>
                            HỆ THỐNG SHOWROM CỦA <?= $row_setting['ten_vi'] ?>
                        </a>
                    </p>
                </div>
                <div style="clear:both;"></div>
                <div class="chinhanh_center">
                    <?php for($i = 0; $i < count($chinhanhcon);$i++){ ?>
                        <div class="chinhanhcon">
                            <div class="showten_chinhanh">
                                <p>
                                    <a class="tencnchinh"><?= $chinhanhcon[$i]['ten_vi'] ?></a>
                                    <a class="tencnphu" href="<?= $chinhanhcon[$i]['mota1_vi'] ?>" target="_blank">
                                        <i class="fa fa-map-marker" aria-hidden="true" style="margin-right: 5px;"></i>
                                        Bản đồ
                                    </a>
                                </p>
                            </div>
                            <div class="showmota_chinhanh">
                                <p>
                                   <?= $chinhanhcon[$i]['mota_vi'] ?>
                                </p>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                    <?php } ?>
                </div>
                <div style="clear:both;"></div>
            </div>
        </div> -->
    </div>
</div>