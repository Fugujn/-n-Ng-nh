<?php

if (!defined('_source'))
    die("Error");

$act = (isset($_REQUEST['act'])) ? addslashes($_REQUEST['act']) : "";
$type = (isset($_REQUEST['type'])) ? addslashes($_REQUEST['type']) : "";
$id = $_REQUEST['id'];
switch ($act) {

    case "man":
        get_items();
        $template = "donhang/items";
        break;
    case "add":
        $template = "donhang/item_add";
        break;
    case "edit":
        get_item();
        $template = "donhang/item_add";
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

#====================================

function fns_Rand_digit($min, $max, $num) {
    $result = '';
    for ($i = 0; $i < $num; $i++) {
        $result.=rand($min, $max);
    }
    return $result;
}



function get_items() {
    global $d, $items, $paging;

    $id = $_GET['id'];
    //$thangnamhientai = time();
    //$ngay = date('d', $thangnamhientai);
    $thang = $_GET['thang'];
    $nam = $_GET['nam'];

    $d->reset();
    $sql = "select * from #_setting ";
    $d->query($sql);
    $rs_setting = $d->fetch_array();

    if ($id == 0) {
        $d->reset();
        $sql = "select * from #_donhang where 1 = 1 ";
            
        if ($nam != '') {
            $sql .= " and nam = '" . $nam . "' ";
        } 
        if ($thang != '') {
            $sql .= " and thang = '" . $thang . "' ";
        } 

        $sql .= " order by id desc";
        $d->query($sql);
        $itemorder1 = $d->result_array();
        //echo $sql;
    }


    if ($id != '') {
    
        require_once 'classes/PHPExcel.php';
        $objPHPExcel = new PHPExcel();

        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(15);
        $objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(21);
        $objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(25);
        $objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(25);
        $objPHPExcel->getActiveSheet()
                ->getStyle('A1:M1')
                ->applyFromArray(
                        array(
                            'fill' => array(
                                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                                'color' => array('rgb' => '54a352')
                            )
                        )
        );
        $objPHPExcel->getActiveSheet()
                ->getStyle("A1:M1")
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
                ->getStyle('A1:M1')
                ->getAlignment()
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()
                ->getStyle('A1:M1')
                ->getAlignment()
                ->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
        $objPHPExcel->getActiveSheet()
                ->getStyle('A2:M1')
                ->getAlignment()
                ->setVertical(PHPExcel_Style_Alignment::HORIZONTAL_LEFT);


        $styleArray = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size' => 11,
                'name' => 'Arial'
        ));
        $objPHPExcel->getActiveSheet()->getStyle('A1:M1')->applyFromArray($styleArray);
        $objPHPExcel->getActiveSheet()->getRowDimension(1)->setRowHeight(40);

        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A1', 'STT')
                ->setCellValue('B1', 'Mã đơn hàng')
                ->setCellValue('C1', 'Tên người mua')
                ->setCellValue('D1', 'Email')
                ->setCellValue('E1', 'SĐT')
                ->setCellValue('F1', 'Ngày đặt')
                ->setCellValue('G1', 'Sản phẩm')
                ->setCellValue('H1', 'Số lượng')
                ->setCellValue('I1', 'Thành tiền')
                ->setCellValue('J1', 'Tổng giá')
                ->setCellValue('K1', 'Tình trạng')
                ->setCellValue('L1', 'Ghi chú')
                ->setCellValue('M1', 'Nội dung');
//set gia tri cho cac cot du lieu
        $i = 2;
        foreach ($itemorder1 as $kh => $rh) {
            
            if($rh['trangthai'] == 1){ 
                $status = "Mới đặt";
            }elseif($rh['trangthai'] == 2){  
                $status = "Đã xác nhận";
            }elseif($rh['trangthai'] == 3){ 
                $status = "Đang giao hàng";
            }elseif($rh['trangthai'] == 4){     
                $status = "Đã giao";
            }elseif($rh['trangthai'] == 5){     
                $status = "Đã hủy";       
            }
         
            $d->reset();
            $sql = "select * from #_donhang_detail where id_order = '".$rh['madonhang']."'";
            $d->query($sql);
            $order_excel = $d->result_array();
            for ($u = 0;$u < count($order_excel); $u++) {
                    $d->reset();
                    $sql = "select * from #_product where hienthi = 1 and id = '".$order_excel[$u]['id_product']."'";
                    $d->query($sql);
                    $detailproduct = $d->fetch_array();

                     $objPHPExcel->setActiveSheetIndex(0)
                            ->setCellValue('A' . $i, $i-1)
                            ->setCellValue('B' . $i, $rh['madonhang'].'- Tổng giá : '.price_sp($rh['tonggia']))
                            ->setCellValue('C' . $i, $rh['hoten'])
                            ->setCellValue('D' . $i, $rh['email'])
                            ->setCellValue('E' . $i, $rh['dienthoai'])
                            ->setCellValue('F' . $i, date('d/m/Y', $rh['ngaytao']))
                            ->setCellValue('G' . $i, $detailproduct['masp'])
                            ->setCellValue('H' . $i, $order_excel[$u]['soluong'])
                            ->setCellValue('I' . $i, $order_excel[$u]['gia'])
                            ->setCellValue('J' . $i, $order_excel[$u]['total'])
                            ->setCellValue('K' . $i, $status)
                            ->setCellValue('L' . $i, $rh['ghichu'])
                            ->setCellValue('M' . $i, $rh['noidung']);
                    $i++;
            }
        }
        //ghi du lieu vao file,định dạng file excel 2007
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $full_path = 'exel/dataorder_' . time() . '.xlsx'; //duong dan file
        $objWriter->save($full_path);
        header('Location: ../bphomepanel/exel/dataorder_' . time() . '.xlsx');

    }

    

    $sql = "select * from #_donhang ";
    //$sql.=" where thang = '".$thanghientai."' and nam = '".$namhientai."'";

    // if (isset($_REQUEST['keyword'])) {

    //     $keyword = $_REQUEST['keyword'];
    //     $price = (int) $_REQUEST['price'];
    //     $sql_price = '';
    //     if ($price == 1)
    //         $sql_price = " and tonggia < 3000000";
    //     elseif ($price == 2)
    //         $sql_price = " and tonggia >= 3000000 and tonggia < 7000000";
    //     elseif ($price == 3)
    //         $sql_price = " and tonggia >= 7000000 and tonggia < 10000000";
    //     elseif ($price == 4)
    //         $sql_price = " and tonggia >= 10000000";

    //     $sql.=" and ( (hoten LIKE '%$keyword%') OR (madonhang LIKE '%$keyword%')) $sql_price";
    // }
    $sql.=" order by id desc";

    $d->query($sql);
    $items = $d->result_array();
    $curPage = isset($_GET['curPage']) ? $_GET['curPage'] : 1;
    $url = "index.php?com=order&act=man&type=".$type."";
    $maxR = 15;
    $maxP = 10;
    $paging = paging($items, $url, $curPage, $maxR, $maxP);
    $items = $paging['source'];
}

function get_item() {
    global $d, $item;
    $id = isset($_GET['id']) ? themdau($_GET['id']) : "";
    // $id_up = $_REQUEST['hienthi'];
    
    if ($_REQUEST['id'] != '') {
        $id_up = $_REQUEST['id'];
        $sql_sp = "SELECT id,hienthi FROM table_donhang where id='" . $id_up . "' ";
        $d->query($sql_sp);
        $cats = $d->result_array();
        $hienthi = $cats[0]['hienthi'];
        if ($hienthi == 0) {
            /*$sqlUPDATE_ORDER = "UPDATE table_donhang SET hienthi =1 WHERE  id = " . $id_up . "";*/
            $datax['hienthi'] = 1;
            $d->setTable('donhang');
            $d->setWhere('id', $id_up);
            if ($d->update($datax)){}
            /*$resultUPDATE_ORDER = mysql_query($sqlUPDATE_ORDER) or die("Not query sqlUPDATE_ORDER");*/
        }
    }


    if (!$id)
        transfer("Không nhận được dữ liệu", "index.php?com=order&act=man&type=".$type."");

    $sql = "select * from #_donhang where id='" . $id . "'";
    $d->query($sql);
    if ($d->num_rows() == 0)
        transfer("Dữ liệu không có thực", "index.php?com=order&act=man&type=".$type."");
    $item = $d->fetch_array();
}

function save_item() {
    global $d,$type;
    $file_name = fns_Rand_digit(0, 9, 12);
    if (empty($_POST))
        transfer("Không nhận được dữ liệu", "index.php?com=order&act=man&type=".$type."");
    $id = isset($_POST['id']) ? themdau($_POST['id']) : "";


    if ($id) {
        $id = themdau($_POST['id']);

        $data['ghichu'] = $_POST['ghichu'];
        $data['trangthai'] = $_POST['id_tinhtrang'];
        $data['noidung'] = $_POST['noidung'];
        $d->setTable('donhang');
        $d->setWhere('id', $id);
        if ($d->update($data))
            redirect("index.php?com=order&act=man&curPage=" . $_REQUEST['curPage'] . "&type=".$type."");
        else
            transfer("Cập nhật dữ liệu bị lỗi", "index.php?com=order&act=man&type=".$type."");
    }else {


        $data['ghichu'] = $_POST['ghichu'];
        $data['trangthai'] = $_POST['id_tinhtrang'];
        $data['noidung'] = $_POST['noidung'];
        $d->setTable('donhang');
        if ($d->insert($data))
            redirect("index.php?com=order&act=man");
        else
            transfer("Lưu dữ liệu bị lỗi", "index.php?com=order&act=man&type=".$type."");
    }
}

function delete_item() {
    global $d,$type;
    if ($_REQUEST['id_cat'] != '') {
        $id_catt = "&id_cat=" . $_REQUEST['id_cat'];
    }
    if ($_REQUEST['curPage'] != '') {
        $id_catt.="&curPage=" . $_REQUEST['curPage'];
    }


    if (isset($_GET['id'])) {
        $id = themdau($_GET['id']);

        $d->reset();
        $sql = "select madonhang,id from #_donhang where id='" . $id . "'";
        $d->query($sql);
        $xoadeital = $d->fetch_array();

        $d->reset();
        $sql = "delete from #_donhang where id='" . $id . "'";
        $d->query($sql);

        $d->reset();
        $sql = "delete from #_donhang_detail where id_order='" . $xoadeital['id'] . "'";
        $d->query($sql);

        if ($d->query($sql))
            redirect("index.php?com=order&act=man" . $id_catt . "&type=".$type."");
        else
            transfer("Xóa dữ liệu bị lỗi", "index.php?com=order&act=man&type=".$type."");
    } else
        transfer("Không nhận được dữ liệu", "index.php?com=order&act=man&type=".$type."");
}

?>