<div class="box_content">
    
<div class="hai_tt_all">
        <?=change_lang('Chi tiết tin','News detail')?>
    </div>
    
        <div class="clear"></div>
<style type="text/css">
    .haifiximg img{max-width:100% !important;height:auto !important;}
</style>        

    <div class="content haifiximg">    
    <span style="font-size: 20px;font-weight: bold;"><?= $tintuc_detail[0]['ten'] ?></span><br><br>
    <div class="clear"></div>    
        <?= $tintuc_detail[0]['noidung'] ?>
		<div class="clear" style="height:20px;"></div>
		<div class="post-share" style="margin-top:10px;">
			<div class="addthis_sharing_toolbox"></div>
		</div>
		<div class="clear" style="height:20px;"></div>
        <div class="othernews">
            <div class="tcat"><div class="icon"><?= _cacbaivietkhac ?></div><div class="tcat_right">&nbsp;</div></div>
            <div class="clear"></div>
            <ul>
                <?php foreach ($tintuc_khac as $tinkhac) { ?>
                    <li><a href="<?=$lang?>/<?=$com?>/<?= $tinkhac['tenkhongdau'] ?>-<?= $tinkhac['id'] ?>.html" style="text-decoration:none;">- <?= $tinkhac['ten'] ?></a> (<?= make_date($tinkhac['ngaytao']) ?>)</li>
                    <?php } ?>
            </ul>
        </div>
    </div>
</div>
