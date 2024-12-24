
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-562451347ab9bcb0"></script>
<div class="box_content" style="margin-top: 40px;">
    <style type="text/css">
        .nd_tonghop img{max-width:100% !important;height:auto !important;}
        .nd_tonghop{line-height: 23px;}
        .nd_tonghop p{line-height: 23px;text-align: justify;margin-bottom: 10px;}
        .nd_tonghop span{line-height: 23px;text-align: justify;}
        .nd_tonghop a{line-height: 23px;text-align: justify;}
        .nd_tonghop ul{padding-left: 20px;}
        .nd_tonghop ol{margin-bottom: 10px}
        .nd_tonghop li{margin-left: 20px}
        .othernews ul{padding: 0px;}
        .othernews ul li a{color:#696a6d;transition: all 0.5s}
        .othernews ul li a:hover{color:#070c32;transition: all 0.5s}
        .othernews ul li{margin-top:10px;}
        .keywords{display: inline-block;margin:0px 2px;padding:3px 5px;background: #948443;color:#fff;font-size: 12px;border-radius: 3px;}
    </style>        
    <div class="content" style="width:100%;float:left;padding-bottom: 30px;color: #636363;"> 
        <!-- <span class="title_cat">
            <?= $row_detail['ten'] ?>
        </span> -->
        <div style="padding:0px 10px;">
            <div class="section-heading"><h2><?= $row_detail['ten']?></h2> </div>
            <div class="clear"></div>

            <div class="nd_tonghop" style="margin-top:30px;width:100%;float:left">  
                <?= $row_detail['noidung'] ?>
            </div>  
            <div class="clear"></div>

                <!-- <?php $arrkeywords = explode(',',$row_detail['keywords']);?>
                <p style="font-family:'chakrapetch-bold';color:#333;margin-top: 30px;"><i class="fa fa-tags" aria-hidden="true"></i>&nbsp;Tags: 
                    <?php foreach ($arrkeywords as $kt => $vt) {?>
                        <a class="keywords" href="<?= $row_detail['tenkhongdau']?>"><?=$vt?></a>
                    <?php } ?>
                </p>
                <div class="clear"></div> -->
            <div class="clear"></div>
            <div class="product-share" style="margin-top: 30px;">
                    <div>
                        <span class="share-title">Share: </span>
                        <a class="share-socials" rel="nofollow" href="https://www.facebook.com/sharer/sharer.php?u=<?=getCurrentPageURL()?>" target="_blank" class=" woodmart-social-icon social-facebook"> <i class="fa fa-facebook"></i></a>

                        <a class="share-socials" rel="nofollow" href="https://twitter.com/share?url=<?=getCurrentPageURL()?>" target="_blank" class=" woodmart-social-icon social-twitter"> <i class="fa fa-twitter"></i></a>

                        <a class="share-socials" rel="nofollow" href="https://pinterest.com/pin/create/button/?url=<?=getCurrentPageURL()?>&amp;media=<?= $image_share ?>&amp;description=<?= ($title_custom != '') ? $title_custom : $title_bar . $row_setting['title_' . $lang] ?>" target="_blank" class=" woodmart-social-icon social-pinterest"> <i class="fa fa-pinterest"></i></a>

                        <a class="share-socials" rel="nofollow" href="https://www.linkedin.com/shareArticle?mini=true&amp;url=<?=getCurrentPageURL()?>" target="_blank" class=" woodmart-social-icon social-linkedin"> <i class="fa fa-linkedin"></i></a>

                        <a class="share-socials" rel="nofollow" href="https://telegram.me/share/url?url=<?=getCurrentPageURL()?>" target="_blank" class=" woodmart-social-icon social-tg"> <i class="fa fa-telegram"></i></a></div>
                    </div>    
        </div>  
            <div class="clear" style="height:20px;"></div>
            <!-- <div class="post-share" style="margin-top:10px;">
                <div class="addthis_sharing_toolbox"></div>
            </div>
            <div class="clear" style="height:20px;"></div> -->
        
            <div class="othernews" style="padding:0px 10px">
                <h2 class="section-heading"><a style="color:#515151"><?=change_lang('Bài viết khác','Orther Article')?></a></h2>
                <div class="clear"></div>
                <ul style="margin-top: 20px;list-style: none;">
                    <?php foreach ($sanpham_khac as $tinkhac) { ?>
                        <li><a href="<?= $tinkhac['tenkhongdau'] ?>" style="text-decoration:none;font-size: 15px;"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> <?= $tinkhac['ten'] ?></a><!--  (<?= make_date($tinkhac['ngaytao']) ?>) --></li>
                        <?php } ?>
                </ul>
            </div>
        </div>
    </div>
</div>
