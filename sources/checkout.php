<?php

$d->reset();
$sql = "select * from #_setting limit 0,1";
$d->query($sql);
$row_setting = $d->fetch_array();
$email_company = $row_setting['email'];


if (isset($_POST['continue'])) {

    $mahoadon = strtoupper(ChuoiNgauNhien(6));
    $ngaytao = time();
    $thang = date('m', $ngaytao);
    $nam = date('Y', $ngaytao);

    $tonggia = get_order_total();

    $hoten = $_POST['hoten'];
    $diachi = $_POST['diachi'];
    $priceqh = $_POST['priceqh'];
    $dienthoai = $_POST['dienthoai'];
    $email = $_POST['email'];
    $noidung = $_POST['noidung'];

    $hotennhan = $_POST['hotennhan'];
    $diachinhan = $_POST['diachinhan'];
    $dienthoainhan = $_POST['dienthoainhan'];
    
    $phuongthuc = $_POST['cast'];
    $idchinhanh = $_POST['idchinhanh'];
    
    if($_POST['cast'] == 'nhan-hang'){
        $dichpt_vi = "Thanh toán khi nhận hàng";
        $dichpt_en = "Payment on delivery";
    } elseif($_POST['cast'] == 'noi-dia'){
        $dichpt_vi = "Thanh toán bằng thẻ nội địa";
        $dichpt_en = "Payment by domestic card";
    } elseif($_POST['cast'] == 'quoc-te'){
        $dichpt_vi = "Thanh toán bằng thẻ quốc tế";
        $dichpt_en = "Payment by international card";
    }


 
        
    $idkhachhang = $_SESSION['mem_login']['id'];

    $dataorder['madonhang'] = $mahoadon;
    $dataorder['hoten'] = $hoten;
    $dataorder['dienthoai'] = $dienthoai;
    $dataorder['diachi'] = $diachi;
    $dataorder['email'] = $email;
    $dataorder['httt'] = 2;
    $dataorder['tonggia'] = $tonggia;
    $dataorder['ghichu'] = $noidung;
    $dataorder['ngaytao'] = $ngaytao;
    $dataorder['trangthai'] = 1;
    $dataorder['loaithanhtoan'] = 0;
    // $dataorder['phuongthuc'] = $phuongthuc;
    // $dataorder['iduser'] = $idkhachhang;
    $dataorder['thang'] = $thang;
    $dataorder['nam'] = $nam;
    // $dataorder['giagoc'] = $giagoc;

    $d->reset();
    // $iddonhang = $d->getMaxId('donhang');
    $d->setTable('donhang');
    if ($d->insert($dataorder)) {
        $_SESSION['donhangthanhtoan'] = $mahoadon;


        $max = count($_SESSION['cart']);
        $sum = 0;
        for ($i = 0; $i < $max; $i++) {
            $pid = $_SESSION['cart'][$i]['productid'];
            
            $d->reset();
            $sql = "select * from #_product where id = '".$pid."' order by stt";
            $d->query($sql);
            $info_pro = $d->fetch_array();


            $price = $info_pro['gia'];
            $q = $_SESSION['cart'][$i]['qty'];

            $totaldetail = $price * $q;
            $sum = $sum + $totaldetail;
            $pname = get_product_name($pid);
            if ($q == 0)
                continue;
            

            $datadetailorder['id_order'] = $mahoadon;
            $datadetailorder['id_product'] = $pid;
            $datadetailorder['soluong'] = $q;
            $datadetailorder['gia'] = $price;
            $datadetailorder['total'] = $totaldetail;
            // $datadetailorder['id_nguoimua'] = $idkhachhang;
            // $datadetailorder['color'] = $colorname;
            // $datadetailorder['size'] = $size;
            $d->reset();
            $d->setTable('donhang_detail');
            if ($d->insert($datadetailorder)) {}

        }

        unset($_SESSION['cart']);
        header('Location: checkout.html');
    }

        
        

       

   
}
?>