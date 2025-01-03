<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "icon/items";
        break;
    case "add":
        $template = "icon/item_add";
        break;
    case "edit":
        get_item();
        $template = "icon/item_add";
        break;
    case "save":
        save_item();
        break;
    case "delete":
        delete_item();
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

function get_items() {
    global $d,$type, $items, $paging;

    $sql = "select * from #_icon where type ='".$type."'  order by stt";
    $d->query($sql);
    $items = $d->result_array();
    

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=icon&type=".$type."&act=man";
    $maxR = 20;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d,$type, $item;
    @$id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=icon&type=".$type."&act=man");

    $sql = "select * from #_icon where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=icon&type=".$type."&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d,$type;
    $file_name = fns_Rand_digit(0, 9, 8);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=icon&type=".$type."&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) {
        $id = themdau($_POST['id']);

        if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_icon, $file_name)) {
            $data['photo'] = $photo;
            if($_REQUEST['type'] == 'doitac') {
                $data['thumb'] = create_thumb($data['photo'], 200, 100,_upload_icon ,_upload_thumb,$file_name,2);
            }elseif($_REQUEST['type'] == 'slider') {
                $data['thumb'] = create_thumb($data['photo'], 1098, 360,_upload_icon ,_upload_thumb,$file_name,1);
            }elseif($_REQUEST['type'] == 'footer') {
                $data['thumb'] = create_thumb($data['photo'], 40, 40,_upload_icon ,_upload_thumb,$file_name,1);  
            }elseif($_REQUEST['type'] == 'header') {
                $data['thumb'] = create_thumb($data['photo'], 40, 40,_upload_icon ,_upload_thumb,$file_name,1);      
            } else {
                $data['thumb'] = create_thumb($data['photo'], 100, 100,_upload_icon ,_upload_thumb,$file_name,1);
            }
            
            $d->setTable('icon');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_icon . $row['photo']);
                delete_file(_upload_thumb . $row['thumb']);
            }
        }


        $data['ten_vi'] = addslashes($_POST['ten_vi']);
        $data['ten_en'] = addslashes($_POST['ten_en']);
        $data['text1_vi'] = addslashes($_POST['text1_vi']);
        $data['text1_en'] = addslashes($_POST['text1_en']);
        $data['text2_vi'] = addslashes($_POST['text2_vi']);
        $data['text2_en'] = addslashes($_POST['text2_en']);
        $data['text3_vi'] = addslashes($_POST['text3_vi']);
        $data['text3_en'] = addslashes($_POST['text3_en']);
        $data['mota_vi'] = addslashes($_POST['mota_vi']);
        $data['mota_en'] = addslashes($_POST['mota_en']);
        $data['mota1_vi'] = addslashes($_POST['mota1_vi']);
        $data['mota1_vi'] = addslashes($_POST['mota1_vi']);
		$data['type'] = $type;
        $data['url'] = $_POST['url'];
        $data['urlvideo'] = $_POST['urlvideo'];
        $data['stt'] = $_POST['stt'];
        /*$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;*/

        $d->setTable('icon');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=icon&type=".$type."&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=icon&type=".$type."&act=man");
    }else {

        if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|Jpg', _upload_icon, $file_name)) {
            $data['photo'] = $photo;
            if($_REQUEST['type'] == 'doitac') {
                $data['thumb'] = create_thumb($data['photo'], 200, 100,_upload_icon ,_upload_thumb,$file_name,2);
            }elseif($_REQUEST['type'] == 'slider') {
                $data['thumb'] = create_thumb($data['photo'], 1098, 360,_upload_icon ,_upload_thumb,$file_name,1);
            }elseif($_REQUEST['type'] == 'footer') {
                $data['thumb'] = create_thumb($data['photo'], 40, 40,_upload_icon ,_upload_thumb,$file_name,1);  
            }elseif($_REQUEST['type'] == 'header') {
                $data['thumb'] = create_thumb($data['photo'], 40, 40,_upload_icon ,_upload_thumb,$file_name,1);      
            } else {
                $data['thumb'] = create_thumb($data['photo'], 100, 100,_upload_icon ,_upload_thumb,$file_name,1);
            }
        }

        $data['ten_vi'] = addslashes($_POST['ten_vi']);
        $data['ten_en'] = addslashes($_POST['ten_en']);
        $data['text1_vi'] = addslashes($_POST['text1_vi']);
        $data['text1_en'] = addslashes($_POST['text1_en']);
        $data['text2_vi'] = addslashes($_POST['text2_vi']);
        $data['text2_en'] = addslashes($_POST['text2_en']);
        $data['text3_vi'] = addslashes($_POST['text3_vi']);
        $data['text3_en'] = addslashes($_POST['text3_en']);
        $data['mota_vi'] = addslashes($_POST['mota_vi']);
        $data['mota_en'] = addslashes($_POST['mota_en']);
        $data['mota1_vi'] = addslashes($_POST['mota1_vi']);
        $data['mota1_vi'] = addslashes($_POST['mota1_vi']);
        $data['type'] = $type;
        $data['url'] = $_POST['url'];
        $data['urlvideo'] = $_POST['urlvideo'];
        $data['stt'] = $_POST['stt'];
        /*$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;*/

        $d->setTable('icon');
        if ($d->insert($data))
            redirect("index.php?com=icon&type=".$type."&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=icon&type=".$type."&act=man");
    }
}

function delete_item() {
    global $d,$type;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id,thumb, photo from #_icon where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_icon . $row['photo']);
                delete_file(_upload_thumb . $row['thumb']);
            }
            $sql = "delete from #_icon where id='" . $id . "'";
            if ($d->query($sql))
                transfer("Dữ liệu đã được xóa", "index.php?com=icon&type=".$type."&act=man");
            else
                transfer("Xóa dữ liệu bị lỗi", "index.php?com=icon&type=".$type."&act=man");
        }
    }elseif (isset($_GET['listid']) == true) {
        $listid = explode(",", $_GET['listid']);
        for ($i = 0; $i < count($listid); $i++) {
            $idTin = $listid[$i];
            $id = themdau($idTin);
            $d->reset();
            $sql = "select * from #_icon where id='" . $id . "'";
            $d->query($sql);
            if ($d->num_rows() > 0) {
                while ($row = $d->fetch_array()) {
                    delete_file(_upload_icon . $row['photo']);
                    delete_file(_upload_thumb . $row['thumb']);
                }
                $sql = "delete from #_icon where id='" . $id . "'";
                $d->query($sql);
            }
        } redirect("index.php?com=icon&act=man&type=" . $type."&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=icon&type=".$type."&act=man");
}

?>