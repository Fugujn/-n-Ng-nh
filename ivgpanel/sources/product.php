<?php

session_start();
if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$type = $_REQUEST['type'];
$type1 = $_REQUEST['type1'];
$hh = $_REQUEST['back'];
$urldanhmuc = "";
$urldanhmuc.= (isset($_REQUEST['id_list'])) ? "&id_list=" . addslashes($_REQUEST['id_list']) : "";
$urldanhmuc.= (isset($_REQUEST['id_cat'])) ? "&id_cat=" . addslashes($_REQUEST['id_cat']) : "";
$urldanhmuc.= (isset($_REQUEST['id_item'])) ? "&id_item=" . addslashes($_REQUEST['id_item']) : "";

$id = $_REQUEST['id'];
switch ($act) {
    
    #===================================================
    case "man":
        get_items();
        $template = "product/items";
        break;
    case "add":
        $template = "product/item_add";
        break;
    case "edit":
        get_item();
        $template = "product/item_add";
        break;
    case "save":
        save_item();
        break;
    case "delete":
        delete_item();
        break;
    #===================================================	
    case "man_item":
        get_loais();
        $template = "product/loais";
        break;
    case "add_item":
        $template = "product/loai_add";
        break;
    case "edit_item":
        get_loai();
        $template = "product/loai_add";
        break;
    case "save_item":
        save_loai();
        break;
    case "delete_item":
        delete_loai();
        break;

    #===================================================	
    case "man_cat":
        get_cats();
        $template = "product/cats";
        break;
    case "add_cat":
        $template = "product/cat_add";
        break;
    case "edit_cat":
        get_cat();
        $template = "product/cat_add";
        break;
    case "save_cat":
        save_cat();
        break;
    case "delete_cat":
        delete_cat();
        break;
    #===================================================	
    case "man_list":
        get_lists();
        $template = "product/lists";
        break;
    case "add_list":
        $template = "product/list_add";
        break;
    case "edit_list":
        get_list();
        $template = "product/list_add";
        break;
    case "save_list":
        save_list();
        break;
    case "delete_list":
        delete_list();
        break;
    #===================================================	
    case "man_photo":
        get_photos();
        $template = "product/photos";
        break;
    case "add_photo":
        $template = "product/photo_add";
        break;
    case "edit_photo":
        get_photo();
        $template = "product/photo_edit";
        break;
    case "save_photo":
        save_photo();
        break;
    case "delete_photo":
        delete_photo();
        break;
    #===================================================	
    case "man_tab":
        get_tabs();
        $template = "product/tabs";
        break;
    case "add_tab":
        $template = "product/tab_add";
        break;
    case "edit_tab":
        get_tab();
        $template = "product/tab_add";
        break;
    case "save_tab":
        save_tab();
        break;
    case "delete_tab":
        delete_tab();
        break;
    #============================================================
    
    default:
        $template = "index";
}

#====================================

function fns_Rand_digit($min, $max, $num) {
    $result = '';
    for ($i = 0; $i < $num; $i++) {
        $result.=rand($min, $max);
    }
    return $result;
}

function get_items() {
    global $d, $items, $paging, $urldanhmuc, $type;
    #----------------------------------------------------------------------------------------
    
    #-------------------------------------------------------------------------------
    $sql = "select * from #_product where type='" . $type . "' ";
    if ((int) $_REQUEST['id_list'] != '') {
        $sql.=" and  find_in_set('" . $_REQUEST['id_list'] . "', list_id)";
    }

    if ($_REQUEST['keyword'] != '') {
        $keyword = addslashes($_REQUEST['keyword']);
        $sql.=" and (ten_vi LIKE '%$keyword%' or masp LIKE '%$keyword%')";
    }
    $sql.=" order by stt,ngaytao desc";

    $d->query($sql);
    $items = $d->result_array();


    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=product&act=man&type=" . $type . $urldanhmuc;
    $maxR = 10;
    $maxP = 20;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item, $ds_tags, $type, $rs_img;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=" . $type);
    $sql = "select * from #_product where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=product&act=man&type=" . $type);
    $item = $d->fetch_array();

    $d->reset();
    $sql_images = "select * from #_product_hinhanh where id_photo='" . $id . "' order by stt, id desc ";
    $d->query($sql_images);
    $rs_img = $d->result_array();
}

function save_item() {
    global $d, $type, $hh;
    $file_name = changeTitle($_POST['ten_vi']).'-'.fns_Rand_digit(0, 9, 2);
    $file_name1 = changeTitle($_POST['ten_vi']).'-'.fns_Rand_digit(0, 9, 2);
    $file_name2 = changeTitle($_POST['ten_vi']).'-'.fns_Rand_digit(0, 9, 2);
    $file_name_phu = changeTitle($_POST['ten_vi']).'-'.fns_Rand_digit(0, 9, 2);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=" . $type);
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    //Phần chung
    // $data['ten_vi'] = addslashes($_POST['ten_vi']);
    $data['ten_en'] = addslashes($_POST['ten_en']);
    $data['ten_jp'] = addslashes($_POST['ten_jp']);
    $data['ten_sp'] = addslashes($_POST['ten_sp']);

    $data['sudung_vi'] = addslashes($_POST['sudung_vi']);
    $data['sudung_en'] = $_POST['sudung_en'];

    $data['xuatxu_vi'] = addslashes($_POST['xuatxu_vi']);
    $data['xuatxu_en'] = $_POST['xuatxu_en'];

    $data['spmuakem'] = addslashes($_POST['spmuakem']);
    $data['baohanh_vi'] = addslashes($_POST['baohanh_vi']);
    $data['baohanh_en'] = $_POST['baohanh_en'];

    $data['ten_video'] = addslashes($_POST['ten_video']);
    $data['masp'] = addslashes($_POST['masp']);
    /*$data['tenkhongdau'] = changeTitle($_POST['ten_vi']);*/

    $data['gia'] = str_replace(',','',$_POST['gia']);
    $giakm = str_replace(',','',$_POST['giakm']);
    // $phantramgiam = $_POST['phantramgiam'];
    
    $data['giakm'] = (int)$giakm;
    // $data['phantramgiam'] = $phantramgiam;
    // if($phantramgiam > 0){
    //     $data['gia'] = (int)$giakm - ((int)$giakm * $phantramgiam / 100);
    //     $data['giakm'] = $giakm;
    // }else{
    //     $data['gia'] = $giakm; 
    //     $data['giakm'] = $giakm;
    // }
    

    $data['chietkhau'] = $_POST['chietkhau'];
    $data['loai'] = $_POST['loai'];

    $data['list_thuonghieu'] = $_POST['list_thuonghieu'];
    $bienthuonghieu = explode(',',$_POST['list_thuonghieu']);
    $data['thuonghieu'] = $bienthuonghieu[0];
    
    $data['sdt'] = addslashes($_POST['sdt']);
    $data['type'] = $type;
    $data['id_city'] = $_POST['quanhuyen'];

    $data['mota_vi'] = addslashes($_POST['mota_vi']);
    $data['mota_en'] = addslashes($_POST['mota_en']);
    $data['mota_jp'] = addslashes($_POST['mota_jp']);
    $data['mota_sp'] = addslashes($_POST['mota_sp']);

    $data['dai'] = addslashes($_POST['dai']);
    $data['rong'] = addslashes($_POST['rong']);
    $data['cao'] = addslashes($_POST['cao']);
    $data['chanmay'] = addslashes($_POST['chanmay']);
    $data['trongluong'] = addslashes($_POST['trongluong']);
    $data['trangthai'] = addslashes($_POST['trangthai']);
    $data['id_brand'] = (int)$_POST['thuonghieu'];
    $data['point'] = (int)$_POST['point'];

    $data['id_topping'] = addslashes(ltrim($_POST['arrtagbv'],','));
    $data['id_size'] = addslashes(ltrim($_POST['arrtagbv1'],','));

    $data['noidung_vi'] = addslashes($_POST['noidung_vi']);
    $data['noidung_en'] = addslashes($_POST['noidung_en']);
    $data['noidung_jp'] = addslashes($_POST['noidung_jp']);
    $data['noidung_sp'] = addslashes($_POST['noidung_sp']);

    

    $data['tongquan'] = addslashes($_POST['tongquan']);
    $data['vitri'] = addslashes($_POST['vitri']);
    $data['tienich'] = addslashes($_POST['tienich']);
    $data['tiendo'] = addslashes($_POST['tiendo']);
    $data['matbangtang'] = addslashes($_POST['bando']);
    $data['thanhtoan'] = addslashes($_POST['thanhtoan']);
    $data['canhomau'] = addslashes($_POST['canhomau']);

    $data['title_vi'] = addslashes($_POST['title_vi']);
    $data['title_sp'] = addslashes($_POST['title_sp']);
    $data['title_en'] = addslashes($_POST['title_en']);
    $data['title_jp'] = addslashes($_POST['title_jp']);

    
    $data['keywords_sp'] = addslashes($_POST['keywords_sp']);
    $data['keywords_en'] = addslashes($_POST['keywords_en']);
    $data['keywords_jp'] = addslashes($_POST['keywords_jp']);


    
    
    $data['description_en'] = addslashes($_POST['description_en']);
    $data['description_jp'] = addslashes($_POST['description_jp']);
    $data['description_sp'] = addslashes($_POST['description_sp']);

    $data['stt'] = $_POST['stt'];
    /* $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
      $data['spkm'] = isset($_POST['spkm']) ? 1 : 0;
      $data['spbc'] = isset($_POST['spbc']) ? 1 : 0;
      $data['noibat'] = isset($_POST['noibat']) ? 1 : 0; */
    $data['h1'] = addslashes($_POST['h1']);
    $data['h2'] = addslashes($_POST['h2']);
    $data['h3'] = addslashes($_POST['h3']);

    if ($id) {
        $id = themdau($_POST['id']);
        if($_REQUEST['type'] == 'san-pham'){
            if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product1, $file_name)) {
                $data['photo'] = $photo;
                // $data['thumb'] = create_thumb($data['photo'], 500, 500,_upload_product1 ,_upload_thumb1,$file_name,2);
                
                $d->setTable('product');
                $d->setWhere('id', $id);
                $d->select();
                if ($d->num_rows() > 0) {
                    $row = $d->fetch_array();
                    delete_file(_upload_product1 . $row['photo']);
                    delete_file(_upload_thumb1 . $row['thumb']);
                }
            }
        } else{
            if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product, $file_name)) {
                $data['photo'] = $photo;
                $data['thumb'] = create_thumb($data['photo'], 384, 244,_upload_product ,_upload_thumb,$file_name,1);
                
                $d->setTable('product');
                $d->setWhere('id', $id);
                $d->select();
                if ($d->num_rows() > 0) {
                    $row = $d->fetch_array();
                    delete_file(_upload_product . $row['photo']);
                    delete_file(_upload_thumb . $row['thumb']);
                }
            }
                
        }

        if ($photo = upload_image("file_phu", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product1, $file_name_phu)) {
            $data['photo_phu'] = $photo;
            
            $d->setTable('product');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product1 . $row['photo_phu']);
            }
        }
                
        if ($photo1 = upload_image("file1", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product, $file_name1)) {

            $data['photo1'] = $photo1;
            //$data['thumb'] = create_thumb($data['photo'], 290, 350, _upload_product, $file_name, 2);
            $d->setTable('product');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product . $row['photo1']);
                //delete_file(_upload_product . $row['thumb']);
            }
        }
        if ($file = upload_image("file2", 'pdf|doc|docx|xls|xlsx|rar|zip|PDF|DOC|DOCX|XLS|XLSX|RAR|ZIP', _upload_product, $file_name2)) {
            $data['file'] = $file;
            //$data['thumb'] = create_thumb($data['photo'], 290, 350, _upload_product, $file_name, 2);
            $d->setTable('product');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product . $row['file']);
                //delete_file(_upload_product . $row['thumb']);
            }
        }
        $data['id_agency'] = (int) $_POST['id_agency'];
        $count = count($_POST["id_parent"]);
        $data['id_item'] = ($_POST["id_parent"][$count - 1]);
        $data['id_list'] = (int) ($_POST["id_parent"][0]);
        $data['id_cat'] = ($_POST["id_parent"][$count - 2]);
        $data["list_id"] = implode($_POST["id_parent"], ",");
        /*$arrdacthu = implode(',',$_POST['id_parent']);
        $data['list_id'] = $arrdacthu;*/
        $data['ngaysua'] = time();
        
        $d->reset();
        $sql_pro="select ten_vi from #_product_list where id='".$data['id_list']."' ";
        $d->query($sql_pro);
        $cap1 = $d->fetch_array();

        $d->reset();
        $sql_pro="select ten_vi from #_product_list where id='".$data['id_item']."' ";
        $d->query($sql_pro);
        $cap2 = $d->fetch_array();

        if($_POST['keywords_vi'] == '') {
            $data['keywords_vi'] = $_POST['title_vi'] .', '. $cap1['ten_vi'] .', '. $cap2['ten_vi'] ;
        } else {
            $data['keywords_vi'] = addslashes($_POST['keywords_vi']);    
        }
        if($_POST['description_vi'] == '') {
            $data['description_vi'] = 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm ' . $_POST['title_vi'] . ' chính hãng với chất lượng và giá cả tốt nhất';
        } else {
            $data['description_vi'] = addslashes($_POST['description_vi']);    
        }



        $d->reset();
        $sql_pro="select * from #_product where tenkhongdau='".$_POST['tenkhongdau']."' and id <> '".$id."' ";
        $d->query($sql_pro);
        $name_pro=$d->result_array();
        $dem = count($name_pro);

        $d->reset();
        $sql_pro="select * from #_product_list where tenkhongdau='".$_POST['tenkhongdau']."' ";
        $d->query($sql_pro);
        $name_pro_l=$d->result_array();
        $dem1 = count($name_pro_l);
        
        $data['ten_vi'] = addslashes($_POST['ten_vi']);
        if($dem > 0 || $dem1 > 0){ 
            $data['tenkhongdau'] = $_POST['tenkhongdau'].'-'.substr(md5($id),1,6);
        }else{    
            $data['tenkhongdau'] = $_POST['tenkhongdau'];
        }

        $d->setTable('product');
        $d->setWhere('id', $id);
        if ($d->update($data)) {

            $count = count($_FILES['multiple']['name']);
            
            $sql = "delete from #_icon where type = 'listfile' and id_product='" . $id . "'";
            $d->query($sql);

            for($u = 0; $u < 11; $u++) { 
                $data3['ten_vi'] = $_POST['tenfilegia'.$u];
                $data3['url'] =$_POST['motafiledetail'.$u];
                $data3['stt'] = $_POST['sttfiledetail'.$u];
                $data3['id_product'] = $id;
                $data3['type'] = 'listfile';
                if($_POST['tenfilegia'.$u] != '') {
                    $d->setTable("icon");
                    $d->insert($data3);
                }
                
            }


            $sql = "delete from #_product_tab where com = 'listgia' and id_photo='" . $id . "'";
            $d->query($sql);

            for($u = 0; $u < 11; $u++) { 
                $data2['ten_vi'] = $_POST['tengia'.$u];
                $data2['gia'] = str_replace(',','',$_POST['giadetail'.$u]);
                $data2['stt'] = $_POST['sttdetail'.$u];
                $data2['id_photo'] = $id;
                $data2['com'] = 'listgia';
                if($_POST['tengia'.$u] != '') {
                    $d->setTable("product_tab");
                    $d->insert($data2);
                }
                
            }

            if ($count >= 1) {
                for ($i = 0; $i < $count; $i++) {
                    if ($_FILES['multiple']['name'][$i] != '') {
                        
                        $tempFile = $_FILES['multiple']['tmp_name'][$i];          //3
                        $targetPath = _upload_product1;  //4
                          //5
                        $ext = pathinfo($_FILES['multiple']['name'][$i], PATHINFO_EXTENSION);   
                        $targetFile = $targetPath . $file_name1 . $i .time().'.'.$ext;       
                        move_uploaded_file($tempFile, $targetFile); //6
                        $data1['photo'] = $file_name1 . $i .time().'.'.$ext;
                        // $data1['thumb'] = create_thumb($data1['photo'],500,500,_upload_product ,_upload_thumb,$file_name1.time().$i.'thumb_',2);
                        // $data1['thumb1'] = create_thumb($data1['photo'],70,70,_upload_product ,_upload_thumb,$file_name1.time().$i.'thumb1_',1);
                        $data1['id_photo'] = $id;

                        $d->setTable("product_hinhanh");
                        $d->insert($data1);
                    }
                }
            }
            /* redirect("index.php?com=product&act=man&type=".$type."&curPage=" . $_REQUEST['curPage'] . ""); */
            $_SESSION['key'] = $id;
            back($hh);
        } else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man&type=" . $type);
    } else {
        
        if($_REQUEST['type'] == 'san-pham'){
            if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product1, $file_name)) {
                $data['photo'] = $photo;
                // $data['thumb'] = create_thumb($data['photo'], 500, 500,_upload_product1 ,_upload_thumb1,$file_name,2);
                // $data['thumb1'] = create_thumb($data['photo'], 70, 70,_upload_product ,_upload_thumb1,$file_name,1);
            }
        }else{
            if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product, $file_name)) {
                $data['photo'] = $photo;
                $data['thumb'] = create_thumb($data['photo'], 384, 244,_upload_product ,_upload_thumb,$file_name,1);
            }
            
        }

        if ($photo = upload_image("file_phu", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product1, $file_name_phu)) {
            $data['photo_phu'] = $photo;
        }
        
        if ($photo1 = upload_image("file1", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product, $file_name1)) {
            $data['photo1'] = $photo1;
            //$data['thumb'] = create_thumb($data['photo'], 290, 350, _upload_product, $file_name, 2);
        }
        if ($file = upload_image("file2", 'pdf|doc|docx|xls|xlsx|rar|zip|PDF|DOC|DOCX|XLS|XLSX|RAR|ZIP', _upload_product, $file_name2)) {
            $data['file'] = $file;
            //$data['thumb'] = create_thumb($data['photo'], 290, 350, _upload_product, $file_name, 2);
        }
        $data['id_agency'] = (int) $_POST['id_agency'];
        $count = count($_POST["id_parent"]);
        $data['id_item'] = ($_POST["id_parent"][$count - 1]);
        $data['id_list'] = (int) ($_POST["id_parent"][0]);
        $data['id_cat'] = ($_POST["id_parent"][$count - 2]);
        $data["list_id"] = implode($_POST["id_parent"], ",");
        $data['id_cat'] = (int) $_POST['id_cat'];
        
        /*$arrdacthu = implode(',',$_POST['id_parent']);
        $data['list_id'] = $arrdacthu;*/
        $d->reset();
        $sql_pro="select ten_vi from #_product_list where id='".$data['id_list']."' ";
        $d->query($sql_pro);
        $cap1 = $d->fetch_array();

        $d->reset();
        $sql_pro="select ten_vi from #_product_list where id='".$data['id_item']."' ";
        $d->query($sql_pro);
        $cap2 = $d->fetch_array();

        if($_POST['keywords_vi'] == '') {
            $data['keywords_vi'] = $_POST['title_vi'] .', '. $cap1['ten_vi'] .', '. $cap2['ten_vi'] ;
        } else {
            $data['keywords_vi'] = addslashes($_POST['keywords_vi']);    
        }
        if($_POST['description_vi'] == '') {
            $data['description_vi'] = 'BP-Home hân hạnh cung cấp đến khách hàng dòng sản phẩm ' . $_POST['title_vi'] . ' chính hãng với chất lượng và giá cả tốt nhất';
        } else {
            $data['description_vi'] = addslashes($_POST['description_vi']);    
        }

        $data['ngaytao'] = time();
        $data['ngay'] = date('d',time());
        $data['thang'] = date('m',time());
        $data['nam'] = date('Y',time());

        $data['ten_vi'] = addslashes($_POST['ten_vi']); 
        $data['tenkhongdau'] = $_POST['tenkhongdau'];

        $id = $d->getMaxId('product');
        $d->setTable('product');
        if ($d->insert($data)) {
            $count = count($_FILES['multiple']['name']);
            if ($count >= 1) {
                for ($i = 0; $i < $count; $i++) {
                    if ($_FILES['multiple']['name'][$i] != '') {

                        $tempFile = $_FILES['multiple']['tmp_name'][$i];          //3
                        $targetPath = _upload_product1;  //4
                          //5
                        $ext = pathinfo($_FILES['multiple']['name'][$i], PATHINFO_EXTENSION);   
                        $targetFile = $targetPath . $file_name1 . $i .time().'.'.$ext;       
                        move_uploaded_file($tempFile, $targetFile); //6
                        $data1['photo'] = $file_name1 . $i .time().'.'.$ext;
                        // $data1['thumb'] = create_thumb($data1['photo'],500,500,_upload_product ,_upload_thumb,$file_name1.time().$i.'thumb_',2);
                        // $data1['thumb1'] = create_thumb($data1['photo'],70,70,_upload_product ,_upload_thumb,$file_name1.time().$i.'thumb1_',1);
                        $data1['id_photo'] = $id;

                        $d->setTable("product_hinhanh");
                        $d->insert($data1);
                    }
                }
            }

            for($u = 0; $u < 11; $u++) { 
                $data3['ten_vi'] = $_POST['tenfilegia'.$u];
                $data3['url'] =$_POST['motafiledetail'.$u];
                $data3['stt'] = $_POST['sttfiledetail'.$u];
                $data3['id_product'] = $id;
                $data3['type'] = 'listfile';
                if($_POST['tenfilegia'.$u] != '') {
                    $d->setTable("icon");
                    $d->insert($data3);
                }
                
            }

            for($u = 0; $u < 11; $u++) { 
                $data2['ten_vi'] = $_POST['tengia'.$u];
                $data2['gia'] = str_replace(',','',$_POST['giadetail'.$u]);
                $data2['stt'] = $_POST['sttdetail'.$u];
                $data2['id_photo'] = $id;
                $data2['com'] = 'listgia';
                if($_POST['tengia'.$u] != '') {
                    $d->setTable("product_tab");
                    $d->insert($data2);
                }
                
            }


            $d->reset();
            $sql_pro="select * from #_product where id='".$id."'";
            $d->query($sql_pro);
            $get_name_pro=$d->fetch_array();

            $d->reset();
            $sql_pro="select * from #_product where tenkhongdau='".$get_name_pro['tenkhongdau']."' and id <> ".$id." ";
            $d->query($sql_pro);
            $name_pro=$d->result_array();
            $dem = count($name_pro);

            $d->reset();
            $sql_pro="select * from #_product_list where tenkhongdau='".$get_name_pro['tenkhongdau']."'";
            $d->query($sql_pro);
            $name_pro_l=$d->result_array();
            $dem1 = count($name_pro_l);

            

            if($dem > 0 || $dem1 > 0 ){ 
                $data['tenkhongdau'] = $get_name_pro['tenkhongdau'].'-'.substr(md5($id),1,6);
            }
                $d->setTable('product');
                $d->setWhere('id', $id);
                if ($d->update($data)){
                   
                }
            $_SESSION['key'] = $id;   
            redirect("index.php?com=product&act=man&type=" . $type);
        } else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man&type=" . $type);
    }
}

function delete_item() {
    global $d, $type;
    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);

        $d->reset();
        $sql = "select * from #_product where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product . $row['photo']);
                delete_file(_upload_product . $row['thumb']);

                $d->reset();
                $sql = "select * from #_product_hinhanh where id_photo='" . $row['id'] . "' order by id";
                $d->query($sql);
                if ($d->num_rows() > 0) {
                    $rs = $d->result_array();
                    foreach ($rs as $v) {
                        delete_file(_upload_product . $rs['photo']);
                        $sql = "delete from #_product_hinhanh where id='" . $v["id"] . "'";
                        $d->query($sql);
                    }
                }
            }
            $sql = "delete from #_product where id='" . $id . "'";
            $d->query($sql);
        }

        if ($d->query($sql))
            redirect("index.php?com=product&act=man&type=" . $type);
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man&type=" . $type);
    }elseif (isset($_GET['listid']) == true) {
        $listid = explode(",", $_GET['listid']);
        for ($i = 0; $i < count($listid); $i++) {
            $idTin = $listid[$i];
            $id = themdau($idTin);
            $d->reset();
            $sql = "select * from #_product where id='" . $id . "'";
            $d->query($sql);
            if ($d->num_rows() > 0) {
                while ($row = $d->fetch_array()) {
                    delete_file(_upload_product . $row['photo']);
                    delete_file(_upload_product . $row['thumb']);
                    $d->reset();
                    $sql = "select * from #_product_hinhanh where id_photo='" . $row['id'] . "' order by id";
                    $d->query($sql);
                    if ($d->num_rows() > 0) {
                        $rs = $d->result_array();
                        foreach ($rs as $v) {
                            delete_file(_upload_product . $rs['photo']);
                            $sql = "delete from #_product_hinhanh where id='" . $v["id"] . "'";
                            $d->query($sql);
                        }
                    }
                }
                $sql = "delete from #_product where id='" . $id . "'";
                $d->query($sql);
            }
        } redirect("index.php?com=product&act=man&type=" . $type);
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man&type=" . $type);
}

function get_lists() {
    global $d, $items, $paging, $type, $type1;
    #----------------------------------------------------------------------------------------
    
    $sql = "select * from #_product_list where com='" . $type . "' and type='" . $type1 . "' ";
    if ($_REQUEST["id_parents"] != '') {
        $sql.=" and id_parent='" . $_REQUEST["id_parents"] . "' ";
    }
    $sql.=" order by stt,id desc";

    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=product&act=man_list&type=" . $type . "&type1=" . $type1 . "";
    $maxR = 15;
    $maxP = 10;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_list() {
    global $d, $item, $type, $type1;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=" . $type . "&type1=" . $type1 . "");
    $sql = "select * from #_product_list where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=product&act=man_list&type=" . $type . "&type1=" . $type1 . "");
    $item = $d->fetch_array();
}

function save_list() {
    global $d, $type, $type1;
    $file_name = changeTitle($_POST['ten_vi']) .'-'. fns_Rand_digit(0, 9, 3);
    $file_name1 = changeTitle($_POST['ten_vi']) .'-'. fns_Rand_digit(0, 9, 3);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=" . $type . "");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    $data['parent_id'] = $_POST['parent_id'];
    //Phần dữ liệu chung
    /*$data['ten_vi'] = $_POST['ten_vi'];*/
    $data['ten_en'] = addslashes($_POST['ten_en']);
    $data['ten_jp'] = addslashes($_POST['ten_jp']);
    $data['ten_sp'] = addslashes($_POST['ten_sp']);
   /* $data['tenkhongdau'] = changeTitle($_POST['ten_vi']);*/
    $data['loai'] = $_POST['loai'];
    $data['title_vi'] = addslashes($_POST['title_vi']);
    $data['title_en'] = addslashes($_POST['title_en']);
    $data['title_jp'] = addslashes($_POST['title_jp']);
    $data['title_sp'] = addslashes($_POST['title_sp']);

    $data['mota_vi'] = addslashes($_POST['mota_vi']);
    $data['noidung_vi'] = addslashes($_POST['noidung_vi']);


    if($_POST['keywords_vi'] == '') {
        $data['keywords_vi'] = $_POST['title_vi'];
    } else {
        $data['keywords_vi'] = addslashes($_POST['keywords_vi']);    
    }
    if($_POST['description_vi'] == '') {
        $data['description_vi'] = 'BP-Home chuyên cung cấp các loại ' . $_POST['title_vi'] . ' chính hãng với chất lượng và giá cả tốt nhất';
    } else {
        $data['description_vi'] = addslashes($_POST['description_vi']); 
    }
    $data['keywords_en'] = addslashes($_POST['keywords_en']);
    $data['keywords_jp'] = addslashes($_POST['keywords_jp']);
    $data['keywords_sp'] = addslashes($_POST['keywords_sp']);

    $data['description_jp'] = addslashes($_POST['description_jp']);
    $data['description_en'] = addslashes($_POST['description_en']);
    $data['description_sp'] = addslashes($_POST['description_sp']);
    
    $gia = str_replace(',','',$_POST['gia']);
    $data['gia'] = (int)$gia;
    $data['stt'] = $_POST['stt'];
    $data['link'] = $_POST['link'];
    $data['com'] = $type;
    $data['type'] = $type1;
    $data['h1'] = addslashes($_POST['h1']);
    $data['h2'] = addslashes($_POST['h2']);
    $data['h3'] = addslashes($_POST['h3']);
    if ($id) {
        
        if ($photo1 = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product, $file_name1)) {
            $data['photo'] = $photo1;
            if($_REQUEST['type1'] == 'san-pham' && $_REQUEST['type'] == 1) {
                $data['thumb'] = create_thumb($data['photo'],282,758,_upload_product ,_upload_thumb,$file_name.'_thumb'.time(),1);
            } elseif($_REQUEST['type1'] == 'san-pham' && $_REQUEST['type'] == 2) {
                $data['thumb'] = create_thumb($data['photo'],468,364,_upload_product ,_upload_thumb,$file_name.'_thumb'.time(),1);
            }
            
            $d->setTable('product_list');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product . $row['photo']);
                delete_file(_upload_thumb . $row['thumb']);
                delete_file(_upload_thumb . $row['thumb2']);
            }
        }
        if ($photo = upload_image("file1", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product, $file_name)) {
            $data['photo1'] = $photo;
            if($_REQUEST['type'] == 1){
                $data['thumb1'] = create_thumb($data['photo1'],1200,150,_upload_product ,_upload_thumb,$file_name.'_thumb1'.time(),2);

            }
            /*if($_REQUEST['type'] == 2){
                $data['thumb'] = create_thumb($data['photo'], 250, 200,_upload_product ,_upload_thumb,$file_name,2);
            }*/
            $d->setTable('product_list');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product . $row['photo1']);
                delete_file(_upload_thumb . $row['thumb1']);
            }
        }
        if (!empty($_POST["id_parent"])) {
            $data['set_level'] = implode($_POST["id_parent"], '|');
        }
        $count = count($_POST["id_parent"]);
        $data['id_parent'] = ($_POST["id_parent"][$count - 1]);
        
        $data['ngaysua'] = time();

        $d->reset();
        $sql_pro="select * from #_product where tenkhongdau='".$_POST['tenkhongdau']."' ";
        $d->query($sql_pro);
        $name_pro=$d->result_array();
        $dem = count($name_pro);

        $d->reset();
        $sql_pro="select * from #_product_list where tenkhongdau='".$_POST['tenkhongdau']."' and id <> '".$id."'";
        $d->query($sql_pro);
        $name_pro_l=$d->result_array();
        $dem1 = count($name_pro_l);


        $data['ten_vi'] = $_POST['ten_vi'];
        if($dem > 0 || $dem1 > 0 ){ 
            $data['tenkhongdau'] = $_POST['tenkhongdau'].'-'.substr(md5($id),2,6);
        }else{    
            $data['tenkhongdau'] = $_POST['tenkhongdau'];
        }

        $d->setTable('product_list');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=product&act=man_list&type=" . $type . "&type1=" . $type1 . "&curPage=" . $_REQUEST['curPage'] . "");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=" . $type . "&type1=" . $type1 . "");
    }else {
        if ($photo1 = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product, $file_name1)) {
            $data['photo'] = $photo1;
            if($_REQUEST['type1'] == 'san-pham' && $_REQUEST['type'] == 1) {
                $data['thumb'] = create_thumb($data['photo'],282,758,_upload_product ,_upload_thumb,$file_name.'_thumb'.time(),1);
            } elseif($_REQUEST['type1'] == 'san-pham' && $_REQUEST['type'] == 2) {
                $data['thumb'] = create_thumb($data['photo'],468,364,_upload_product ,_upload_thumb,$file_name.'_thumb'.time(),1);
            }
        }
        if ($photo = upload_image("file1", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product, $file_name)) {
            $data['photo1'] = $photo;
            if($_REQUEST['type'] == 1){
                $data['thumb1'] = create_thumb($data['photo1'],1200,150,_upload_product ,_upload_thumb,$file_name.'_thumb1'.time(),2);
            }
            /*if($_REQUEST['type'] == 2){
                $data['thumb'] = create_thumb($data['photo'], 250, 200,_upload_product ,_upload_thumb,$file_name,2);
            }*/
        }
        

        if (!empty($_POST["id_parent"])) {
            $data['set_level'] = implode($_POST["id_parent"], '|');
        }
        $count = count($_POST["id_parent"]);
        $data['id_parent'] = ($_POST["id_parent"][$count - 1]);
        $data['stt'] = $_POST['stt'];
        //$data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['ngaytao'] = time();
        $data['ten_vi'] = addslashes($_POST['ten_vi']); 
        $data['tenkhongdau'] = $_POST['tenkhongdau'];
        $data['loai'] = $_POST['loai'];
        
        $idnew = $d->getMaxId('product_list');
        $d->setTable('product_list');
        if ($d->insert($data)){
            /*$link = mysqli_connect("localhost", "root", "", "apkplastic");
            $idnew = mysqli_insert_id($link);*/
            //mysqli_close();
            /*echo $idnew;exit();*/

            $d->reset();
            $sql_pro="select * from #_product_list where id='".$idnew."'";
            $d->query($sql_pro);
            $get_name_pro=$d->fetch_array();

            $d->reset();
            $sql_pro="select * from #_product where tenkhongdau='".$get_name_pro['tenkhongdau']."' ";
            $d->query($sql_pro);
            $name_pro=$d->result_array();
            $dem = count($name_pro);


            $d->reset();
            $sql_pro="select * from #_product_list where tenkhongdau='".$get_name_pro['tenkhongdau']."' and id <> ".$idnew." ";
            $d->query($sql_pro);
            $name_pro_l=$d->result_array();
            $dem1 = count($name_pro_l);


            if($dem > 0 || $dem1 > 0 ){ 
                $data['tenkhongdau'] = $get_name_pro['tenkhongdau'].'-'.substr(md5($id),2,6);
            }
                $d->setTable('product_list');
                $d->setWhere('id', $idnew);
                if ($d->update($data)){
                   
                }
            redirect("index.php?com=product&act=man_list&type=" . $type . "&type1=" . $type1 . "");
        }
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=" . $type . "&type1=" . $type1 . "");
    }
    
}

function delete_list() {
    global $d, $type, $type1;
    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select * from #_product_list where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            while ($row = $d->fetch_array()) {
                delete_file(_upload_product . $row['photo']);
                delete_file(_upload_thumb . $row['thumb']);
            }
            $sql = "delete from #_product_list where id='" . $id . "'";
            $d->query($sql);
        }
        if ($d->query($sql))
            redirect("index.php?com=product&act=man_list&type=" . $type . "&type1=" . $type1 . "");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_list&type=" . $type . "&type1=" . $type1 . "");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_list&type=" . $type . "&type1=" . $type1 . "");
}

/* --------------------------------------------- */

function get_photos() {
    global $d, $items, $paging, $type1;
    #----------------------------------------------------------------------------------------
    if ($_REQUEST['hienthi'] != '') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_hinhanh where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_hinhanh SET hienthi =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product_hinhanh SET hienthi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
    }



    $sql = "select * from #_product_hinhanh where ( id_photo = '" . $_REQUEST['idc'] . "' OR '" . $_REQUEST['idc'] . "'=0  ) and com='" . $type1 . "' order by stt,id desc ";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1;
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_photo() {
    global $d, $item, $list_cat, $type1;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);

    $d->setTable('product_hinhanh');
    $d->setWhere('com', $type1);
    $d->setWhere('id', $id);
    $d->select();
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);
    $item = $d->fetch_array();
    $d->reset();
}

function save_photo() {
    global $d, $type1;
    $file_name = fns_Rand_digit(0, 9, 10);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);

    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) { // cap nhat
        if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|Jpg|JPEG', _upload_product, $file_name)) {
            $data['photo'] = $photo;
            $data['thumb'] = create_thumb($data['photo'], 300, 300, _upload_product, $file_name . $i, 1);
            $d->setTable('product_hinhanh');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload . $row['photo']);
                delete_file(_upload . $row['thumb']);
            }
        }
        $data['id'] = $_REQUEST['id'];
        $data['mota'] = $_POST['mota'];
        $data['vitri'] = $_POST['vitri'];
        $data['stt'] = $_POST['stt'];
        $data['link'] = $_POST['link'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['com'] = $type1;
        $d->reset();
        $d->setTable('product_hinhanh');
        $d->setWhere('id', $id);
        if (!$d->update($data))
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);
        redirect("index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);
    } { // them moi
        for ($i = 0; $i < 5; $i++) {
            if ($photo = upload_image("file" . $i, 'jpg|png|gif|JPG|jpeg|Jpg|JPEG', _upload_product, $file_name . $i)) {
                $data['photo'] = $photo;
                $data['thumb'] = create_thumb($data['photo'], 300, 300, _upload_product, $file_name . $i, 1);

                $data['mota'] = "mota :" . $i;

                $data['stt'] = $_POST['stt' . $i];
                $data['mota'] = $_POST['mota' . $i];
                $data['vitri'] = $_POST['vitri' . $i];
                $data['link'] = $_POST['link' . $i];
                $data['hienthi'] = isset($_POST['hienthi' . $i]) ? 1 : 0;
                $data['com'] = $type1;

                $data['id_photo'] = $_REQUEST['idc'];

                $d->setTable('product_hinhanh');
                if (!$d->insert($data))
                    transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);
            }
        }
        redirect("index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);
    }
}

function delete_photo() {
    global $d, $type1;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->setTable('product_hinhanh');
        $d->setWhere('id', $id);
        $d->select();
        if ($d->num_rows() == 0)
            transfer("Dữ liệu không có thực", "index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);
        $row = $d->fetch_array();
        delete_file(_upload_product . $row['photo']);
        delete_file(_upload_product . $row['thumb']);
        if ($d->delete())
            redirect("index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_photo&idc=" . $_REQUEST['idc'] . "&type1=" . $type1);
}

function get_tabs() {
    global $d, $items, $paging;
    #----------------------------------------------------------------------------------------
    if ($_REQUEST['hienthi'] != '') {
        $id_up = $_REQUEST['hienthi'];
        $sql_sp = "SELECT id,hienthi FROM table_product_tab where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        if ($hienthi == 0) {
            $sqlUPDATE_ORDER = "UPDATE table_product_tab SET hienthi =1 WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        } else {
            $sqlUPDATE_ORDER = "UPDATE table_product_tab SET hienthi =0  WHERE  id = " . $id_up . "";
            $resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");
        }
    }



    $sql = "select * from #_product_tab where ( id_photo = '" . $_REQUEST['idc'] . "' OR '" . $_REQUEST['idc'] . "'=0  ) order by stt,id desc ";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_tab() {
    global $d, $item, $list_cat;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");

    $d->setTable('product_tab');
    $d->setWhere('id', $id);
    $d->select();
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");
    $item = $d->fetch_array();
    $d->reset();
}

function save_tab() {
    global $d, $type;
    $file_name = fns_Rand_digit(0, 9, 12);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");

    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) { // cap nhat
        if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|Jpg|JPEG|PNG', _upload_product, $file_name)) {
            $data['photo'] = $photo;
            $d->setTable('product_tab');
            $d->setWhere('id', $id);
            $d->select();
            if ($d->num_rows() > 0) {
                $row = $d->fetch_array();
                delete_file(_upload_product . $row['photo']);
            }
        }
        $data['id'] = $_REQUEST['id'];
        $data['ten'] = $_POST['ten'];
        $data['noidung'] = $_POST['noidung'];
        $data['stt'] = $_POST['stt'];
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $data['com'] = $type;
        $d->reset();
        $d->setTable('product_tab');
        $d->setWhere('id', $id);
        if (!$d->update($data))
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");
        redirect("index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");
    } { // them moi
        if ($photo = upload_image("file", 'jpg|png|gif|JPG|jpeg|JPEG|PNG|GIF', _upload_product, $file_name)) {
            $data['photo'] = $photo;
        }
        $data['stt'] = $_POST['stt'];
        $data['ten'] = $_POST['ten'];
        $data['noidung'] = $_POST['noidung'];
        $data['id_photo'] = $_REQUEST['idc'];
        $data['com'] = $type;
        $data['hienthi'] = isset($_POST['hienthi']) ? 1 : 0;
        $d->setTable('product_tab');
        if (!$d->insert($data))
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");
        else
            redirect("index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");
    }
}

function delete_tab() {
    global $d, $type;

    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->setTable('product_tab');
        $d->setWhere('id', $id);
        $d->select();
        if ($d->num_rows() == 0)
            transfer("Dữ liệu không có thực", "index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");
        $row = $d->fetch_array();
        delete_file(_upload_product . $row['photo']);
        if ($d->delete())
            redirect("index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=product&act=man_tab&idc=" . $_REQUEST['idc'] . "&type=" . $type . "");
}

?>