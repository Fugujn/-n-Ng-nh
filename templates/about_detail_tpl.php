<div class="box_content" style="width: 1070px;margin:0 auto;">
    <div class="content"  id="map" style="background: #fff;padding: 10px;">
        <div class="title_sp"><span><?= $breakcrumb ?></span></div>
        <div style="width: 100%;height: 63px;line-height: 63px;border-bottom: 1px solid #bfbfbf;margin:0 auto;margin-top: 20px;">
            <span class="title_dm_tc1" style="border-bottom: 4px solid #e31f2d;"><?= $title_tcat ?></span>
        </div>  
        <div class="clear"></div>

        <style type="text/css">
            .haifiximg img{max-width:100% !important;height:auto !important;}
        </style>      
        <img src="<?= _upload_hinhanh_l . $tintuc_detail[0]['photo'] ?>" alt="<?= $alt ?>" style="width: 100%;height: auto;">
        <div style="padding: 20px;border:1px solid #bcbcbc;text-align: center;font-family: roboto-light">
            <?= $tintuc_detail[0]['mota'] ?>
        </div>  
        <div class="content haifiximg" style="padding: 5px;text-align: justify;font-family: roboto-light">        
            <?= $tintuc_detail[0]['noidung'] ?>     
        </div>
    </div>
</div>
