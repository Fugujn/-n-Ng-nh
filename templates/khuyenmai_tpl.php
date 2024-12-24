<div class="box_content">
    
    <div class="hai_tt_all">
    <?php if($_GET['com'] == 'dich-vu'){ ?>
    	Dịch vụ & bảo hành	
    <?php }else{ echo $title_tcat;} ?>
    </div>
    
    <div class="clear"></div>
    <div class="content">            
        <div class="row">
			<?php if(!empty($tintuc)){ foreach($tintuc as $v){?>
			<div class="col-xs-4 col_xxsh">
				<div class="item_product">
					
					<div class="images" align="center">
						<a href="<?=$lang?>/<?=$com?>/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html">
							<img src="timthumb.php?src=<?=_upload_tintuc_l.$v["photo"]?>&w=250&h=210&zc=2" alt="<?=$v["ten"]?>" class="img-responsive" />
						</a>
					</div>
					<div class="name">
						<h2><a href="<?=$lang?>/<?=$com?>/<?=$v["tenkhongdau"]?>-<?=$v["id"]?>.html"><?=$v["ten"]?></a></h2>
					</div>
					<div class="info">
						<?=catchuoi($v["mota"],200)?>
					</div>
				</div>
			</div>
			<?php }}?>
			
		</div>
        <div class="clear"></div>
        <div class="phantrang" ><?= $paging['paging'] ?></div>
    </div> 
</div>
