
<div class="box_content">
    <div class="tcat"><div class="icon"><?=$title_tcat?></div></div>  
    <div class="content">
		<div class="table-responsive">
            <table class="table table-bordered service-list" border="0" cellpadding="5px" cellspacing="1px" style="font-size:13px;" width="100%">
				<?php iF(!empty($tintuc)){ foreach($tintuc as $v){?>
				<tr>
					<td width="20%"><img src="assets/images/pdf.png" alt="<?=$v["ten"]?>" /></td>
					<td width="60%" style="text-align: left; padding-left: 10px;">
						<b><?=$v["ten"]?></b><br/>
						<?=catchuoi($v["mota"],150)?>
					</td>
					<td width="20%">
						<a href="<?=_upload_tintuc_l.$v["file"]?>" class="download" target="_new" >Download</a>
					</td>
				</tr>
				<?php }}?>
			</table>
		</div>
        
    </div>
</div>
