<?php

if (!defined('_source'))
    die("Error");
if (isset($_GET['id'])) {
    #tin tuc chi tiet
    $id = addslashes($_GET['id']);

    $sql_lanxem = "UPDATE #_chiase SET luotxem=luotxem+1  WHERE id ='" . $id . "'";
    $d->query($sql_lanxem);

    $sql = "select ten_$lang as ten,mota_$lang as mota,noidung_$lang as noidung,ngaytao,title_$lang as title,keywords_$lang as keywords,description_$lang as description from #_chiase where hienthi=1 and id='" . $id . "'";
    $d->query($sql);
    $tintuc_detail = $d->result_array();
    $title_bar = $tintuc_detail[0]['ten'] . ' - ';
    $title_custom = $tintuc_detail[0]['title'];
    $keywords_custom = $tintuc_detail[0]['keywords'];
    $description_custom = $tintuc_detail[0]['description'];
    #các tin cu hon
    $sql_khac = "select ten_$lang as ten,tenkhongdau,ngaytao,id from #_chiase where hienthi=1 and id <'" . $id . "' order by stt,ngaytao desc limit 0,5";
    $d->query($sql_khac);
    $tintuc_khac = $d->result_array();
} else {

    $title_bar = 'Chia sẻ kinh nghiệm- ';
    $title_tcat = 'Chia sẻ kinh nghiệm';

    $sql_tintuc = "select ten_$lang as ten,tenkhongdau,mota_$lang as mota,thumb,id,ngaytao,luotxem,photo from #_chiase where hienthi=1 order by stt,ngaytao desc";
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