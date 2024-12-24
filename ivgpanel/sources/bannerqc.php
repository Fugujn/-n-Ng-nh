<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {

    case "capnhat":
        get_banner();
        $template = "bannerqc/logo_add";
        break;
    case "save":
        save_banner();
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

function get_banner() {
    global $d, $item;

    $sql = "select * from #_photo where type='photo'";
    $d->query($sql);
    $item = $d->fetch_array();
}

function save_banner() {
    global $d;
    $file_name = fns_Rand_digit(0, 9, 12);
    $file_name1 = fns_Rand_digit(0, 9, 12);
    $file_name2 = fns_Rand_digit(0, 9, 12);
    $file_name4 = fns_Rand_digit(0, 9, 12);
    $file_name5 = fns_Rand_digit(0, 9, 12);
    $file_name6 = fns_Rand_digit(0, 9, 12);
    $file_name7 = fns_Rand_digit(0, 9, 12);
    $file_name8 = fns_Rand_digit(0, 9, 12);

    $sql = "select * from #_photo where type='photo'";
    $d->query($sql);
    $item = $d->fetch_array();
    $id = $item['id'];
    //echo dump($id);

    if ($id) { // cap nhat
        if ($photo = upload_image("file", 'swf|png|jpg|jpeg|gif|PNG|GIF|SWF|JPEG|JPG', _upload_hinhanh, $file_name)) {
            $data['logo'] = $photo;
            $d->setTable('photo');
            $d->setWhere('id', $id);
            $d->select();
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['logo']);
        }

        if ($photo = upload_image("file1", 'swf|png|jpg|jpeg|gif|PNG|GIF|SWF|JPEG|JPG', _upload_hinhanh, $file_name1)) {
            $data['photo1'] = $photo;
            $d->setTable('photo');
            $d->setWhere('id', $id);
            $d->select();
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['photo1']);
        }
        if ($photo = upload_image("file2", 'swf|png|jpg|jpeg|gif|PNG|GIF|SWF|JPEG|JPG', _upload_hinhanh, $file_name2)) {
            $data['photo2'] = $photo;
            $d->setTable('photo');
            $d->setWhere('id', $id);
            $d->select();
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['photo2']);
        }
        if ($photo = upload_image("file3", 'swf|png|jpg|jpeg|gif|PNG|GIF|SWF|JPEG|JPG', _upload_hinhanh, $file_name4)) {
            $data['photo3'] = $photo;
            $d->setTable('photo');
            $d->setWhere('id', $id);
            $d->select();
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['photo3']);
        }
        if ($photo = upload_image("file4", 'swf|png|jpg|jpeg|gif|PNG|GIF|SWF|JPEG|JPG', _upload_hinhanh, $file_name5)) {
            $data['photo4'] = $photo;
            $d->setTable('photo');
            $d->setWhere('id', $id);
            $d->select();
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['photo4']);
        }
        if ($photo = upload_image("file5", 'swf|png|jpg|jpeg|gif|PNG|GIF|SWF|JPEG|JPG', _upload_hinhanh, $file_name5)) {
            $data['photo5'] = $photo;
            $d->setTable('photo');
            $d->setWhere('id', $id);
            $d->select();
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['photo5']);
        }

        if ($photo = upload_image("file6", 'swf|png|jpg|jpeg|gif|PNG|GIF|SWF|JPEG|JPG', _upload_hinhanh, $file_name6)) {
            $data['photo6'] = $photo;
            $d->setTable('photo');
            $d->setWhere('id', $id);
            $d->select();
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['photo6']);
        }

        if ($photo = upload_image("file7", 'swf|png|jpg|jpeg|gif|PNG|GIF|SWF|JPEG|JPG', _upload_hinhanh, $file_name7)) {
            $data['photo7'] = $photo;
            $d->setTable('photo');
            $d->setWhere('id', $id);
            $d->select();
            $row = $d->fetch_array();
            delete_file(_upload_hinhanh . $row['photo7']);
        }
        
        

        $data['text1_vi'] = addslashes($_POST['text1_vi']);
        $data['text1_en'] = addslashes($_POST['text1_en']);

        $data['text2_vi'] = addslashes($_POST['text2_vi']);
        $data['text2_en'] = addslashes($_POST['text2_en']);

        $data['text3_vi'] = addslashes($_POST['text3_vi']);
        $data['text3_en'] = addslashes($_POST['text3_en']);

        $data['text4_vi'] = addslashes($_POST['text4_vi']);
        $data['text4_en'] = addslashes($_POST['text4_en']);

        $data['text5_vi'] = addslashes($_POST['text5_vi']);
        $data['text5_en'] = addslashes($_POST['text5_en']);

        
        $data['link1'] = $_POST['link1'];
        $data['link2'] = $_POST['link2'];
        $data['link3'] = $_POST['link3'];
        $data['link4'] = $_POST['link4'];
        $data['link5'] = $_POST['link5'];
        $data['link6'] = $_POST['link6'];
        $data['link7'] = $_POST['link7'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        //echo dump($id);
        $d->setTable('photo');
        $d->setWhere('id', $id);
        $d->setWhere('type', 'photo');
     
        if ($d->update($data))
            redirect("index.php?com=bannerqc&act=capnhat" . $type . "");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat");
    }else { // them moi
       
        
        $data['text1_vi'] = addslashes($_POST['text1_vi']);
        $data['text1_en'] = addslashes($_POST['text1_en']);

        $data['text2_vi'] = addslashes($_POST['text2_vi']);
        $data['text2_en'] = addslashes($_POST['text2_en']);

        $data['text3_vi'] = addslashes($_POST['text3_vi']);
        $data['text3_en'] = addslashes($_POST['text3_en']);

        $data['text4_vi'] = addslashes($_POST['text4_vi']);
        $data['text4_en'] = addslashes($_POST['text4_en']);

        $data['text5_vi'] = addslashes($_POST['text5_vi']);
        $data['text5_en'] = addslashes($_POST['text5_en']);

        
        $data['link1'] = $_POST['link1'];
        $data['link2'] = $_POST['link2'];
        $data['link3'] = $_POST['link3'];
        $data['link4'] = $_POST['link4'];
        $data['link5'] = $_POST['link5'];

        $data['type'] = 'photo';
        $d->setTable('photo');
        if ($d->insert($data))
            redirect("index.php?com=bannerqc&act=capnhat");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=bannerqc&act=capnhat");
    }
}

?>