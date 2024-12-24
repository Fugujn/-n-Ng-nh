<?php

if (!defined('_source'))
    die("Error");

@$id = addslashes($_GET['id']);
if ($id != '') {
    $d->reset();
    $sql_detail = "select title_$lang as title,keywords_$lang as keywords,description_$lang as description,id,photo,thumb,ten_$lang as ten,tenkhongdau, noidung_$lang as noidung, id_photo from #_hinhanh_hinhanh where hienthi=1 and id_photo='" . $id . "'";
    $d->query($sql_detail);
    $row_detail = $d->result_array();
	
    $title_bar = $row_detail['ten'] . ' - ';
    $title_custom = $row_detail['title'];
    $keywords_custom = $row_detail['keywords'];
    $description_custom = $row_detail['description'];

    $d->reset();
    $sql_image = "select id, tenkhongdau, ten_$lang as ten from #_hinhanh where id='" . $row_detail['id_photo'] . "' ";
    $d->query($sql_image);
    $image = $d->fetch_array();

    $title_bar = $row_detail['ten'] . ' - ';
    $title_tcat = $row_detail['ten'];
} else {
   
    $title_bar = _hinhanh . ' - ';
    $title_tcat = $menu['mota'];

    $d->reset();
    $sql_1 = "select ten_$lang as ten, id, tenkhongdau, photo, thumb from #_hinhanh where hienthi=1 order by id desc";
    $d->query($sql_1);
    $result_image = $d->result_array();
}
?>