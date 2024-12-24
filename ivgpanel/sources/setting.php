<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "capnhat":
        get_gioithieu();
        $template = "setting/item_add";
        break;
    case "save":
        save_gioithieu();
        break;

    default:
        $template = "index";
}

function fns_Rand_digit($min, $max, $num) {
    $result = '';
    for ($i = 0; $i < $num; $i++) {
        $result.=rand($min, $max);
    }
    return $result;
}

function get_gioithieu() {
    global $d, $item;

    $sql = "select * from #_setting limit 0,1";
    $d->query($sql);
    //if($d->num_rows()==0) transfer("Dữ liệu chưa khởi tạo.", "index.php");
    $item = $d->fetch_array();
}

function save_gioithieu() {
    global $d;
    $file_name = fns_Rand_digit(0, 9, 8);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=setting&act=capnhat");

    $data['title_vi'] = addslashes($_POST['title_vi']);
    $data['title_en'] = addslashes($_POST['title_en']);
    $data['title_sp'] = addslashes($_POST['title_sp']);

    $data['keywords_vi'] = addslashes($_POST['keywords_vi']);
    $data['keywords_en'] = addslashes($_POST['keywords_en']);
    $data['keywords_sp'] = addslashes($_POST['keywords_sp']);

    $data['description_vi'] = addslashes($_POST['description_vi']);
    $data['description_en'] = addslashes($_POST['description_en']);
    $data['description_sp'] = addslashes($_POST['description_sp']);

    $data['hotline'] = addslashes($_POST['hotline']);

    $data['ten_vi'] = addslashes($_POST['ten_vi']);
    $data['ten_en'] = addslashes($_POST['ten_en']);
    $data['ten_sp'] = addslashes($_POST['ten_sp']);

    $data['dienthoai_vi'] = addslashes($_POST['dienthoai_vi']);
    $data['dienthoai_en'] = addslashes($_POST['dienthoai_en']);
    $data['dienthoai_sp'] = addslashes($_POST['dienthoai_sp']);

    $data['fax_vi'] = addslashes($_POST['fax_vi']);
    $data['fax_en'] = addslashes($_POST['fax_en']);
    $data['fax_sp'] = addslashes($_POST['fax_sp']);

    $data['diachi_vi'] = addslashes($_POST['diachi_vi']);
    $data['diachi_en'] = addslashes($_POST['diachi_en']);
    $data['diachi1_vi'] = addslashes($_POST['diachi1_vi']);

    $data['slogan_vi'] = addslashes($_POST['slogan_vi']);
    $data['slogan_en'] = addslashes($_POST['slogan_en']);
    $data['slogan_sp'] = addslashes($_POST['slogan_sp']);

    $data['h1_vi'] = addslashes($_POST['h1_vi']);
    $data['h1_en'] = addslashes($_POST['h1_en']);
    $data['h1_sp'] = addslashes($_POST['h1_sp']);
    $data['h1_jp'] = addslashes($_POST['h1_jp']);

    $data['h2_vi'] = addslashes($_POST['h2_vi']);
    $data['h2_en'] = addslashes($_POST['h2_en']);
    $data['h2_jp'] = addslashes($_POST['h2_jp']);
    $data['h2_sp'] = addslashes($_POST['h2_sp']);

    $data['h3_vi'] = addslashes($_POST['h3_vi']);
    $data['h3_en'] = addslashes($_POST['h3_en']);
    $data['h3_jp'] = addslashes($_POST['h3_jp']);
    $data['h3_sp'] = addslashes($_POST['h4_sp']);

    $data['h4_vi'] = addslashes($_POST['h4_vi']);
    $data['h4_en'] = addslashes($_POST['h4_en']);
    $data['h4_jp'] = addslashes($_POST['h4_jp']);
    $data['h4_sp'] = addslashes($_POST['h4_sp']);

    $data['h5_vi'] = addslashes($_POST['h5_vi']);
    $data['h5_en'] = addslashes($_POST['h5_en']);
    $data['h5_jp'] = addslashes($_POST['h5_jp']);
    $data['h5_sp'] = addslashes($_POST['h5_sp']);

    $data['h6_vi'] = addslashes($_POST['h6_vi']);
    $data['h6_en'] = addslashes($_POST['h6_en']);
    $data['h6_jp'] = addslashes($_POST['h6_jp']);
    $data['h6_sp'] = addslashes($_POST['h6_sp']);

    $data['merchant_bk'] = addslashes($_POST['merchant_bk']);
    $data['pass_bk'] = addslashes($_POST['pass_bk']);
    $data['video'] = addslashes($_POST['video']);
    $data['merchant_nl'] = addslashes($_POST['merchant_nl']);
    $data['pass_nl'] = addslashes($_POST['pass_nl']);
	$data['pass123'] = addslashes($_POST['pass123']);
	$data['key123'] = addslashes($_POST['key123']);
	$data['url123'] = addslashes($_POST['url123']);
    $data['toado'] = addslashes($_POST['toado']);
    $data['email'] = addslashes($_POST['email']);
    $data['website'] = addslashes($_POST['website']);
    $data['facebook'] = addslashes($_POST['facebook']);
    $data['twitter'] = addslashes($_POST['twitter']);
    $data['google'] = addslashes($_POST['google']);
    $data['skype'] = addslashes($_POST['skype']);
    $data['youtube'] = addslashes($_POST['youtube']);
    $data['ints'] = addslashes($_POST['ints']);
    $data['gg'] = addslashes($_POST['gg']);
    $data['map'] = addslashes($_POST['map']);
    $data['livechat'] = addslashes($_POST['livechat']);


    if ($photo = upload_image("file", 'jpg|png|gif|PNG|GIF|JPEG|JPG|jpeg|ico', _upload_hinhanh, $file_name)) {
        $data['fav'] = $photo;
        $d->setTable('setting');
        $d->setWhere('id', $id);
        $d->select();
        if ($d->num_rows() > 0) {
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['photo']);
        }
    }
    if ($photo1 = upload_image("file1", 'jpg|png|gif|PNG|GIF|JPEG|JPG|jpeg|ico', _upload_hinhanh, $file_name.'_bct')) {
        $data['nl'] = $photo1;
        $d->setTable('setting');
        $d->setWhere('id', $id);
        $d->select();
        if ($d->num_rows() > 0) {
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['nl']);
        }
    }
    /*$file1 = explode('.', $_FILES['file1']['name']);
    $file2 = explode('.', $_FILES['file2']['name']);
    if ($photo = upload_image("file1", 'html|php', _upload_index, $file1[0])) {
        $data['bk'] = $photo;
        $d->setTable('setting');
        $d->setWhere('id', $id);
        $d->select();
        if ($d->num_rows() > 0) {
            $row = $d->fetch_array();
            delete_file(_upload_index . $row['bk']);
        }
    }
    if ($photo = upload_image("file2", 'html|php', _upload_index, $file2[0])) {
        $data['nl'] = $photo;
        $d->setTable('setting');
        $d->setWhere('id', $id);
        $d->select();
        if ($d->num_rows() > 0) {
            $row = $d->fetch_array();
            delete_file(_upload_index . $row['nl']);
        }
    }*/
    $d->reset();
    $d->setTable('setting');
    if ($d->update($data))
        header("Location:index.php?com=setting&act=capnhat");
    else
        transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=setting&act=capnhat");
}

?>