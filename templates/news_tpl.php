<style type="text/css">
    /* .imgscale img{transition: all .3s ease}
    .imgscale:hover img{transform: scale(1.05);transition: all .3s ease;opacity: .9;}
    .tintucname:hover a{color:#013e7d !important;} */
    .tintucdichvu{margin-top: 20px;border:1px solid #e6e6e6;padding:15px;min-height: 20px;overflow: hidden;transition: all .3s ease;}
    .tintucdichvu:hover{background: #f4f4f4;}
    .tintucdichvu:hover .item_img img{
        transform: scale(1.05) !important;
        -o-transform: scale(1.05) !important;
        -moz-transform: scale(1.05) !important;
        -webkit-transform: scale(1.05) !important;
        -ms-transform: scale(1.05) !important;
        opacity: 1 !important;
    }

        .item_img{width: 30%;float: left;}
        .tintucdichvuname:hover a{color:#713131 !important;transition: all .2s;}

         .item_img a:hover:before {
        opacity: 1;
        bottom: 0px;
        right: 0px;
        -webkit-box-shadow: inset 2px 2px 2px rgba(0, 0, 0, 0.15);
        -moz-box-shadow: inset 2px 2px 2px rgba(0, 0, 0, 0.15);
        box-shadow: inset 2px 2px 2px rgba(0, 0, 0, 0.15);
    }
    .item_img a:hover:after {
        opacity: 1;
        top: 0px;
        left: 0px;
        box-shadow: inset -2px -2px 2px rgba(0, 0, 0, 0.15);
    }
        .item_img a:before {
        top: 0px;
        left: 0px;
        right: 100%;
        bottom: 100%;
        border-top: 7px solid rgba(255, 255, 255, 0.5);
        border-left: 7px solid rgba(255, 255, 255, 0.5);
        border-bottom: 7px solid transparent;
        border-right: 7px solid transparent;
    }
    .item_img a:after {
        left: 100%;
        top: 100%;
        bottom: 0px;
        right: 0px;
        border-bottom: 7px solid rgba(255, 255, 255, 0.5);
        border-right: 7px solid rgba(255, 255, 255, 0.5);
        border-top: 7px solid transparent;
        border-left: 7px solid transparent;
    }
    .item_img {
        font-size: 0;
        line-height: 0;
        position: relative;
    }
    .item_img a {
        position: relative;
        display: inline-block;
        width: 100%;
        overflow: hidden;
    }
    .item_img a:hover img, .item_img a:hover .BWfade {
        transform: scale(1.05) !important;
        -o-transform: scale(1.05) !important;
        -moz-transform: scale(1.05) !important;
        -webkit-transform: scale(1.05) !important;
        -ms-transform: scale(1.05) !important;
        opacity: 1 !important;
    }
    .item_img a img {
        opacity: 0.99;

    }
    img {
        -webkit-transition: all 0.5s linear;
        -moz-transition: all 0.5s linear;
        -o-transition: all 0.5s linear;
        transition: all 0.5s linear;
        transform: scale(1);
        -o-transform: scale(1);
        -moz-transform: scale(1);
        -webkit-transform: scale(1);
        -ms-transform: scale(1);
    }
    .item_img a:before, .item_img a:after {
        content: "";
        opacity: 0;
        pointer-events: none;
        z-index: 3;
        position: absolute;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        -webkit-transition: all 0.5s ease;
        -moz-transition: all 0.5s ease;
        -o-transition: all 0.5s ease;
        transition: all 0.5s ease;
        -webkit-box-shadow: none;
        -moz-box-shadow: none;
        box-shadow: none;
    }
    .box_tin{width: 65%;float: right;}
    .col-tt-4{width: 33.33%;float: left;margin-bottom: 20px;}
    @media (max-width: 770px){
        .col-tt-4{width: 50% !important;}
    }
    @media (max-width:650px){
        .col-tt-4{width: 100% !important;}
    }
    .leftmid{display: none;}
    .rightmid{width:100%;float:left}
</style>

<div class="box_content" style="width:100%;float:left;box-sizing: border-box;margin: 40px 0px;">     
  
    <div class="box_content_bv" style="padding:0px 0px;width: 100%;margin-bottom: 20px;float: left;box-sizing: border-box;">
        <div class="section-heading"><h2><?= $title_tcat ?></h2> </div>
    </div>
    <div class="clear" ></div>
    <?php if($com == 'hoi-dap'){?>
        <style type="text/css">
            .ques{width:100%;float: left;padding: 15px;box-sizing: border-box;border-bottom: 1px solid #ddd;cursor: pointer;}
            .ans{width:100%;float: left;padding: 15px;box-sizing: border-box;border-bottom: 1px solid #ddd;background:#f2f2f2;display: none;}
            .ans p{line-height: 22px;}
        </style>
        <script type="text/javascript">
            function callsta(id){
                $('.ans_'+id).slideToggle('fast');
            }
        </script>
            <div class="baoproductindex" style="width:100%;float:left;margin-top: 10px;">
                <?php
                if (count($product) > 0) {
                    foreach ($product as $ktt => $vtt) { ?>
                    <div id="<?=$vtt['tenkhongdau']?>" class="ques ques_<?=$vtt['id']?>" onclick="callsta('<?=$vtt['id']?>')">
                        <i style="color:#29AAE1;margin-right: 20px;font-size: 20px;" class="fa fa-plus" aria-hidden="true"></i><?=$vtt['ten']?>
                    </div>
                    <div class="ans ans_<?=$vtt['id']?>">
                        <?=$vtt['noidung']?>
                    </div>
                    <div class="clear"></div>
                <?php } } else { ?>
                    <p><?= $title_tcat ?><?= change_lang(' đang cập nhật ...', ' is updating....') ?></p>
                <?php } ?>
            </div>
    <?php }elseif($com == 'dich-vu' || $type == 'dichvu' || $com == 'bao-gia' ){?>
        <div class="baoproductindex" style="width:100%;float:left;margin-top: 10px;">
            <?php
            if (count($product) > 0) {
                foreach ($product as $ktt => $vtt) { ?>
                <div class="col-tt-4">
                    <div style="padding:0px 10px;">
                        <div class="imgbox">
                            <a href="<?=$vtt['tenkhongdau']?>"><img src="<?=_upload_thumb_l.$vtt['thumb']?>" alt="<?=$vtt['ten']?>"></a>
                        </div>
                        <h2><a class="homecathover1" href="<?=$vtt['tenkhongdau']?>"><?=$vtt['ten']?></a></h2>
                        <span style="display: block;margin-top: 5px;line-height: 22px;height: 46px;color:#6F6F6F;overflow: hidden;"><?=$vtt['mota']?></span>
                       
                    </div>
                </div>

            <!-- <div class="tintucdichvu">
                <figure class="item_img">
                    <a href="<?=$vtt['tenkhongdau']?>">
                        <img src="t.php?src=<?=_upload_tintuc_l.$vtt['photo']?>&w=400&h=250&zc=1" alt="<?=$vtt['ten_'.$lang]?>" style="width: 100%;">
                    </a>
                </figure>
            <div class="box_tin">
                <div class="tintucdichvuname" style="font-size: 16px;font-family: Arial;text-transform: uppercase;margin-bottom: 15px;font-weight: bold;"><a style="color:#444" href="<?=$vtt['tenkhongdau']?>"><?=$vtt['ten']?></a></div>
                <div class="tintucdichvumota" style="line-height: 22px;color:#777;height: 41px;overflow: hidden;"><?=$vtt['mota']?></div>
                <div class="moredetail" style="border:1px solid #e6e6e6;padding: 7px 22px 7px 17px;margin-top: 20px;color:#777;overflow: hidden;">
                   <i class="fa fa-calendar" aria-hidden="true" style="color:#013e7d"></i> <?=date('d/m/Y',$vtt['ngaytao'])?> &nbsp;&nbsp;<i style="color:#013e7d" class="fa fa-user-circle" aria-hidden="true"></i> <?=$vtt['luotxem']?>
                    <span style="float: right;color:#444;"><i class="fa fa-caret-right" aria-hidden="true"></i> <a style="color:#777" href="<?=$vtt['tenkhongdau']?>"><?=change_lang('Xem thêm','More')?></a></span>
                </div>
            </div>
            </div>    
            <div class="clear"></div> -->
            <?php } } else { ?>
                <p><?= $title_tcat ?><?= change_lang(' đang cập nhật ...', ' is updating....') ?></p>
            <?php } ?>
        </div>
    <?php }elseif($type == 'news' || $com == 'tin-tuc' || $type == 'thicong' || $type == 'cong-trinh-da-thi-cong' || $type == 'goctuvan' || $com == 'khuyen-mai' || $type == 'sales'  || $com == 'chinh-sach' || $type == 'chinhsach'){?>
        <div class="baoproductindex" style="width:100%;float:left;margin-top: 10px;">
            <?php
            if (count($product) > 0) {
                foreach ($product as $ktt => $vtt) { ?>
            <div class="tintucdichvu">
                <figure class="item_img">
                    <a href="<?=$vtt['tenkhongdau']?>">
                        <img src="<?=_upload_thumb_l.$vtt['thumb']?>" alt="<?=$vtt['ten']?>" style="width: 100%;">
                    </a>
                </figure>
            <div class="box_tin">
                <div class="tintucdichvuname" style="font-size: 16px;text-transform: uppercase;margin-bottom: 15px;"><h2 style="font-size: 18px;line-height: 25px;"><a style="color:#444" href="<?=$vtt['tenkhongdau']?>"><?=$vtt['ten']?></a></h2></div>
                <div class="tintucdichvumota" style="line-height: 22px;color:#777;height: 41px;overflow: hidden;"><?=$vtt['mota']?></div>
                <div class="moredetail" style="border-top:1px solid #e6e6e6;padding: 10px 22px 7px 0px;margin-top: 20px;color:#777;overflow: hidden;font-size: 13px;">
                   <i class="fa fa-calendar" aria-hidden="true" style="color:#713131"></i> <?=date('d/m/Y',$vtt['ngaytao'])?>
                    <span style="float: right;color:#444;"><i class="fa fa-caret-right" aria-hidden="true"></i> <a style="color:#777" href="<?=$vtt['tenkhongdau']?>"><?=change_lang('Xem thêm','More')?></a></span>
                </div>
            </div>
            </div>    
            <div class="clear"></div>
            <?php } } else { ?>
                <p><?= $title_tcat ?><?= change_lang(' đang cập nhật ...', ' is updating....') ?></p>
            <?php } ?>
        </div>
    <?php }elseif($type == 'video'){?>
        <div class="baoproductindex" style="width:100%;float:left;margin-top: 30px;">
        <?php
        if (count($tintuc) > 0) {
            foreach ($tintuc as $ktt => $vtt) { ?>
            <div class="col-tt-4">
                <div style="padding:0px 10px;">
                    <div class="imgbox">
                        <a class="popup-youtube" href="<?=$vtt['file']?>" ><img src="<?=_upload_thumb_l.$vtt['thumb']?>" alt="<?=$vtt['ten']?>"></a>
                    </div>
                    <h2><a class="popup-youtube homecathover" href="<?=$vtt['file']?>" style="text-align: left;height: 45px;margin-top: 20px;margin-bottom: 10px;" ><?=$vtt['ten']?></a></h2>
                    <span style="display: block;margin-top: 5px;line-height: 22px;height: 67px;color:#6F6F6F;overflow: hidden;"><?=$vtt['mota']?></span>
                </div>
            </div>
        <?php } } else { ?>
            <p><?= $title_tcat ?><?= change_lang(' đang cập nhật ...', ' is updating....') ?></p>
        <?php } ?>
    </div>
    <?php } ?>

    <div class="clear"></div>
    <div class="phantrang" ><?= $paging['paging'] ?></div>
</div> 

<script type="text/javascript">
$(document).ready(function() {
    $('.popup-youtube').magnificPopup({
        //disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
});
</script>