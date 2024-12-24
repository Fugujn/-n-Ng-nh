<style type="text/css">
    .baotintuccon{width: 100%;float:left;margin-top:15px;padding:0px 5px;box-sizing: border-box;}
    .mota_news{width: 100%;float:left;margin-top:15px;height: 84px;overflow: hidden}
    .mota_news p{color:#656565;font-size: 15px;line-height: 20px}
    .productleft:first-child{margin-top:10px}

    .boxhd{float: left;width: 100%;padding:30px 10px;box-sizing: border-box;border-bottom:1px solid #f2f2f2;}
    .title_re{color:#CE7A1C;cursor: pointer;}
    .content_re{padding:10px 20px 30px;box-sizing: border-box;width: 100%;float: left;}
    .content_re img{max-width: 100% !important;height:auto !important;}
    .content_re p{margin-bottom: 10px;}
</style>
<script type="text/javascript">
    function openre(id){
        $('.title_reopen_'+id).hide();
        //$('.title_reclose_'+id).show();
        $('.title_reclose_'+id).css('display','block');
        $('.content_re_'+id).show('fast');
    }
    function closere(id){
        $('.title_reopen_'+id).show();
        $('.title_reclose_'+id).hide();
        //$('.title_reclose_'+id).css('text-align','center');
        $('.content_re_'+id).hide('fast');
    }
</script>
<div class="box_content" style="width:100%;float:left;"> 
<?php if($com == 'uu-dai'){ ?>
    <div style="padding:0px 10px;width: 100%;margin-bottom: 20px;float: left;box-sizing: border-box;">
        <div class="section-heading"><h2><?= $title_tcat ?></h2> </div>
    </div>
    <div class="clear" ></div>
    <?php if (count($tintuc) > 0) { ?>
        <?php for($i = 0 ; $i < count($tintuc);$i++) { ?>
        <div class="col-sp-4">
            <div style="padding: 0px 10px">
                <div class="imgbox">
                    <a href="<?=$tintuc[$i]['tenkhongdau']?>"><img src="<?=_upload_thumb_l.$tintuc[$i]['thumb']?>" alt="<?=$tintuc[$i]['ten_'.$lang]?>"></a>
                </div>
                <a href="<?=$tintuc[$i]['tenkhongdau']?>" class="homecathover" style="margin-top: 15px;height: 45px;"><?=$tintuc[$i]['ten']?></a>
            </div>
        </div>
    <?php } } ?>            

<?php }elseif($com == 'tuyen-dung'){?>
    <div style="padding:0px 5px;width: 100%;margin-bottom: 20px;float: left;box-sizing: border-box;">
        <div class="section-heading"><h2><?= $title_tcat ?></h2> </div>
    </div>
    <div class="clear" ></div>
    <?php if (count($tintuc) > 0) { ?>
        <?php for($i = 0 ; $i < count($tintuc);$i++) { ?>
        <div class="boxhd" <?php if($i%2==0){?> style="background: #f2f2f2" <?php } ?> >    
            <div style="padding:10px;text-align: center;font-size:20px;color:#595959;"> <?= $tintuc[$i]['ten'] ?></div>
            <a class="title_reopen_<?= $tintuc[$i]['id']?> title_re" onclick="openre(<?= $tintuc[$i]['id']?>)" style="text-transform: uppercase;font-size: 13px;display: block;margin-top: 5px;text-align: center;transition: all .3s;"><?=change_lang('Xem chi tiết','View detail')?> &nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i></a>
            <div class="clear"></div>
            <a class="title_reclose_<?= $tintuc[$i]['id']?> title_re" onclick="closere(<?= $tintuc[$i]['id']?>)" style="display: none;text-transform: uppercase;font-size: 13px;margin-top: 5px;text-align: center;transition: all .3s;width: 100%;"><?=change_lang('Đóng','Close')?> &nbsp;<i class="fa fa-angle-up" aria-hidden="true"></i></a>
            <div class="content_re content_re_<?= $tintuc[$i]['id']?>" style="margin-top: 30px;display: none;font-size: 14px;line-height: 22px;"><?= $tintuc[$i]['noidung']?></div>
        </div>    
    <?php } } ?>
<?php }else{ ?>  
    <div style="padding:0px 5px;">
        <div class="section-heading"><h2><?= $title_tcat ?></h2> </div>
    </div>
    <div class="clear" ></div>
    <div class="baotintuccon">
        <?php if (count($tintuc) > 0) { ?>
            <?php 
            $dem = 1;
            for($i = 0 ; $i < count($tintuc);$i++) { ?>
                <div class="productleft" style="margin-bottom: 30px;width: 100%;border-bottom:1px solid #ececec;padding-bottom: 20px;margin-bottom: 20px">
                    <div class="baoanhspleft">
                        <a href="<?= $tintuc[$i]['tenkhongdau'] ?>">
                            <img src="upload/thumb/<?= $tintuc[$i]['thumb'] ?>"/>
                        </a>
                    </div>
                    <div class="motaspright">
                        <div class="baotensp" style="margin-top:0px;height: auto;text-align: left;font-size: 18px;font-family:'roboto-b';text-transform: uppercase;line-height: 28px;">
                          
                                <a href="<?= $tintuc[$i]['tenkhongdau'] ?>" style="">
                                    <?= $tintuc[$i]['ten'] ?>
                                </a>
                            
                        </div>
                        <p style="width: 100%;float:left;margin-top:15px;background: #f1f1f1;line-height: 40px">
                            <img src="assets/images/icon_calendar.png" style="vertical-align: middle;margin-right:5px;margin-top:-5px;margin-left:5px">
                            <a style="font-size: 14px;color:#b3b3b3"><?= date('d/m/Y',$tintuc[$i]['ngaytao']) ?></a>
                            <img src="assets/images/sp_view.png" style="vertical-align: middle;margin-right:5px;margin-top:-5px;margin-left:20px">
                            <a style="font-size: 14px;color:#b3b3b3"><?= $tintuc[$i]['luotxem'] ?></a>
                        </p>
                        <div class="mota_news" style="">
                            <p>
                                <?= $tintuc[$i]['mota'] ?>
                            </p>
                        </div>
                        <div class="clear"></div>
                    </div>
                     <div class="clear"></div>
                </div>
            <?php  } ?>
        <?php } ?>
    </div>
    <div class="clear"></div>
    <div class="phantrang" ><?= $paging['paging'] ?></div>
    <div class="clear"></div>
<?php } ?>    
</div> 
