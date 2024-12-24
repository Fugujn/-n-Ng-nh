<?php

if (!defined('_source'))
    die("Error");
if (isset($_GET['id'])) {
    #tin tuc chi tiet
    $id = addslashes($_GET['id']);

    $sql_lanxem = "UPDATE #_time SET luotxem=luotxem+1  WHERE id ='" . $id . "'";
    $d->query($sql_lanxem);

    $sql = "select ten_$lang as ten,mota_$lang as mota,noidung_$lang as noidung,ngaytao,title_$lang as title,keywords_$lang as keywords,description_$lang as description from #_time where hienthi=1 and type='" . $_GET["com"] . "' and id='" . $id . "'";
    $d->query($sql);
    $tintuc_detail = $d->result_array();
    $title_bar = $tintuc_detail[0]['ten'] . ' - ';
    $title_tcat = $tintuc_detail[0]['ten'];
    $title_custom = $tintuc_detail[0]['title'];
    $keywords_custom = $tintuc_detail[0]['keywords'];
    $description_custom = $tintuc_detail[0]['description'];

    // breakcrumb
    $breakcrumb = "<a style='color:#afafaf' href='https://" . $config_url . "'>Trang chủ </a> <span> > </span> <a style='color:#840922'>Về chúng tôi</a>";
    #các tin cu hon
    $sql_khac = "select ten_$lang as ten,tenkhongdau,ngaytao,id from #_about where hienthi=1 and id <'" . $id . "' order by stt,ngaytao desc limit 0,5";
    $d->query($sql_khac);
    $tintuc_khac = $d->result_array();
} else {



    $sql_tintuc = "select ten_$lang as ten, mota_$lang as mota,noidung_$lang as noidung,ngaytao,title_$lang as title,keywords_$lang as keywords,description_$lang as description, photo, h1,h2,h3 from #_time where type='" . $type . "'";
    $d->query($sql_tintuc);
    $tintuc_detail = $d->result_array();
    $title_custom = $tintuc_detail[0]['title'];
    $keywords_custom = $tintuc_detail[0]['keywords'];
    $description_custom = $tintuc_detail[0]['description'];
    /*$title_bar = change_lang('Giới thiệu - ', 'About us -');
    $title_tcat = change_lang('Giới thiệu', 'About us');*/

    $h1_custom = $tintuc_detail[0]['h1'];
    $h2_custom = $tintuc_detail[0]['h2'];
    $h3_custom = $tintuc_detail[0]['h3'];

    // breakcrumb
    $breakcrumb = "<i class='fa fa-home' style='margin-right:5px;color:#fff'></i><a style='color:#fff' href='http://" . $config_url . "'>".change_lang('Trang chủ','Home')."</a> <span style='padding:0px 5px'><i class='fa fa-angle-right' style='color:#fff'></i></span> <a style='color:#fff'>".$title_tcat."</a>";
    //share
    $image_share = 'https://' . $config_url . _upload_hinhanh_l . $row_photo["logo"];
}
?>