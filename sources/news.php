<?php

if (!defined('_source'))
    die("Error");
//$idc = addslashes($_GET['idc']);
if ($tenkhongdau_p != '') {
    #tin tuc chi tiet
    $id = addslashes($_GET['id']);

    

    $sql = "select ten_$lang as ten,mota_$lang as mota,noidung_$lang as noidung,ngaytao,title_$lang as title,keywords_$lang as keywords,description_$lang as description, id, photo, h1, h2, h3,type,id_item from #_news where hienthi=1 and tenkhongdau='" . $tenkhongdau_p . "'";
    $d->query($sql);
    $tintuc_detail = $d->result_array();

    $id = $tintuc_detail[0]['id'];
    $sql_lanxem = "UPDATE #_news SET luotxem=luotxem+1  WHERE id ='" . $id . "'";
    $d->query($sql_lanxem);

    $title_bar = $tintuc_detail[0]['ten'] . ' - ';
    $title_custom = $tintuc_detail[0]['title'];
    $keywords_custom = $tintuc_detail[0]['keywords'];
    $description_custom = $tintuc_detail[0]['description'];

    $h1_custom = $tintuc_detail[0]['h1'];
    $h2_custom = $tintuc_detail[0]['h2'];
    $h3_custom = $tintuc_detail[0]['h3'];

    // breakcrumb
    $breakcrumb="<a href='http://".$config_url."' style='font-size:14px;color:#7d7d7d'>".change_lang('Trang chủ', 'Home')." </a> <span style='padding:0px 5px'><i class='fa fa-angle-right'></i></span> <a style='font-size:14px;color:#D19F41' href='tin-tuc.html' >".change_lang('Tin tức','News' ,'')."</a>";
    //share
    if ($tintuc_detail[0]["photo"] == '') {
        $image_share = 'http://' . $config_url . _upload_hinhanh_l . $row_photo["logo"];
    } else {
        $image_share = 'http://' . $config_url . '/' . _upload_tintuc_l . $tintuc_detail[0]["photo"];
    }

    #các tin cu hon
    $sql_khac = "select ten_$lang as ten,tenkhongdau,ngaytao,id from #_news where type='".$tintuc_detail[0]['type']."' and hienthi=1 and id <>'" . $id . "' and id_item = ".$tintuc_detail[0]['id_item']." order by stt,ngaytao desc limit 0,5";
    $d->query($sql_khac);
    $tintuc_khac = $d->result_array();
} elseif ($tenkhongdau != '') {
    $d->reset();
    $sql = "select ten_$lang as ten, tenkhongdau, id, title_$lang as title, keywords_$lang as keywords, description_$lang as description, h1, h2, h3 from #_news_item where tenkhongdau='" . $tenkhongdau . "' and type='" . $type . "' and hienthi=1";
    $d->query($sql);
    $rs_idc = $d->fetch_array();
    $idc = $rs_idc['id'];
    $title_tcat = $rs_idc['ten'];
    $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,id,ngaytao,luotxem,photo, noidung_$lang as noidung from #_news where id_item='" . $idc . "' and type='" . $type . "'and hienthi=1 order by stt,ngaytao desc";
    $d->query($sql_tintuc);
    $tintuc = $d->result_array();

    // breakcrumb
    $breakcrumb = "<a style='font-size:14px;color:#7d7d7d' href='http://" . $config_url . "'>Trang chủ </a> <span> <i class='fa fa-angle-right'></i> </span> <a style='font-size:14px;color:#D19F41'> " . $title_tcat. "</a>";
    //share
    $image_share = 'http://' . $config_url . _upload_hinhanh_l . $row_photo["logo"];
    $title_custom = $rs_idc['title'];
    $keywords_custom = $rs_idc['keywords'];
    $description_custom = $rs_idc['description'];

    $h1_custom = $rs_idc['h1'];
    $h2_custom = $rs_idc['h2'];
    $h3_custom = $rs_idc['h3'];
    $title_bar = $rs_idc['ten'] . ' - ';
    

    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = getCurrentPageURL();
    $maxR = 10;
    $maxP = 5;
    $paging = paging_home($tintuc, $url, $curPage, $maxR, $maxP);
    $tintuc = $paging['source'];
} else {
if($type == 'tin-tuc'){
    $title_bar = change_lang('Tin tức - ','News - ' ,'');
    $title_tcat = change_lang('Tin tức','News' ,'');
}elseif($type == 'video'){
    $title_bar = 'Video - ';
    $title_tcat = 'Video';
} 
    // breakcrumb
    $breakcrumb="<a href='http://".$config_url."' style='font-size:14px;color:#7d7d7d'>".change_lang('Trang chủ', 'Home')." </a> <span style='padding:0px 5px'><i class='fa fa-angle-right'></i></span> <a style='font-size:14px;color:#D19F41'>".$title_tcat."</a>";
    //share
    $image_share = 'http://' . $config_url . _upload_hinhanh_l . $row_photo["logo"];
    $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,id,ngaytao,luotxem,photo, noidung_$lang as noidung,file from #_news where type='" . $type . "' and hienthi=1 order by stt,ngaytao desc";
    $d->query($sql_tintuc);
    $tintuc = $d->result_array();
    $curPage = isset($_GET['p']) ? $_GET['p'] : 1;
    $url = getCurrentPageURL();
    $maxR = 10;
    $maxP = 5;
    $paging = paging_home($tintuc, $url, $curPage, $maxR, $maxP);
    $tintuc = $paging['source'];
}
?>