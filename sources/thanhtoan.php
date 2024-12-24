<?php

$d->reset();
$sql = "select * from #_setting limit 0,1";
$d->query($sql);
$row_setting = $d->fetch_array();
$email_company = $row_setting['email'];

function get_province1($province) {
    global $d;
    $d->reset();
    $sql = "select * from #_province where provinceid='" . $province . "'";
    $d->query($sql);
    $rs_pro = $d->fetch_array();

    return $rs_pro['type'] . ' ' . $rs_pro['name'];
}

function get_district1($province) {
    global $d;
    $d->reset();
    $sql = "select * from #_district where districtid='" . $province . "'";
    $d->query($sql);
    $rs_dis = $d->fetch_array();

    return $rs_dis['type'] . ' ' . $rs_dis['name'];
}

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

    /*$d->reset();
    $sql = "select * from table_icon where com = 'quanhuyen' and gia = '".$_POST['priceqh']."'";
    $d->query($sql);
    $quan2 = $d->fetch_array();*/

    /*$d->reset();
    $sql = "select * from table_icon where com = 'chinhanh' and id = '".$_POST['idchinhanh']."'";
    $d->query($sql);
    $chinhanh2 = $d->fetch_array();
    $emailchinhanh = $chinhanh2['url'];*/

    $httt = $_POST['hinhthuc'];

    //Trường hợp dùng mã coupon
    if ($_SESSION["couple"]["gia_vi"] != '') {
        // Đơn hàng
        $donhang.='<div class="table-responsive">';
        $donhang.='<table class="table table-bordered service-list" border="0" cellpadding="5px" cellspacing="1px" style="font-size:13px;" width="100%">';

        if (is_array($_SESSION['cart'])) {
            $max = count($_SESSION['cart']);
            for ($i = 0; $i < $max; $i++) {
                if ($_SESSION['cart'][$i]['user'] == $user) {
                    $donhang.='<tr  style="font-weight:bold;color:#111;font-weight:bold">
                                <th style="border-left: none; text-align:left; padding-left: 40px; text-transform:uppercase;">Sản phẩm</th>
                                <th align="center" style="text-transform:uppercase;">Số lượng</th>
                                <th align="center" style="text-transform:uppercase;">Đơn giá</th>
                                <th align="center" style="text-transform:uppercase;">Đơn giá</th>

                                <th align="center" style="text-transform:uppercase;">Thành tiền</th>

                                </tr>';
                    $max1 = count($_SESSION['cart'][$i]['product']);
                    for ($j = 0; $j < $max1; $j++) {
                        $pid = $_SESSION['cart'][$i]['productid'];
                        $q = $_SESSION['cart'][$i]['qty'];
                        $pname = get_product_name($pid);
                        if ($q == 0)
                            continue;

                        $donhang.='<tr>
                                    <td width="30%" style="border-left:none; text-align:left">
                                        <span><img src="http://' . $config_url . '/' . _upload_product_l . get_product_image($pid) . '" width="70px" alt="' . $pname . '" /> ' . $pname . '</span>
                                    </td>
                                    <td width="10%" align="center">' . $q . '</td>                  
                                    <td width="10%" align="center">' . number_format(get_price($pid, $size), 0, ',', '.') . '&nbsp;VNĐ</td>

                                    <td width="10%" align="center" class="price_tt">' . number_format(get_price($pid, $size) * $q, 0, ',', '.') . '&nbsp;VNĐ</td>

                                </tr>';
                    }
                    $donhang.='<tr><td colspan="4"><b>Tổng giá bán:</b> <span>' . number_format(get_order_total(), 0, ',', '.') . '&nbsp;VNĐ</span></td></tr>';
                    $donhang.='<tr><td colspan="4"><b><b>Khuyến mãi: </b><span>' . $_SESSION['couple']['gia'] . '&nbsp;VNĐ</span></td></tr>';
                    $donhang.='<tr><td colspan="4"><b>Thanh toán:</b> <span id="total_tr">' . number_format($_SESSION['couple']['total'], "0", ",", ".") . ' VNĐ</span></td></tr>';
                }
                $donhang.='</table> 
                    </div>';
            }
        }
        // trường hợp không dùng mã coupon
    }else {
        // thiết lập Đơn hàng
        $donhang.='<div class="table-responsive">';
        $donhang.='<table class="table table-bordered service-list" border="0" cellpadding="5px" cellspacing="1px" style="font-size:13px;" width="100%">';

        if (is_array($_SESSION['cart'])) {
            $donhang.='<tr bgcolor="#389d01" style="font-weight:bold;color:#FFF">
                                <th align="center">STT</th>
                                <th align="center">Tên</th>
                                <th align="center">Kích thước</th>
                                <th align="center">Màu sắc</th>
                                <th align="center">Hình ảnh</th>
                                <th align="center">Giá</th>
                                <th align="center">Số lượng</th>
                                <th align="center">Đơn giá</th>
                            </tr>';
            $max = count($_SESSION['cart']);
            $sum = 0;
            for ($i = 0; $i < $max; $i++) {
                $pid = $_SESSION['cart'][$i]['productid'];
                $pname = get_product_name($pid);
                $size = $_SESSION['cart'][$i]['size'];
                $color = $_SESSION['cart'][$i]['color'];
                $colorname = $_SESSION['cart'][$i]['colorname'];
                $price = get_price($pid, $size);
                $q = $_SESSION['cart'][$i]['qty'];
                $totaldetail = $price * $q;
                
                $sum = $sum + $totaldetail;
                if ($q == 0)
                    continue;
                $donhang.='<tr';
                if (($i + 1) % 2 == 0) {
                    $donhang.=' style="background:rgba(239, 239, 239, 0.61);">';
                } else {
                    $donhang.=' style="background:#fff;">';
                }
                $donhang.='<td width="10%" align="center">' . ($i + 1) . '</td>';

                $donhang.='<td width="20%">' . $pname . '';
                $donhang.='</td>';
                $donhang.='<td width="10%">' . $size . '';
                $donhang.='</td>';
                $donhang.='<td width="10%">' . $colorname . '';
                $donhang.='</td>';
                $donhang.='<td width="20%"><img src="' . _upload_product . get_product_image($pid) . '" width="70px"/>';
                $donhang.='</td>';
                $donhang.='<td width="10%">' . price_sp($price) . '</td>';
                $donhang.='<td width="10%">' . $q . '</td>';
                $donhang.='<td width="20%">' . price_sp($totalshow) . '</td>
                            </tr>
                            <br/>';
            }
        } else {
            $donhang.='<tr bgColor="#FFFFFF"><td>There are no items in your shopping cart!</td>';
        }

        $donhang.='</table> </div>';
        {
            $donhang.='
                        <div class="box-total">
                        <div class="total-order">
                                <b>Tổng giá bán:</b> <span>' . price_sp($sum) . '</span>
                                <div class="clear"></div>
                        </div>
                        ';


            $donhang.='<div class="total-order">
                               
                                <b>Thanh toán:</b>
                                <span id="total_tr">' . price_sp($sum) . '</span>
                                <div class="clear"></div>
                        </div>
                </div>
                ';
        }
    }

    if ($httt == 'thanh-toan-bao-kim') {  //thanh toán qua Bảo Kim
        
    } else if ($httt == 'thanh-toan-ngan-luong') {
       
    } else if ($httt == 'thanh-toan-paypal') {
        
    } else {
        /*$d->reset();
        $sql = "select * from table_time where type = '$phuongthuc'";
        $d->query($sql);
        $phuongthuc123 = $d->result_array();*/
        
        $idkhachhang = $_SESSION['mem_login']['id'];

        /*$sql = "INSERT INTO  table_donhang (madonhang,hoten,dienthoai,diachi,email,httt,tonggia,noidung,donhang,ngaytao,trangthai,noinhan, loaithanhtoan, dienthoainhan, tennhan, phuongthuc, iduser,thang,nam,giagoc) 
              VALUES ('$mahoadon','$hoten','$dienthoai','$diachi','$email','2','$tonggia','$noidung','$donhang','$ngaytao','1','$diachinhan','0','$dienthoainhan','$hotennhan','$phuongthuc','$idkhachhang','$thang','$nam','$giagoc')";
        mysqli_query($sql);*/
        $dataorder['madonhang'] = $mahoadon;
        $dataorder['hoten'] = $hoten;
        $dataorder['dienthoai'] = $dienthoai;
        $dataorder['diachi'] = $diachi;
        $dataorder['email'] = $email;
        $dataorder['httt'] = 2;
        $dataorder['tonggia'] = $tonggia;
        $dataorder['noidung'] = $noidung;
        $dataorder['donhang'] = $donhang;
        $dataorder['ngaytao'] = $ngaytao;
        $dataorder['trangthai'] = 1;
        $dataorder['noinhan'] = $diachinhan;
        $dataorder['loaithanhtoan'] = 0;
        $dataorder['dienthoainhan'] = $dienthoainhan;
        $dataorder['tennhan'] = $hotennhan;
        $dataorder['phuongthuc'] = $phuongthuc;
        $dataorder['iduser'] = $idkhachhang;
        $dataorder['thang'] = $thang;
        $dataorder['nam'] = $nam;
        $dataorder['giagoc'] = $giagoc;

        $iddonhang = $d->getMaxId('donhang');
        $d->setTable('donhang');
        if ($d->insert($dataorder)) {}

        
        //$iddonhang = mysql_insert_id();
        
        $_SESSION['donhangthanhtoan'] = $iddonhang;

        $d->query("select * from #_donhang where id='" . $iddonhang . "'");
        $rs_order = $d->fetch_array();

        $max = count($_SESSION['cart']);
        $sum = 0;
        for ($i = 0; $i < $max; $i++) {
            $pid = $_SESSION['cart'][$i]['productid'];
            $pname = get_product_name($pid);
            $color = $_SESSION['cart'][$i]['color'];
            $size = $_SESSION['cart'][$i]['size'];
            $colorname = $_SESSION['cart'][$i]['colorname'];
            $price = get_price($pid, $size);
            $q = $_SESSION['cart'][$i]['qty'];
            $totaldetail = $price * $q;
            
            $sum = $sum + $totaldetail;
            
            /*$sql = "INSERT INTO  table_donhang_detail (id_product,soluong,gia,mahoadon) 
            VALUES ('$pid','$q','$totaldetail','$mahoadon')";
            mysql_query($sql) or die(mysql_error());*/

            /*$sql = "INSERT INTO  table_donhang_detail (id_order,id_product,soluong,gia,total,id_nguoimua,color,size) 
              VALUES ('$iddonhang','$pid','$q','$price','$totaldetail','$idkhachhang','$colorname','$size')";
            mysqli_query($sql);*/

            $datadetailorder['id_order'] = $iddonhang;
            $datadetailorder['id_product'] = $pid;
            $datadetailorder['soluong'] = $q;
            $datadetailorder['gia'] = $price;
            $datadetailorder['total'] = $totaldetail;
            $datadetailorder['id_nguoimua'] = $idkhachhang;
            $datadetailorder['color'] = $colorname;
            $datadetailorder['size'] = $size;
            $d->setTable('donhang_detail');
            if ($d->insert($datadetailorder)) {}

        }

        $body = '
            <div style="width:100%;float:left;margin-bottom:20px">'.$row_setting['title_vi'].' cảm ơn quý khách đã đặt hàng dưới đây là thông tin đơn hàng của quý khách:</div>
            <table width="100%" border="0" style="border: solid 1px #000;">
                            <tr style="height:40px; line-height:40px; padding:10px;">
                                  <td width="50%" style="border-bottom: solid 1px #000;">Đơn hàng của bạn</td>
                                  <td style="text-align:center; border-bottom: solid 1px #000; font-style:italic; font-size:18px;">' . $_SESSION['thanhtoan']['hoten'] . '</td>
                            </tr>
                            <tr style="height:40px; padding:10px;">
                                  <td style="line-height:40px; border-bottom: solid 1px #000; border-right: solid 1px;">Số hóa đơn: ' . $rs_order['madonhang'] . '</td>
                                  <td style=" padding:10px 0px; line-height:25px; border-bottom: solid 1px #000;">Ngày đặt hàng: ' . date('d/m/Y', $rs_order['ngaytao']) . '<br />
                                          Trạng thái đơn hàng: mới đặt
                                  </td>
                            </tr>
                            <tr style=" padding:10px;">
             <td style="line-height:25px; padding:10px 0px; border-bottom: solid 1px #000; border-right: solid 1px;">
                 <b>Nhà cung cấp </b><br /><br />
                 Công ty: ' . $row_setting['title_vi'] . ' <br />
                 Địa chỉ: ' . $row_setting['diachi_vi'] . '<br />
                 Điện thoại: ' . $row_setting['dienthoai_vi'] . ' <br />
                 Email: ' . $row_setting['email'] . ' <br />
             </td>
             <td style=" padding:10px 0px; line-height:25px; border-bottom: solid 1px #000;">
                 <b>Khách hàng </b><br /><br />
                 Tên khách hàng: ' . $rs_order['hoten'] . '<br />
                 Địa chỉ: ' . $rs_order['diachi'] . '<br />
                 Điện thoại: ' . $rs_order['dienthoai'] . ' <br />
                 Email: ' . $rs_order['email'] . '<br />
             </td>
                            </tr>
                            <tr>
             <td colspan="2">
             <table width="100%" style=" border-top: none;">
                 <tr style="height:30px;">
                     <td style="width:25%;">Tên sản phẩm</td>
                     <td style="width:10%;">Kích thước</td>
                     <td style="width:10%;">Màu sắc</td>
                     <td style="text-align:center;width:15%;">Giá</td>
                     <td style="text-align:center;width:15%;">Số lượng</td>
                     <td style="text-align:center; width:15%;">Tổng giá</td>
                            </tr>';
        $max = count($_SESSION['cart']);
        $sum = 0;
        for ($i = 0; $i < $max; $i++) {
            $pid = $_SESSION['cart'][$i]['productid'];
            $pname = get_product_name($pid);
            $color = $_SESSION['cart'][$i]['color'];
            $size = $_SESSION['cart'][$i]['size'];
            $colorname = $_SESSION['cart'][$i]['colorname'];
            $price = get_price($pid, $size);
            $q = $_SESSION['cart'][$i]['qty'];
            $totaldetail = $price * $q;
            
            $sum = $sum + $totaldetail;
            
            if ($q == 0)
                continue;

            // <td style="text-align:center;width:15%;">' . number_format(get_price($pid), 0, ',', '.') . '&nbsp;VNĐ</td>
            $body.='<tr style="height:30px">
                        <td style="width:25%;">' . $pname . '</td>
                        <td style="width:10%;">' . $size . '</td>
                        <td style="width:10%;">' . $colorname . '</td>
                        <td style="text-align:center;width:15%;">' . price_sp($price) . '</td>
                        <td style="text-align:center;width:15%;">' . $q . '</td>
                        <td style="text-align:center; width:15%;">' . price_sp($totaldetail) . '</td>
                    </tr>';
        }

        

        $body.='</table>
             </td>
              </tr>
            </table>';
        {
            $body.='<div style="width:100%;float:left;margin-top:15px;font-weight:bold">Tổng giá : ' . price_sp($sum) . '</div>';
            $body.='<div style="width:100%;float:left;margin-top:15px;font-weight:bold">Thanh toán : ' . price_sp($sum) . '</div>';
        }
        $body.='<p style="margin-top:20px;width:100%;float:left">Đây là hộp thư tự động</p><br /><br />
         Mọi yêu cầu giúp đỡ xin liên hệ mail: '.$row_setting['email'].'<br /><br />
            Chúng tôi hân hạnh được phục vụ quý khách';


    require_once ("phpmailer/class.phpmailer.php");
    require_once ("phpmailer/class.smtp.php");

    define('GUSER', 'sondep516@gmail.com'); // tài khoản đăng nhập Gmail
    define('GPWD', 'pxponndumcfpnlun'); // mật khẩu cho cái mail này  

    // function smtpmailer($to, $from, $from_name, $subject, $body, $bcc) {
        global $error;

        $mail = new PHPMailer();  // tạo một đối tượng mới từ class PHPMailer
        $mail->Debugoutput = "html";
        $mail->CharSet = 'UTF-8';
        $mail->IsSMTP(); // bật chức năng SMTP
        // $mail->SMTPDebug = 2;  // kiểm tra lỗi : 1 là  hiển thị lỗi và thông báo cho ta biết, 2 = chỉ thông báo lỗi
        $mail->SMTPAuth = true;  // bật chức năng đăng nhập vào SMTP này
        $mail->SMTPSecure = 'ssl'; // sử dụng giao thức SSL vì gmail bắt buộc dùng cái này
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = 465;
        $mail->Username = GUSER;
        $mail->Password = GPWD;
        $mail->SetFrom($email_company, 'Thông tin đơn hàng');
        $mail->AltBody = "This is a plain-text message body";
        $mail->Subject = "Thông tin đơn hàng";
        $mail->MsgHTML($body);
        $mail->Body = $body;
        $mail->AddAddress($email_company);
        $mail->AddBCC($_POST['email']);
        $mail->AddReplyTo($email_company, 'Thông tin đơn hàng');
        

        if (!$mail->Send()) {
            $error = 'Gởi mail bị lỗi: ' . $mail->ErrorInfo;
            // echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
            return false;
        } else {
            unset($_SESSION['cart']);
            header('Location: checkout.html');
            // echo "Đã gửi thư thành công!";
            return true;
        }

    }
}
?>