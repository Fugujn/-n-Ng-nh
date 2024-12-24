<?php
	$data = '';
	foreach($product as $k=>$v){
		$data.='<div class="result_comment">
			<div class="row">
				<div class="col-md-4 col-sm-4 col-xs-12 user_comment">
					<div class="avatar">
						<img src="assets/images/icon_user.png" class="img-responsive" alt="'.$v['ten'].'" />
					</div>
					<div class="info">
						<div class="name">
							'.$v["hoten"].'
						</div>
					</div>
				</div>
				<div class="col-md-8 col-sm-8 col-xs-12 content_comment">
					<div class="star_date">
						'.export_star($v["danhgia"]).date("d/m/Y",$v["ngaytao"]).'
					</div>
					<div class="name">'.$v['ten'].'</div>
					<div class="noidung">'.$v['noidung'].'</div>
				</div>
			</div>
		</div>';
	}
	echo $data;
				
				
				
			