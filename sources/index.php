<?php

if (!defined('_source'))
    die("Error");
$d->reset();
$sql="select photo, mota_$lang as mota, ten_$lang as ten from #_time where type='gioi-thieu'";
$d->query($sql);
$rs_about=$d->fetch_array();

$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, photo, mota_$lang as mota, ngaytao from #_product where type='san-pham' and noibat=1 and hienthi=1 order by stt, id desc ";
$d->query($sql);
$rs_product=$d->result_array();

$d->reset();
$sql="select * from #_about where type='tin-tuc' and noibat>0 and hienthi=1 order by stt, id desc limit 2";
$d->query($sql);
$rs_tt=$d->result_array();

$d->reset();
$sql="select ten_$lang as ten,mota_$lang as mota,gia, tenkhongdau, id, photo from #_product where type='san-pham' and noibat>0 and hienthi=1 order by stt, id desc ";
$d->query($sql);
$rs_list=$d->result_array();

$d->reset();
$sql="select ten_$lang as ten,mota_$lang as mota,gia, tenkhongdau, id, photo from #_product where type='san-pham' and spkm>0 and hienthi=1 order by stt, id desc ";
$d->query($sql);
$rs_list_tragop=$d->result_array();

$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id, photo, mota_$lang as mota,photo from #_time where type='gioi-thieu' and hienthi=1 order by stt ";
$d->query($sql);
$rs_gt=$d->result_array();


$d->reset();
$sql="select ten_$lang as ten, tenkhongdau, id,link from #_video where noibat=1 and hienthi=1 order by stt, id desc";
$d->query($sql);
$rs_video=$d->result_array();

$d->reset();
$sql="select * from #_setting";
$d->query($sql);
$rs_infor=$d->fetch_array();


$tongsanpham = count($rs_product);
$curPage = isset($_GET['p']) ? $_GET['p'] : 1;
$url = getCurrentPageURL();
$maxR = 8;
$maxP = 5;
$paging = paging_home($rs_product, $url, $curPage, $maxR, $maxP);
$rs_product = $paging['source'];


?>