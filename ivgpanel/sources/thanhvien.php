<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";

switch ($act) {
    case "man":
        get_items();
        $template = "thanhvien/items";
        break;
    //case "add":
    //$template = "thanhvien/item_add";
    //break;
    case "edit":
        get_item();
        $template = "thanhvien/item_add";
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
//////////////////
function get_items() {
    global $d, $items, $paging;

  
    if ($_REQUEST['ids'] != '') {

        $thangnamhientai = time();
        $thang = date('m', $thangnamhientai);
        $nam = date('Y', $thangnamhientai);


        $sql = "select * from #_member order by id desc";
        $d->query($sql);
        $itemorder1 = $d->result_array();

        $maramdom = fns_Rand_digit(0, 9, 4);

        require_once 'classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();
        
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(18);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
        
        $objPHPExcel->getActiveSheet()
                ->getStyle('A1:F1')
                ->applyFromArray(
                        array(
                            'fill' => array(
                                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                                'color' => array('rgb' => '4bacc6')
                            )
                        )
        );
        $objPHPExcel->getActiveSheet()
                ->getStyle("A1:F1")
                ->applyFromArray(
                        array(
                            'borders' => array(
                                'allborders' => array(
                                    'style' => PHPExcel_Style_Border::BORDER_THIN,
                                    'color' => array('rgb' => 'DDDDDD')
                                )
                            )
                        )
        );
        $objPHPExcel->getActiveSheet()
                ->getStyle('A1:F1')
                ->getAlignment()
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()
                ->getStyle('A1:F1')
                ->getAlignment()
                ->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()
                ->getStyle('A2:F1')
                ->getAlignment()
                ->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);


        $styleArray = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size' => 11,
                'name' => 'Arial'
        ));
        $objPHPExcel->getActiveSheet()->getStyle('A1:F1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(40);

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'ID')
                ->setCellValue('B1', 'Tài khoản')
                ->setCellValue('C1', 'Tên')
                ->setCellValue('D1', 'Điện thoại')
                ->setCellValue('E1', 'Địa chỉ')
                ->setCellValue('F1', 'Ngày tạo');

        $i = 2;
        foreach ($itemorder1 as $kh => $rh) {
            // $ngaydat = date('H:i:s d/m/Y',$rh['ngaytao']);

            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i, $rh['id'])
                    ->setCellValue('B' . $i, $rh['user'])
                    ->setCellValue('C' . $i, $rh['name'])
                    ->setCellValue('D' . $i, $rh['dienthoai'])
                    ->setCellValue('E' . $i, $rh['diachi'])
                    ->setCellValue('F' . $i, $rh['ngaytao']);
            $i++;
        }
        //ghi du lieu vao file,định dạng file excel 2007
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $full_path = 'exel/datamember'.$maramdom.'.xlsx'; //duong dan file
        $objWriter->save($full_path);
        header('Location: ../ivanpanel/exel/datamember'.$maramdom.'.xlsx');
    }

    $sql = "select * from #_member order by id desc";
    $d->query($sql);
    $items = $d->result_array();

    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=thanhvien&act=man";
    $maxR = 10;
    $maxP = 4;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;


    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=thanhvien&act=man");

    $sql = "select * from #_member where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=thanhvien&act=man");
    $item = $d->fetch_array();
}

function save_item() {
    global $d;

    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=thanhvien&act=man");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";
    if ($id) { // cap nhat
        $id = themdau($_POST['id']);

        // kiem tra
        $d->reset();
        $d->setTable('member');
        $d->setWhere('id', $id);
        $d->select();
        /* if($d->num_rows()>0){
          $row = $d->fetch_array();
          if($row['hienthi'] != 1) transfer("Bạn không có quyền trên tài khoản này.<br>Mọi thắc mắc xin liên hệ quản trị website.", "index.php?com=thanhvien&act=man");
          } */

        // kiem tra ten trung
        /* $d->reset();
          $d->setTable('member');
          $d->setWhere('user', $_POST['user']);
          $d->select();
          if($d->num_rows()>0) transfer("Tên dăng nhập nay đã có.<br>Xin chọn tên khác.", "index.php?com=thanhvien&act=edit&id=".$id); */


        //$data['user'] = $_POST['user'];
        if ($_POST['matkhau'] != "") {
            $data['pass'] = md5($_POST['matkhau']);
        }
        $data['user'] = $_POST['email'];
        $data['name'] = $_POST['ten'];
        //$data['sex'] = $_POST['sex'];
        $data['dienthoai'] = $_POST['dienthoai'];
        //$data['nick_yahoo'] = $_POST['nick_yahoo'];
        //$data['nick_skype'] = $_POST['nick_skype'];
        $data['diachi'] = $_POST['diachi'];
        $data['noidungvp'] = $_POST['noidungvp'];
        $data['ngaykhoa'] = $_POST['ngaykhoa'];
        //$data['congty'] = $_POST['congty'];
        //$data['country'] = $_POST['country'];
        //$data['city'] = $_POST['city'];

        $d->reset();
        $d->setTable('member');
        $d->setWhere('id', $id);
        //$d->setWhere('hienthi', 1);
        if ($d->update($data))
            transfer("Dữ liệu đã được cập nhật", "index.php?com=thanhvien&act=man");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=thanhvien&act=man");
    }else { // them moi
        // kiem tra ten trung
        $d->reset();
        $d->setTable('member');
        $d->setWhere('user', $_POST['user']);
        $d->select();
        if ($d->num_rows() > 0)
            transfer("Tên dăng nhập nay đã có.<br>Xin chọn tên khác.", "index.php?com=thanhvien&act=edit&id=" . $id);

        if ($_POST['password'] == "")
            transfer("Chưa nhập mật khẩu", "index.php?com=user&act=add");

        $data['username'] = $_POST['username'];
        $data['password'] = md5($_POST['password']);
        $data['email'] = $_POST['email'];
        $data['ten'] = $_POST['ten'];
        $data['sex'] = $_POST['sex'];
        $data['dienthoai'] = $_POST['dienthoai'];
        $data['nick_yahoo'] = $_POST['nick_yahoo'];
        $data['nick_skype'] = $_POST['nick_skype'];
        $data['diachi'] = $_POST['diachi'];
        $data['congty'] = $_POST['congty'];
        $data['country'] = $_POST['country'];
        $data['city'] = $_POST['city'];
        $data['role'] = 1;
        $data['com'] = "user";

        $d->setTable('user');
        if ($d->insert($data))
            transfer("Dữ liệu đã được lưu", "index.php?com=user&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=user&act=man");
    }
}

function delete_item() {
    global $d;
    if ($_REQUEST['id_cat'] != '') {
        $id_catt = "&id_cat=" . $_REQUEST['id_cat'];
    }
    if ($_REQUEST['curPage'] != '') {
        $id_catt.="&curPage=" . $_REQUEST['curPage'];
    }


    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);
        $d->reset();
        $sql = "select id from #_member where id='" . $id . "'";
        $d->query($sql);
        if ($d->num_rows() > 0) {
            /* while($row = $d->fetch_array()){
              delete_file(_upload_sanpham.$row['photo']);
              delete_file(_upload_sanpham.$row['thumb']);
              } */
            $sql = "delete from #_member where id='" . $id . "'";
            $d->query($sql);
        }
        if ($d->query($sql))
            redirect("index.php?com=thanhvien&act=man");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=thanhvien&act=man");
    }elseif (isset($_GET['listid']) == true) {
        $listid = explode(",", $_GET['listid']);
        for ($i = 0; $i < count($listid); $i++) {
            $idTin = $listid[$i];
            $id = themdau($idTin);
            $d->reset();
            $sql = "select id from #_member where id='" . $id . "'";
            $d->query($sql);
            if ($d->num_rows() > 0) {
                /* while($row = $d->fetch_array()){
                  delete_file(_upload_sanpham.$row['photo']);
                  delete_file(_upload_sanpham.$row['thumb']);
                  } */
                $sql = "delete from #_member where id='" . $id . "'";
                $d->query($sql);
            }
        } redirect("index.php?com=thanhvien&act=man");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=thanhvien&act=man");
}

///////////////////////
function edit() {
    global $d, $item, $login_name;

    if (!empty($_POST)) {
        $sql = "select * from #_user where username!='" . $_SESSION['login']['username'] . "' and username='" . $_POST['username'] . "' and role=3";
        $d->query($sql);
        if ($d->num_rows() > 0)
            transfer("Tên đăng nhập này đã có", "index.php?com=user&act=edit");

        $sql = "select * from #_user where username='" . $_SESSION['login']['username'] . "'";
        $d->query($sql);
        if ($d->num_rows() == 1) {
            $row = $d->fetch_array();
            if ($row['password'] != md5($_POST['oldpassword']))
                transfer("Mật khẩu không chính xác", "index.php?com=user&act=edit");
        }else {
            die('Hệ thống bị lỗi. Xin liên hệ với admin. <br>Cám ơn.');
        }

        $data['username'] = $_POST['username'];
        if ($_POST['new_pass'] != "")
            $data['password'] = md5($_POST['new_pass']);
        $data['ten'] = $_POST['ten'];
        $data['email'] = $_POST['email'];
        $data['nick_yahoo'] = $_POST['nick_yahoo'];
        $data['nick_skype'] = $_POST['nick_skype'];
        $data['dienthoai'] = $_POST['dienthoai'];

        $d->reset();
        $d->setTable('user');
        $d->setWhere('username', $_SESSION['login']['username']);
        if ($d->update($data)) {
            session_unset();
            transfer("Dữ liệu đã được lưu.", "index.php");
        }
    }

    $sql = "select * from #_user where username='" . $_SESSION['login']['username'] . "'";
    $d->query($sql);
    if ($d->num_rows() == 1) {
        $item = $d->fetch_array();
    }
}

?>