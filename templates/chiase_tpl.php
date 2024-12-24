
<div class="box_content">
    <div class="tcat"><div class="icon"><?= $title_tcat ?></div><div class="tcat_right">&nbsp;</div></div>
    <div class="content">            
        <?php for ($i = 0; $i < count($tintuc); $i++) { ?>     
            <div class="hinhgt" style="margin-right: 15px;"><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><img src="timthumb.php?src=<?= _upload_tintuc_l . $tintuc[$i]['photo'] ?>&w=275&h=220&zc=1" class="img-responsive"/></a>
                	<div class="ten_sp"><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><?=$tintuc[$i]['ten']?></a></div>
                    
                    <div class="hover_sp"><a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html"><?=$tintuc[$i]['ten']?></a></div>
                    <div class="name2">
                     
                       	<img src="assets/images/line_index.png">                   
                        <a href="<?=$com?>/<?=$tintuc[$i]['tenkhongdau']?>-<?=$tintuc[$i]['id']?>.html" class="xemngay">Xem ngay</a>
                    </div>
                </div>        
        <?php } ?>
        <div class="clear"></div>
        <div class="phantrang" ><?= $paging['paging'] ?></div>
        
        
        
    </div> 
</div>
