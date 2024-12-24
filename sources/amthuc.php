<?php

if (!defined('_source'))
    die("Error");
if ($tenkhongdau != '') {
   
    $d->query($sql_lanxem);

    $sql = "select id,ten_$lang as ten,mota_$lang as mota,noidung_vi as noidung,ngaytao,title_$lang as title,keywords_$lang as keywords,description_$lang as description, photo, h1, h2, h3 ,type,thumb from #_$table where hienthi=1 and tenkhongdau='" . $tenkhongdau . "'";
    $d->query($sql);
    $tintuc_detail = $d->result_array();

     #tin tuc chi tiet
    $id = $tintuc_detail[0]['id'];

    $sql_lanxem = "UPDATE #_".$table." SET luotxem=luotxem+1  WHERE id ='" . $id . "'";
    $d->query($sql_lanxem);
    
    $type = $tintuc_detail[0]['type'];
    $title_bar = $tintuc_detail[0]['ten'] . ' - ';
    $title_custom = $tintuc_detail[0]['title'];
    $keywords_custom = $tintuc_detail[0]['keywords'];
    $description_custom = $tintuc_detail[0]['description'];
	
	$h1_custom=$tintuc_detail[0]['h1'];
	$h2_custom=$tintuc_detail[0]['h2'];
	$h3_custom=$tintuc_detail[0]['h3'];
	
	// breakcrumb
	$breakcrumb="<i class='fa fa-home' style='margin-right:5px;color:#6B6B6B'></i><a style='color:#616161' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')." </a> <span style='padding:0px 5px'><i class='fa fa-angle-right'></i></span>";
    if($tintuc_detail[0]['type'] == 'huong-dan-mua-hang'){
        $breakcrumb .= "<a style='color:#616161'>Hướng dẫn mua hàng</a> <span style='padding:0px 5px'><i class='fa fa-angle-right'></i></span>";
    } elseif($tintuc_detail[0]['type'] == 'tin-tuc') {
        $breakcrumb .= "<a style='color:#616161'>Tin Tức & sự kiện</a> <span style='padding:0px 5px'><i class='fa fa-angle-right'></i></span>";
    } elseif($tintuc_detail[0]['type'] == 'khuyen-mai') {
        $breakcrumb .= "<a style='color:#616161' href='khuyen-mai'>Khuyến mãi</a> <span style='padding:0px 5px'><i class='fa fa-angle-right'></i></span>";
    } elseif($tintuc_detail[0]['type'] == 'y-kien-khach-hang') {
        $breakcrumb .= "<a style='color:#616161'>Ý kiến khách hàng</a> <span style='padding:0px 5px'><i class='fa fa-angle-right'></i></span>";
    }
    $breakcrumb .= "<a style='color:#6B6B6B'>".$tintuc_detail[0]['ten']."</a>";
	//share
	if($tintuc_detail[0]["photo"]==''){
		$image_share='http://' . $config_url ._upload_hinhanh_l.$row_photo["logo"];
	}else{
		$image_share='http://' . $config_url .'/'. _upload_tintuc_l.$tintuc_detail[0]["photo"];
	}
	
	
    #các tin cu hon
    $sql_khac = "select ten_$lang as ten,tenkhongdau,ngaytao,id,type,thumb,photo from #_$table where type='".$type."' and hienthi=1 and id <>'" . $id . "' order by stt,ngaytao desc limit 0,5";
    $d->query($sql_khac);
    $sanpham_khac = $d->result_array();
} else {
    $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,noidung_$lang as noidung,thumb,id,ngaytao,luotxem,photo,type from #_$table where type='".$type."' and hienthi=1 order by stt,ngaytao desc";
    $d->query($sql_tintuc);
    $tintuc = $d->result_array();
	
	// breakcrumb
    $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#6B6B6B'></i><a style='color:#616161' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home','Casa')." </a> <span style='padding:0px 5px'><i class='fa fa-angle-right'></i></span> <a style='color:#6B6B6B'>".$title_tcat."</a>";
	//share
	$image_share='http://' . $config_url ._upload_hinhanh_l.$row_photo["logo"];
	
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = getCurrentPageURL();
    $maxR = 10;
    $maxP = 5;
    $paging = paging_home($tintuc, $url, $curPage, $maxR, $maxP);
    $tintuc = $paging['source'];
}
?>